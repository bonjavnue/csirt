<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="{{ URL::asset('css/home.css'); }}" rel="stylesheet">  
    <title>Home</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <!-- hero -->
    <div class="main relative">  
        <div class="container mx-auto text-justify items-center grid grid-cols-2 gap-4">  
            <!-- logo and description -->
            <div class="flex flex-col justify-center">
                <h1 id="brand">Waskita CSIRT</h1>  
                <div class="my-3">
                    <img src="{{ URL::asset('images/white-line.svg'); }}">
                </div> 
                <p class="text-xl text-white">Waskita Computer Security Incident Response Team disingkat Waskita-CSIRT, merupakan tim tanggap insiden siber pada PT Waskita Karya (Persero) Tbk yang ditetapkan oleh direktur Utama dengan dokumen Surat Keputusan Board of Director PT Waskita Karya (Persero) Tbk Nomor : 20/SK/WK/2023.</p>
                <div class="flex justify-center text-center items-center">
                    <a class="my-5 about-btn text-center text-sm rounded-full py-2 text-white px-10 flex items-center" href="{{ url('/about') }}">Tentang Kami</a>
                </div>
            </div>
            <!-- hero image -->
            <img class="w-full" src="{{ URL::asset('images/hero.svg'); }}">
        </div>  
        <div class="flex flex-col justify-center text-center text-white text-sm mt-10">
            Show more
            <div class="flex justify-center">
                <img class="mt-3 hero-arrow" src="{{ URL::asset('images/arrow.svg'); }}">
            </div>
        </div>
        <div class="absolute bottom-0 left-0">
            <img class="wavy" src="{{ URL::asset('images/wave.svg'); }}">
        </div>
        <div class="absolute bottom-0 left-0">
            <img class="wavy-line" src="{{ URL::asset('images/wave-line.svg'); }}">
        </div>
    </div>  
    <!-- news -->
    <div class="profil text-center relative flex justify-center flex-col">
        <h2 class="mb-10">Berita Terkini</h2>
        <div class="flex flex-row justify-center gap-4">
            <div class="news container w-1/5 rounded-lg">
                <img class="rounded-lg w-full h-full object-cover" src="{{ URL::asset('images/news-static.svg'); }}" alt="">
            </div>
            <div class="news container w-1/5 rounded-lg">
                <img class="rounded-lg w-full h-full object-cover" src="{{ URL::asset('images/news-static.svg'); }}" alt="">
            </div>
            <div class="news container w-1/5 rounded-lg">
                <img class="rounded-lg w-full h-full object-cover" src="{{ URL::asset('images/news-static.svg'); }}" alt="">
            </div>
            <div class="news container w-1/5 rounded-lg">
                <img class="rounded-lg w-full h-full object-cover" src="{{ URL::asset('images/news-static.svg'); }}" alt="">
            </div>
            <div class="news container w-1/5 rounded-lg">
                <img class="rounded-lg w-full h-full object-cover" src="{{ URL::asset('images/news-static.svg'); }}" alt="">
            </div>
        </div>
        <!-- cyber attack map from fortinet -->
        <h2 class="my-10 mt-20">Peta Serangan Siber</h2>
        <div class="container p-5 border rounded-lg flex flex-col w-full text-start">
            <iframe class="w-full map rounded-lg" src="https://threatmap.fortiguard.com/" frameborder="0"></iframe>
                <p class="text-sm mt-3"><strong>Source:</strong> Fortiguard</p>
            </div>
        <div class="absolute bottom-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-dark.svg'); }}">
        </div>
    </div>
    <!-- contact us -->
    <div class="visimisi">
        <div class="container mx-auto text-justify items-center grid grid-cols-2 gap-10">  
            <!-- google maps -->
            <div class="container p-5 bg-white flex flex-col text-start justify-center rounded-lg">
            <iframe class="rounded-lg w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4062204235324!2d106.8662456!3d-6.24553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f30f9d47a913%3A0xd1a12a5203591f4b!2sPT%20Waskita%20Karya%20(Persero)%20Tbk!5e0!3m2!1sid!2sid!4v1736910970812!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="text-sm mt-3"><strong>Source:</strong> Google Maps</p>
            </div>
            <!-- contact description -->
            <div class="container flex justify-start flex-col">
                <h2 class="mb-3">Hubungi Kami</h2>
                <table>
                    <tr>
                        <td class="w-7 py-2"><img class="w-4" src="{{ URL::asset('images/location.svg'); }}" alt=""></td>
                        <td class="text-sm">Jl. MT Haryono Kav No. 10 Cawang Jakarta Timur 13340</td>
                    </tr>
                    <tr>
                        <td class="w-7 py-2"><img class="w-4" src="{{ URL::asset('images/phone.svg'); }}" alt=""></td>
                        <td class="text-sm">(021)8508510</td>
                    </tr>
                    <tr>
                        <td class="w-7 py-2"><img class="w-4" src="{{ URL::asset('images/email.svg'); }}" alt=""></td>
                        <td class="text-sm">csirt@waskita.co.id</td>
                    </tr>
                    <tr>
                        <td class="w-7 py-2"><img class="w-4" src="{{ URL::asset('images/time.svg'); }}" alt=""></td>
                        <td class="text-sm">Hari Kerja (08.00 - 17.00 WIB)</td>
                    </tr>
                </table>
                <strong class="text-lg danger mt-10">Disclaimer!</strong>
                <p class="text-sm">Bagi Konstituen, sampai saat ini WASKITA-CSIRT hanya merespon dan menangani insiden keamanan siber yang terjadi pada perangkat kerja yang bersifat dinas. Terkait penanganan jenis malware tergantung dari ketersediaan dan kehandalan tools yang dimiliki WASKITA. Apabila dibutuhkan, segala jenis konsekuensi hukum yang disebabkan oleh insiden keamanan siber akan diteruskan ke institusi penegak hukum sesuai dengan peraturan perundang-undangan yang berlaku.</p>
            </div>
        </div>  
    </div>
    @include('components.footer')
</body>  
</html>