<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ URL::asset('css/about.css'); }}" rel="stylesheet">  
    <title>About Us</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <!-- main -->
    <div class="main relative">  
        <div class="container mx-auto text-center items-center">  
            <h1>Tentang Kami</h1>  
            <div class="flex justify-center mt-3">
                <img src="{{ URL::asset('images/white-line.svg'); }}">
            </div> 
        </div>  
        <div class="absolute bottom-0 left-0">
            <img class="wavy" src="{{ URL::asset('images/wave.svg'); }}">
        </div>
        <div class="absolute bottom-0 left-0">
            <img class="wavy-line" src="{{ URL::asset('images/wave-line.svg'); }}">
        </div>
    </div>  
    <!-- profile section -->
    <div class="profil text-center relative">
        <h2 class="mb-10">Profil</h2>
        <div class="w-full">
            <div class="flex flex-row p-5">
                <div class="w-1/2 flex items-center">
                    <img class="w-full" src="{{ URL::asset('images/gedung.png'); }}">
                </div>
                <div class="w-1/2 text-justify p-5 flex items-center ml-20">
                    <p class="text-xl">Waskita Computer Security Incident Response Team disingkat Waskita-CSIRT, merupakan tim tanggap insiden siber pada PT Waskita Karya (Persero) Tbk yang ditetapkan oleh direktur Utama dengan dokumen Surat Keputusan Board of Director PT Waskita Karya (Persero) Tbk Nomor : 20/SK/WK/2023.</p>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-dark.svg'); }}">
        </div>
    </div>
    <!-- visi & misi -->
    <div class="visimisi">
        <div class="text-center">
            <h2>Visi & Misi</h2>
        </div>
        <div class="container mx-auto py-10 px-10">  
            <h2 class="text-2xl font-bold">Visi</h2>  
            <p class="mt-4 text-xl">Visi Waskita-CSIRT adalah mewujudkan keamanan siber di PT Waskita Karya (Persero) Tbk. yang handal.</p>
            <h2 class="text-2xl font-bold mt-5">Misi</h2>  
            <ol class="list-disc list-inside mt-4 text-xl">  
                <li>Mengidentifikasi kerentanan keamanan siber perusahaan secara menyeluruh.</li>  
                <li>Meningkatkan respons aspek keamanan siber kepada seluruh pegawai PT Waskita Karya (Persero) Tbk.</li>  
                <li>Meningkatkan mutu layanan IT PT Waskita Karya (Persero) Tbk dari ancaman siber.</li>  
                <li>Melaksanakan implementasi sistem manajemen pengamanan informasi berdasarkan  ISO 27001:2013.</li>
            </ol>  
        </div>  
    </div>
    @include('components.footer')
</body>  
</html>