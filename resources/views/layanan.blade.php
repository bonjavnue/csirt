<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ URL::asset('css/layanan.css'); }}" rel="stylesheet">  
    <title>Services</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <!-- main -->
    <div class="main relative">  
        <div class="container mx-auto text-center items-center">  
            <h1>Layanan</h1>  
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
    <!-- jenis layanan -->
    <div class="profil text-center relative">
        <h2 class="mb-10">Jenis Layanan</h2>
        <div class="w-full">
            <div class="flex flex-row p-5">
                <div class="w-1/2 ps-10 flex justify-center flex-col text-center">
                <div class="flex justify-center">
                    <img class="layanan" src="{{ URL::asset('images/layanan1.svg'); }}">
                </div>
                    <strong>Pemberian peringatan terkait<br>keamanan siber.</strong>
                </div>
                <div class="w-1/2 text-center p-5 pe-10 flex justify-center flex-col">
                    <div class="flex justify-center">
                        <img class="layanan" src="{{ URL::asset('images/layanan2.svg'); }}">
                    </div>
                    <strong>Penanganan insiden.</strong>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-grey-top.svg'); }}">
        </div>
    </div>
    <!-- panduan -->
    <div class="visimisi">
        <div class="text-center pb-10">
            <h2>Panduan</h2>
        </div>
        <div class="container mx-auto py-10 px-10 flex justify-center">  
            <ul class=items>
                <li>
                    <button class="blue">
                        <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/file.svg'); }}">
                        </div>
                        Panduan Pelaporan<br>Insiden Siber
                    </button>
                </li>
                <li>
                    <button class="red">
                    <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/check2.svg'); }}">
                        </div>
                        Panduan Penanganan<br>Insiden Ransom Sign
                    </button>
                </li>
                <li>
                    <button class="blue">
                    <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/guard.svg'); }}">
                        </div>
                        Panduan Penanganan<br>Insiden Web Defacement
                    </button>
                </li>
                <li>
                    <button class="red">
                    <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/guard.svg'); }}">
                        </div>
                        Panduan Penanganan<br>Serangan SQL Injection
                    </button>
                </li>
            </ul>
        </div>  
        <div class="container mx-auto pb-10 pt-5 px-10 flex justify-center">
            <ul class=items>
                    <li>
                        <button class="red">
                        <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/gear.svg'); }}">
                        </div>
                            Panduan Penanganan<br>Insiden Serangan DDoS
                        </button>
                    </li>
                    <li>
                        <button class="blue">
                        <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/dashboard.svg'); }}">
                        </div>
                            Panduan Penanganan<br>Insiden Malware
                        </button>
                    </li>
                    <li>
                        <button class="red">
                        <div class="flex justify-center pb-3">
                            <img src="{{ URL::asset('images/people.svg'); }}">
                        </div>
                            Panduan Serangan<br>Phishing
                        </button>
                    </li>
                </ul>
        </div>
    </div>
    <div class="extra">
    <div class="absolute top-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-grey-bottom.svg'); }}">
        </div>
    </div>
    @include('components.footer')
</body>  
</html>