<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f6f9;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            margin-top: 60px;
            margin-bottom: 60px;
            flex: 1;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            background-color: #c7e4ff;
        }
        .form-section, .preview-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .btn {
            border-radius: 20px;
            padding: 10px 20px;
            min-width: 100px;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-custom {
            background-color: #26256C;
            border-color: #26256C;
            color: white;
        }
        .alert {
            display: none;
        }
    </style>
</head>
<body>
    @include('layouts.header', ['currentView' => 'Acara'])
    @include('layouts.sidebar')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" id="alertMessage">Data kosong. Harap isi semua kolom.</div>
                <div class="card form-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Form Edit</h5>
                    </div>
                    <div class="card-body">
                        <form id="acaraForm" onsubmit="saveData(event)">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Acara</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat" class="form-label">Tempat</label>
                                        <input type="text" class="form-control" id="tempat" name="tempat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="materi" class="form-label">Materi</label>
                                        <textarea class="form-control" id="materi" name="materi" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-custom" onclick="saveAcara()">Tambah</button>
                                        <button type="button" class="btn btn-secondary ms-2" onclick="cancelUpdate()">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="acaraId" name="acaraId">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card preview-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Pratinjau Acara</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-md overflow-x-auto">
                            <div class="table-responsive p-2">
                                <table class="table text-teal-800 table-auto w-full text-center rounded-lg border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="font-bold text-sm px-4 py-2">No</th>
                                            <th class="font-bold text-sm px-4 py-2">Nama Acara</th>
                                            <th class="font-bold text-sm px-4 py-2">Tempat</th>
                                            <th class="font-bold text-sm px-4 py-2">Materi</th>
                                            <th class="font-bold text-sm px-4 py-2">Tanggal Mulai</th>
                                            <th class="font-bold text-sm px-4 py-2">Tanggal Akhir</th>
                                            <th class="font-bold text-sm px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="acaraTableBody">
                                        <!-- Data acara akan ditambahkan di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let acaraList = [];

        document.addEventListener('DOMContentLoaded', function() {
            fetchData();
            addInputListeners();
        });

        function saveAcara() {
            const formData = getFormData();
            if (!formData) {
                showAlert();
                return;
            }
            const url = formData.acaraId ? `/acara/${formData.acaraId}` : '{{ route('acara.store') }}';
            const method = formData.acaraId ? 'PUT' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Acara berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    fetchData();
                    resetForm();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan acara.',
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan acara.',
                });
            });
        }

        function fetchData() {
            fetch('{{ route('acara.show') }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                acaraList = data.acara;
                updateTable(acaraList);
            });
        }

        function updateTable(list) {
            const tableBody = document.getElementById('acaraTableBody');
            tableBody.innerHTML = '';

            list.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.nama}</td>
                    <td>${item.tempat}</td>
                    <td>${item.materi}</td>
                    <td>${item.tanggal_mulai}</td>
                    <td>${item.tanggal_akhir}</td>
                    <td>
                        <button class="btn btn-custom btn-sm" onclick="editAcara(${item.id})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteAcara(${item.id})">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function editAcara(id) {
            const acara = acaraList.find(a => a.id === id);
            document.getElementById('nama').value = acara.nama;
            document.getElementById('tempat').value = acara.tempat;
            document.getElementById('materi').value = acara.materi;
            document.getElementById('tanggal_mulai').value = acara.tanggal_mulai;
            document.getElementById('tanggal_akhir').value = acara.tanggal_akhir;
            document.getElementById('acaraId').value = acara.id;
        }

        function deleteAcara(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus acara ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/acara/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Dihapus!',
                                'Acara telah dihapus.',
                                'success'
                            );
                            fetchData();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus acara.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus acara.',
                        });
                    });
                }
            });
        }

        function cancelUpdate() {
            const formData = getFormData();
            if (formData) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin membatalkannya?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, batalkan!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetForm();
                    }
                });
            } else {
                showAlert();
            }
        }

        function getFormData() {
            const nama = document.getElementById('nama').value;
            const tempat = document.getElementById('tempat').value;
            const materi = document.getElementById('materi').value;
            const tanggal_mulai = document.getElementById('tanggal_mulai').value;
            const tanggal_akhir = document.getElementById('tanggal_akhir').value;
            const acaraId = document.getElementById('acaraId').value;

            if (!nama && !tempat && !materi && !tanggal_mulai && !tanggal_akhir) {
                return null;
            }

            return { nama, tempat, materi, tanggal_mulai, tanggal_akhir, acaraId };
        }

        function showAlert() {
            const alertMessage = document.getElementById('alertMessage');
            alertMessage.style.display = 'block';
            setTimeout(() => {
                alertMessage.style.display = 'none';
            }, 3000);
        }

        function resetForm() {
            document.getElementById('acaraForm').reset();
            document.getElementById('acaraId').value = '';
        }

        function addInputListeners() {
            const inputs = document.querySelectorAll('#acaraForm input, #acaraForm textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value) {
                        document.getElementById('alertMessage').style.display = 'none';
                    }
                });
            });
        }
    </script>
</body>
</html>