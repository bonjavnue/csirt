<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="#beranda">Beranda</a>
    <a data-bs-toggle="collapse" href="#tentangkami" role="button" aria-expanded="false" aria-controls="tentangkami">Tentang Kami <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="tentangkami">
        <a class="dropdown-item" href="#profil">Profil</a>
        <a class="dropdown-item" href="#visi">Visi</a>
    </div>
    <a href="#rfc2350">RFC 2350</a>
    <a data-bs-toggle="collapse" href="#layanan" role="button" aria-expanded="false" aria-controls="layanan">Layanan <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="layanan">
        <a class="dropdown-item" href="#jenislayanan">Jenis Layanan</a>
        <a class="dropdown-item" href="#visi">Visi dan Misi</a>
    </div>
    <a data-bs-toggle="collapse" href="#informasi" role="button" aria-expanded="false" aria-controls="informasi">Informasi <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="informasi">
        <a class="dropdown-item" href="#acara">Acara</a>
        <a class="dropdown-item" href="#galeri">Galeri</a>
        <a class="dropdown-item" href="#visi">Berita</a>
    </div>
    <a href="#aduansiber">Aduan Siber</a>
    <a href="#kontak">Kontak</a>
    <a href="#ippengunjung">IP Pengunjung</a>
</div>

<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #343a40;
        padding: 20px;
        position: fixed;
        overflow-y: auto; /* Enable vertical scrolling */
    }
    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .sidebar a:hover {
        background-color: #495057;
    }
    .sidebar .dropdown-item {
        padding-left: 30px; /* Adjust this value to shift the items to the right */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var collapseElements = document.querySelectorAll('[data-bs-toggle="collapse"]');
        collapseElements.forEach(function (element) {
            element.addEventListener('click', function () {
                var icon = this.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-chevron-right');
                    icon.classList.toggle('fa-chevron-down');
                }
            });
        });
    });
</script>