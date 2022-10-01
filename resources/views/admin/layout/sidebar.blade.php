<div class="main-wrapper">
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            MKP<span>Buru</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'penjual')
            <li class="nav-item nav-category">Web Apps</li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('kategoriproduk.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Kategori Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ongkir.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Ongkos Kirim</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'penjual')
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">Daftar Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan') }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Laporan Penjualan</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'penjual')
            <li class="nav-item nav-category">Extra</li>
            @endif
            @if (Auth::user()->role == 'penjual')
                <li class="nav-item">
                    <a href="{{ route('pesanan.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Lihat Pesanan</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('akun.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Kelola Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Contact</span>
                    </a>
                </li>
            @endif
                <li class="nav-item">
                    <a href="{{ route('chat.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Chat</span>
                    </a>
                </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
