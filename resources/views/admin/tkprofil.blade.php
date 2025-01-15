<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <div class="col-md-6">
                <div class="card form-section">
                    <form id="profileForm" enctype="multipart/form-data">
                        <h5>Form Edit</h5>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="profileImage" name="profileImage" onchange="updatePreview()">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4" oninput="updatePreview()"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-custom mx-2" onclick="saveProfile()">Simpan</button>
                            <button type="reset" class="btn btn-secondary mx-2" onclick="resetPreview()">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card preview-section">
                    <h5>Pratinjau</h5>
                    <div class="mb-3">
                        <label for="previewImage" class="form-label">Gambar</label>
                        <div id="previewImage" class="border p-2">
                            <!-- Image preview will be shown here -->
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="previewDescription" class="form-label">Deskripsi</label>
                        <div id="previewDescription" class="border p-2">
                            <!-- Description preview will be shown here -->
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-custom mx-2" onclick="editProfile()">Edit</button>
                        <button class="btn btn-danger mx-2" onclick="deleteProfile()">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        let savedImage = '';
        let savedDescription = '';

        function updatePreview() {
            const profileImage = document.getElementById('profileImage').files[0];
            const description = document.getElementById('description').value;

            if (profileImage) {
                const previewImage = document.getElementById('previewImage');
                previewImage.innerHTML = `<img src="${URL.createObjectURL(profileImage)}" class="img-fluid" alt="Profile Image">`;
                savedImage = URL.createObjectURL(profileImage);
            }

            const previewDescription = document.getElementById('previewDescription');
            previewDescription.textContent = description;
            savedDescription = description;
        }

        function saveProfile() {
            // Simulate saving profile
            alert('Profile saved!');
            document.getElementById('profileForm').reset();
            resetPreview();
            // Restore the saved preview
            if (savedImage) {
                document.getElementById('previewImage').innerHTML = `<img src="${savedImage}" class="img-fluid" alt="Profile Image">`;
            }
            document.getElementById('previewDescription').textContent = savedDescription;
        }

        function editProfile() {
            document.getElementById('description').value = savedDescription;
        }

        function deleteProfile() {
            document.getElementById('previewImage').innerHTML = '';
            document.getElementById('previewDescription').textContent = '';
            savedImage = '';
            savedDescription = '';
        }

        function resetPreview() {
            document.getElementById('previewImage').innerHTML = '';
            document.getElementById('previewDescription').textContent = '';
        }
    </script>
</body>
</html>