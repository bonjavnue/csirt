<div class="sidebar">
    <div class="pe-5">
        <img src="{{ asset('images/logo-wskt-csirt.png') }}" alt="CSIRT Logo" class="text-white font-bold">
    </div>
    <a href="#beranda">Beranda</a>
    <a data-bs-toggle="collapse" href="#tentangkami" role="button" aria-expanded="false" aria-controls="tentangkami">Tentang Kami <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="tentangkami">
        <a class="dropdown-item" href="{{ route('profil.show') }}">Profil</a>
        <a class="dropdown-item" href="{{ route('visi.show') }}">Visi & Misi</a>
    </div>
    <a href="#rfc2350">RFC 2350</a>
    <a data-bs-toggle="collapse" href="#layanan" role="button" aria-expanded="false" aria-controls="layanan">Layanan <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="layanan">
        <a class="dropdown-item" href="{{ route('layanan.show') }}">Jenis Layanan</a>
        <a class="dropdown-item" href="#panduan">Panduan</a>
    </div>
    <a data-bs-toggle="collapse" href="#informasi" role="button" aria-expanded="false" aria-controls="informasi">Informasi <i class="fas fa-chevron-right float-end"></i></a>
    <div class="collapse" id="informasi">
        <a class="dropdown-item" href="#acara">Acara</a>
        <a class="dropdown-item" href="#galeri">Galeri</a>
        <a class="dropdown-item" href="#berita">Berita</a>
    </div>
    <a href="#aduansiber">Aduan Siber</a>
    <a href="{{ route('kontak.show') }}">Kontak</a>
    <a href="#ippengunjung">IP Pengunjung</a>
</div>

<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #26256C;
        padding: 20px;
        position: fixed;
        overflow-y: auto; 
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: opacity 0.3s ease;
    }

    .sidebar a:hover,
    .sidebar .dropdown-item:hover {
        background-color: #26255C; 
        color: white; 
    }

    .sidebar .dropdown-item {
        padding-left: 30px; /* Geser item dropdown sedikit ke kanan */
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