<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ URL::asset('css/aduan.css'); }}" rel="stylesheet">  
    <title>Cyber Report</title>  
    @vite('resources/css/app.css')
</head>  
<body>  
    @include('components.navbar') 
    <div class="main relative">  
        <div class="container mx-auto text-center items-center">  
            <h1>Aduan Siber</h1>  
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
    <div class="profil text-center relative">
        <h2 class="mb-10">Form Aduan Insiden Siber</h2>
        <!-- Header Decoration -->
        <div class="header h-10 rounded-lg"></div>
        <!-- Form Starts Here -->
            <form class="p-10 border">  
                <!-- 1st section -->
                <div class="pb-3">
                    <div class="flex justify-start">
                        <h3 class="section-title mb-5 text-xl">Data Pelapor</h3>  
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">  
                        <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="border border-gray-300 rounded-lg p-2" required>  
                        </div>
                        <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="nomor_telepon">Nomor</label>
                            <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" class="border border-gray-300 rounded-lg p-2" required>
                        </div>
                        <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="border border-gray-300 rounded-lg p-2" required>  
                        </div>
                        <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="tanggal_temuan">Tanggal Temuan</label>
                            <input type="date" name="tanggal_temuan" id="tanggal_temuan" class="border border-gray-300 rounded-lg p-2" required>  
                        </div>
                    </div>  
                </div>
                <!-- 2nd section -->
                <div class="py-3">
                    <div class="flex justify-start">
                        <h3 class="section-title mb-5 text-xl">Data Website</h3>  
                    </div>  
                    <div class="grid grid-cols-2 gap-4 mb-4">  
                    <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="nama_domain">Nama Domain</label>
                            <input type="text" name="nama_domain" id="nama_domain" placeholder="Nama Domain" class="border border-gray-300 rounded p-2" required>  
                        </div>
                    <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="url_terdampak">URL Terdampak</label>
                            <input type="url" name="url_terdampak" id="url_terdampak" placeholder="URL Terdampak" class="border border-gray-300 rounded p-2" required>  
                        </div>
                    </div>  
                </div>
                <!-- 3rd section -->
                <div class="py-3">
                    <div class="flex justify-start">
                        <h3 class="section-title mb-5 text-xl">Data Laporan</h3>  
                    </div>
                    <div class="mb-4">  
                    <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="detail_laporan">Detail Laporan</label>
                            <textarea name="detail_laporan" id="detail_laporan" placeholder="Detail Laporan" class="border border-gray-300 rounded p-2 w-full" rows="4" required></textarea>  
                        </div>
                    </div>  
                    <div class="mb-4">  
                    <div class="flex justify-start w-full flex-col">
                            <label class="flex justify-start text-sm mb-1" for="screenshot_bukti">Screenshot Bukti</label>
                            <input type="file" name="screenshot_bukti" id="screenshot_bukti" class="border border-gray-300 rounded p-2 w-full" required>  
                        </div>
                    </div>  
                </div>
                <!-- Submit Button -->
                <button type="submit" class="py-3 submit-btn text-white rounded-lg p-2 w-1/4">Kirim</button>  
            </form> 
    </div>
    @include('components.footer')
</body>  
</html>