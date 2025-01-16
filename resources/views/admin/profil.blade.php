<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSIRT - Admin Profil</title>
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
        }
        .form-section, .preview-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-section {
            margin-right: 20px;
        }
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
    @include('layouts.header', ['currentView' => 'Profil'])
    @include('layouts.sidebar')
    <div class="content">
        <div class="row">
            <!-- Bagian form content -->
            <div class="col-md-12">
                <div class="card form-section">
                    <form id="profileForm" enctype="multipart/form-data" action="{{ route('profil.update') }}" method="POST" onsubmit=saveProfil(event)>
                            <h5>Preview</h5>
                            <div class="mb-3 d-flex align-items-start">
                                <!-- Gambar -->
                                <div class="me-3">
                                    <label for="previewImage" class="form-label">Gambar</label>
                                    <img id="previewImage" class="img-fluid"  alt="Gambar Belum Tersedia" style="max-width: 400px; max-height: 400px; object-fit: contain; display: block;">
                                </div>

                                <!-- Deskripsi -->
                                <div>
                                    <label for="previewDescription" class="form-label">Deskripsi</label>
                                    <div id="previewDescription">
                                        {{ $profil->deskripsi ?? 'Deskripsi belum tersedia' }}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-custom mx-2" onclick="updateProfil(event)">Edit</button>
                                <button class="btn btn-danger mx-2" onclick="confirmDelete(event)">Hapus</button>
                            </div>
                        @csrf 
                        <h5>Form Edit</h5>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-custom">Simpan</button>
                            <button type="reset" class="btn btn-secondary mx-2" onclick="confirmReset(event)">Batal</button>
                        </div>
                    </form>
               </div>
            </div>

    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let savedGambar = '';
        let savedDeskripsi = '';

        const API_URL = '/admin/profil';

        document.addEventListener('DOMContentLoaded', function() {
            updatePreview();
        });

        // Menampilkan data di database
        function updatePreview() {
            fetch('{{ route('profil.get') }}')
            .then(response => response.json())
            .then(data => {
                if (data.gambar) {
                    // Jika ada gambar, buat pratinjau
                    const imagePreview = document.getElementById('previewImage');
                            imagePreview.src = `{{ asset('storage/img/profil') }}/${data.gambar}`;
                            imagePreview.alt = "Gambar Profil";
                    document.getElementById('previewImage').textContent = 'Gambar belum tersedia.';
                }

                if (data.deskripsi) {
                    document.getElementById('previewDescription').textContent = data.deskripsi;
                } else {
                    document.getElementById('previewDescription').textContent = 'Deskripsi belum tersedia.';
                }
            })
            .catch(error => console.error('Error fetching profil:', error));
        }

        // tombol simpan (store update di database)
        function saveProfil(event) {
            event.preventDefault();
            const gambarInput = document.getElementById('gambar'); // Input untuk file gambar
            const deskripsiInput = document.getElementById('deskripsi'); // Input untuk deskripsi

            const formData = new FormData(); // Gunakan FormData untuk mengirim data

            // Tambahkan file gambar jika ada
            if (gambarInput.files[0]) {
                formData.append('gambar', gambarInput.files[0]);
            }

            // Tambahkan deskripsi
            formData.append('deskripsi', deskripsiInput.value);

            // Submit the form using AJAX
            fetch('{{ route('profil.update') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan token CSRF
                },
                body: formData // Kirim FormData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat menyimpan data.');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Profil berhasil diperbarui!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Reset the form
                    document.getElementById('profileForm').reset();
                    updatePreview();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message || 'Terjadi kesalahan saat memperbarui data.',
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan data.',
                });
                console.error('Error:', error);
            });
        }

        // tombol batal
        function confirmReset(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan membatalkan perubahan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('visiForm').reset();
                    resetPreview();
                    Swal.fire(
                        'Dibatalkan!',
                        'Perubahan telah dibatalkan.',
                        'success'
                    )
                }
            })
        }

        // tombol hapus
        function confirmDelete(event) {
            event.preventDefault();

            // Konfirmasi penghapusan
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Semua data profil akan dihapus dan tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan request ke server untuk menghapus data
                    fetch('{{ route('profil.delete') }}', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Reload halaman setelah penghapusan
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: data.message,
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus data.',
                        });
                        console.error('Error:', error);
                    });
                }
            });
        }

        // tombol edit
        function updateProfil(event) {
            event.preventDefault();

            // Ambil data profil terbaru melalui API
            fetch('{{ route('profil.get') }}')
                .then(response => response.json())
                .then(data => {
                    if (data.gambar || data.deskripsi) {
                        // Masukkan data ke dalam form edit
                        document.getElementById('deskripsi').value = data.deskripsi;

                        // Jika ada gambar, buat pratinjau
                        if (data.gambar) {
                            const imagePreview = document.getElementById('previewImage');
                            imagePreview.src = `{{ asset('storage/img/profil') }}/${data.gambar}`;
                            imagePreview.alt = "Gambar Profil";
                        }

                        // Fokus pada form edit
                        const formEdit = document.getElementById('profileForm');
                        formEdit.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Data profil tidak ditemukan!',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat memuat data.',
                    });
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>