<div class="header d-flex justify-content-between align-items-center p-3 bg-light border-bottom">
    <div class="navigation">
        <!-- <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Kembali</a> -->
        <span class="mx-2">|</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Tentang Kami</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $currentView }}</li>
            </ol>
        </nav>
    </div>
    <div class="profile">
        <i class="fas fa-user-circle fa-2x"></i>
    </div>
</div>

<style>
    .header {
        width: calc(100% - 250px); /* Adjust this value to match the width of the sidebar */
        position: fixed;
        top: 0;
        left: 250px; /* Adjust this value to match the width of the sidebar */
        z-index: 1000;
        background-color: #f8f9fa;
    }
    .navigation {
        display: flex;
        align-items: center;
    }
    .profile {
        display: flex;
        align-items: center;
    }
    .profile i {
        color: #343a40;
    }
</style>