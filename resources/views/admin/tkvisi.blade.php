<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi</title>
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
    @include('layouts.header', ['currentView' => 'Visi & Misi'])
    @include('layouts.sidebar')
    <div class="content">
    <div class="row">
            <div class="col-md-12">
                <div class="card form-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Form Edit</h5>
                    </div>
                    <div class="card-body">
                        <form id="visiForm" onsubmit="saveData(event)">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="visi" class="form-label">Visi</label>
                                        <textarea class="form-control" id="visi" name="visi" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-custom" onclick="saveVisi()">Simpan</button>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="misi" class="form-label">Misi</label>
                                        <textarea class="form-control" id="misi" name="misi" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-custom" onclick="saveMisi()">Simpan</button>
                                </div>
                            </div>
                            <input type="hidden" id="visiId" name="visiId">
                            <input type="hidden" id="misiId" name="misiId">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card preview-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Pratinjau Visi</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-md overflow-x-auto">
                            <div class="table-responsive p-2">
                                <table class="table text-teal-800 table-auto w-full text-center rounded-lg border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="font-bold text-sm px-4 py-2">No</th>
                                            <th class="font-bold text-sm px-4 py-2">Visi</th>
                                            <th class="font-bold text-sm px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="visiTableBody">
                                        <!-- Data visi akan ditambahkan di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card preview-section">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Pratinjau Misi</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-md overflow-x-auto">
                            <div class="table-responsive p-2">
                                <table class="table text-teal-800 table-auto w-full text-center rounded-lg border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="font-bold text-sm px-4 py-2">No</th>
                                            <th class="font-bold text-sm px-4 py-2">Misi</th>
                                            <th class="font-bold text-sm px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="misiTableBody">
                                        <!-- Data misi akan ditambahkan di sini -->
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
        let visiList = [];
        let misiList = [];

        document.addEventListener('DOMContentLoaded', function() {
            fetchData();
        });

        function saveVisi() {
            const visi = document.getElementById('visi').value;
            const visiId = document.getElementById('visiId').value;
            const url = visiId ? `/visi-misi/${visiId}/visi` : '{{ route('visi.store') }}';
            const method = visiId ? 'PUT' : 'POST';

            if (visi.trim() !== '') {
                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ visi: visi })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Visi berhasil disimpan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        fetchData();
                        document.getElementById('visi').value = '';
                        document.getElementById('visiId').value = '';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan visi.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan visi.',
                    });
                });
            }
        }

        function saveMisi() {
            const misi = document.getElementById('misi').value;
            const misiId = document.getElementById('misiId').value;
            const url = misiId ? `/visi-misi/${misiId}/misi` : '{{ route('visi.store') }}';
            const method = misiId ? 'PUT' : 'POST';

            if (misi.trim() !== '') {
                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ misi: misi })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Misi berhasil disimpan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        fetchData();
                        document.getElementById('misi').value = '';
                        document.getElementById('misiId').value = '';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan misi.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan misi.',
                    });
                });
            }
        }

        function fetchData() {
            fetch('{{ route('visi.show') }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                visiList = data.visi;
                misiList = data.misi;
                updateTable('visi', visiList);
                updateTable('misi', misiList);
            });
        }

        function updateTable(type, list) {
            const tableBody = document.getElementById(`${type}TableBody`);
            tableBody.innerHTML = '';

            list.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${type === 'visi' ? item.visi : item.misi}</td>
                    <td>
                        <button class="btn btn-custom btn-sm" onclick="${type === 'visi' ? `editVisi(${item.id})` : `editMisi(${item.id})`}">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="${type === 'visi' ? `deleteVisi(${item.id})` : `deleteMisi(${item.id})`}">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function editVisi(id) {
            const visi = visiList.find(v => v.id === id);
            document.getElementById('visi').value = visi.visi;
            document.getElementById('visiId').value = visi.id;
        }

        function editMisi(id) {
            const misi = misiList.find(m => m.id === id);
            document.getElementById('misi').value = misi.misi;
            document.getElementById('misiId').value = misi.id;
        }

        function deleteVisi(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus visi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/visi-misi/${id}/visi`, {
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
                                'Visi telah dihapus.',
                                'success'
                            );
                            fetchData();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus visi.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus visi.',
                        });
                    });
                }
            });
        }

        function deleteMisi(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus misi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/visi-misi/${id}/misi`, {
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
                                'Misi telah dihapus.',
                                'success'
                            );
                            fetchData();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus misi.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus misi.',
                        });
                    });
                }
            });
        }
    </script>
</body>
</html>