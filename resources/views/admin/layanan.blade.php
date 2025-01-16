<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f6f9;
        }
        .content {
            margin-left: 250px; /* Adjust this value to match the width of the sidebar */
            padding: 20px;
            width: calc(100% - 250px); /* Adjust this value to match the width of the sidebar */
            margin-top: 60px; /* Adjust this value to match the height of the header */
            margin-bottom: 60px; /* Adjust this value to match the height of the footer */
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
        /* .form-section {
            margin-right: 20px;
        } */
        .btn {
            border-radius: 20px;
            padding: 10px 20px;
            min-width: 100px; /* Ensure all buttons have the same minimum width */
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
    </style>
</head>
<body>
    @include('layouts.header', ['currentView' => 'Jenis Layanan'])
    @include('layouts.sidebar')
    <div class="content">
    <div class="row">
            <div class="col-md-12">
                <div class="card form-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Form Edit</h5>
                    </div>
                    <div class="card-body">
                        <form id="layananForm" onsubmit="saveData(event)">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                                        <textarea class="form-control" id="jenis_layanan" name="jenis_layanan" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-custom" onclick="saveLayanan()">Simpan</button>
                                    <button type="button" class="btn btn-secondary ms-2" onclick="cancelUpdate()">Batal</button>
                                </div>
                            </div>
                            <input type="hidden" id="layananId" name="layananId">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card preview-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Pratinjau Jenis Layanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-md overflow-x-auto">
                            <div class="table-responsive p-2">
                                <table class="table text-teal-800 table-auto w-full text-center rounded-lg border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="font-bold text-sm px-4 py-2">No</th>
                                            <th class="font-bold text-sm px-4 py-2">Jenis Layanan</th>
                                            <th class="font-bold text-sm px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="layananTableBody">
                                        <!-- Data layanan akan ditambahkan di sini -->
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
        let layananList = [];

        document.addEventListener('DOMContentLoaded', function() {
            fetchData();
        });

        function saveLayanan() {
            const jenis_layanan = document.getElementById('jenis_layanan').value;
            const layananId = document.getElementById('layananId').value;
            const url = layananId ? `/layanan/${layananId}` : '{{ route('layanan.store') }}';
            const method = layananId ? 'PUT' : 'POST';

            if (jenis_layanan.trim() !== '') {
                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ jenis_layanan: jenis_layanan })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Jenis layanan berhasil disimpan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        fetchData();
                        document.getElementById('jenis_layanan').value = '';
                        document.getElementById('layananId').value = '';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan jenis layanan.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan jenis layanan.',
                    });
                });
            }
        }


        function fetchData() {
            fetch('{{ route('layanan.show') }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                layananList = data.layanan;
                updateTable(layananList);
            });
        }

        function updateTable(list) {
            const tableBody = document.getElementById('layananTableBody');
            tableBody.innerHTML = '';

            list.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.jenis_layanan}</td>
                    <td>
                        <button class="btn btn-custom btn-sm" onclick="editLayanan(${item.id})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteLayanan(${item.id})">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function editLayanan(id) {
            const layanan = layananList.find(l => l.id === id);
            document.getElementById('jenis_layanan').value = layanan.jenis_layanan;
            document.getElementById('layananId').value = layanan.id;
        }

        function deleteLayanan(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus jenis layanan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/layanan/${id}`, {
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
                                'Jenis layanan telah dihapus.',
                                'success'
                            );
                            fetchData();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus jenis layanan.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus jenis layanan.',
                        });
                    });
                }
            });
        }

        function cancelUpdate() {
            document.getElementById('jenis_layanan').value = '';
            document.getElementById('layananId').value = '';
        }
    </script>
</body>
</html>