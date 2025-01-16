<nav class="p-4" style="background-color: #26256C; width: 100%;">    
    <div class="container mx-auto flex justify-start items-center">    
        <div class="pe-5">
            <img src="images/logo-wskt-csirt.png" alt="CSIRT Logo" class="text-white font-bold">
        </div>     
        <div class="flex items-center">    
            <a href="{{ url('/') }}" class="navitem text-white text-xl px-5">Beranda</a>    
            <a href="{{ url('/about') }}" class="navitem text-white text-xl px-5">Tentang Kami</a>    
            <a href="{{ url('/services') }}" class="navitem text-white text-xl px-5">Layanan</a>    
            <a href="{{ url('/info') }}" class="navitem text-white text-xl px-5">Informasi</a>    
            <a href="{{ url('/report') }}" class="rounded-full report-btn py-2 nav-btn navitem text-white text-xl px-5 flex items-center ml-5">  
                <img src="{{ URL::asset('images/security-safe.svg'); }}" alt="" class="inline-block mr-2" style="vertical-align: middle; width: 20px; height: 20px;">  
                Aduan Siber  
            </a>    
        </div>    
    </div>    
</nav>