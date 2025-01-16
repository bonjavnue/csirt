<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ URL::asset('css/detail-berita.css'); }}" rel="stylesheet">  
    <title>Berita</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <!-- main -->
    <div class="main relative text-justify">  
        <img class="w-full h-full object-cover" src="https://vida.id/hubfs/Perbedaan%20Hacker%20dan%20Cracker.jpg" alt=""> 
        <div class="flex flex-col w-1/2 absolute bottom-0 left-0 p-5">
            <div class="text-center w-1/4 category mb-3 rounded-lg py-1">
                <strong class="text-xs text-white">Serangan Siber</strong>
            </div>
            <strong class="text-xl text-white news-title">Serangan Siber Merajalela di Kancah Internasional per Januari 2025, Simak Penjelasannya.</strong>
        </div>
    </div>  
    <div class="p-5 flex justify-end text-end">
        <p class="text-sm">Rabu, 15 Januari 2024 - 13.00 WIB</p>
    </div>
    <div class="w-full border border-top border-2">
        <div class="p-5 text-justify">
            <strong class="mb-5 text-lg">Isi Berita</strong>
            <div class="mt-5">
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <br>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <br>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>  
</html>