<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ URL::asset('css/informasi.css'); }}" rel="stylesheet">  
    <title>Information</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <!-- main -->
    <div class="main relative">  
        <div class="container mx-auto text-center items-center">  
            <h1>Informasi</h1>  
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
    <!-- tabel acara -->
    <div class="profil text-center relative">
        <h2 class="mb-10">Acara</h2>
        <div class="flex justify-center">
            <table>  
                <!-- header tabel -->
                <thead>  
                    <tr id="header">  
                        <th class="py-2 px-10 border-b">ACARA</th>  
                        <th class="py-2 px-10 border-b">TANGGAL AWAL</th>  
                        <th class="py-2 px-10 border-b">TANGGAL AKHIR</th>  
                        <th class="py-2 px-10 border-b">TEMPAT</th>  
                        <th class="py-2 px-10 border-b">MATERI</th>  
                    </tr>  
                </thead>  
                <!-- konten tabel dimulai dari sini -->
                <tbody>  
                    <tr>
                        <td class="pt-2"></td>
                    </tr>
                    <tr class="content border my-4">  
                        <td class="py-2 px-10">Nama Acara</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">Nama Tempat</td>  
                        <td class="py-2 px-10">Judul Materi</td>  
                    </tr>  
                    <tr>
                        <td class="pt-2"></td>
                    </tr>
                    <tr class="content border my-4">  
                        <td class="py-2 px-10">Nama Acara</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">Nama Tempat</td>  
                        <td class="py-2 px-10">Judul Materi</td>  
                    </tr>  
                    <tr>
                        <td class="pt-2"></td>
                    </tr>
                    <tr class="content border my-4">  
                        <td class="py-2 px-10">Nama Acara</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">Nama Tempat</td>  
                        <td class="py-2 px-10">Judul Materi</td>  
                    </tr>  
                    <tr>
                        <td class="pt-2"></td>
                    </tr>
                    <tr class="content border my-4">  
                        <td class="py-2 px-10">Nama Acara</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">XX-XX-XXXX</td>  
                        <td class="py-2 px-10">Nama Tempat</td>  
                        <td class="py-2 px-10">Judul Materi</td>  
                    </tr>  
                    <tr>
                        <td class="pt-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-grey-top.svg'); }}">
        </div>
    </div>
    <!-- galeri kegiatan -->
    <div class="visimisi">
        <!-- title -->
        <div class="text-center pb-10">
            <h2>Galeri Kegiatan</h2>
        </div>
        <!-- baris 1 -->
        <div class="container mx-auto py-10 px-10 flex justify-center">  
            <ul class="items grid grid-cols-3 gap-4">
                <!-- kegiatan 1 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
                <!-- kegiatan 2 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
                <!-- kegiatan 3 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
                <!-- kegiatan 4 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
                <!-- kegiatan 5 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
                <!-- kegiatan 6 -->
                <li class="mb-5">
                    <div class="w-full rounded-lg overflow-hidden shadow-lg text-center">
                        <img class="w-full" src="https://dif.telkomuniversity.ac.id/wp-content/uploads/2024/10/coding.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4 caption">
                            <div class="font-bold text-l text-dark">Nama Kegiatan</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>  
    </div>
    <!-- tampilan berita -->
    <div class="news text-center relative">
    <div class="absolute top-0 left-0 right-0">
            <img style="width: 100%;" src="{{ URL::asset('images/wave-grey-bottom.svg'); }}">
        </div>
        <!-- title -->
        <h2 class="berita mb-10 mt-10">Berita Terkini</h2>
        <div class="w-full flex flex-col">
            <!-- berita 1 -->
            <div class="container p-4 my-4 flex justify-start text-justify flex flex-col">
                <strong class="text-lg">Headline Berita</strong>
                <div class="flex flex-row my-3">
                    <div class="me-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/calendar.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">yyyy-mm-dd</p>
                    </div>
                    <div class="ms-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/user.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">author</p>
                    </div>
                </div>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="{{ url('/news') }}"><button class="news-detail mt-4 py-1 flex flex-row justify-center items-center">
                    <img class="w-5 me-4" src="{{ URL::asset('images/arrow-down.svg'); }}" alt="">
                    Selengkapnya...
                </button></a>
            </div>
            <!-- berita 2 -->
            <div class="container p-4 my-4 flex justify-start text-justify flex flex-col">
                <strong class="text-lg">Headline Berita</strong>
                <div class="flex flex-row my-3">
                    <div class="me-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/calendar.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">yyyy-mm-dd</p>
                    </div>
                    <div class="ms-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/user.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">author</p>
                    </div>
                </div>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="{{ url('/news') }}"><button class="news-detail mt-4 py-1 flex flex-row justify-center items-center">
                    <img class="w-5 me-4" src="{{ URL::asset('images/arrow-down.svg'); }}" alt="">
                    Selengkapnya...
                </button></a>
            </div>
            <!-- berita 3 -->
            <div class="container p-4 my-4 flex justify-start text-justify flex flex-col">
                <strong class="text-lg">Headline Berita</strong>
                <div class="flex flex-row my-3">
                    <div class="me-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/calendar.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">yyyy-mm-dd</p>
                    </div>
                    <div class="ms-3 flex flex-row">
                        <img class="w-5 me-2" src="{{ URL::asset('images/user.svg'); }}" alt="">
                        <p class="text-sm text-gray-400">author</p>
                    </div>
                </div>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="{{ url('/news') }}"><button class="news-detail mt-4 py-1 flex flex-row justify-center items-center">
                    <img class="w-5 me-4" src="{{ URL::asset('images/arrow-down.svg'); }}" alt="">
                    Selengkapnya...
                </button></a>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>  
</html>