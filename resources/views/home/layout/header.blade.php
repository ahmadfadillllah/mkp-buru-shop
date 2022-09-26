<header>
    <div class="header-top-furniture wrapper-padding-2 res-header-sm">
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="logo-2 furniture-logo ptb-30">
                    <h3>MKP Buru Shop</h3>
                </div>
                <div class="menu-style-2 furniture-menu menu-hover">
                    <nav>
                        <ul>
                            @if (Auth::user())
                                    <li><a href="{{ route('home.index') }}"> Home </a></li>
                                    <li><a href="{{ route('home.about') }}"> About </a></li>
                                    <li><a href="{{ route('contact.customer') }}"> Contact </a></li>
                            @else
                                    <li><a href="{{ route('homepage') }}"> Home </a></li>
                                    <li><a href="{{ route('about') }}"> About </a></li>
                                    <li><a href="{{ route('contact') }}"> Contact </a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @if(Auth::user())
                    @include('home.modal.cart')
                @endif
            </div>
            <div class="row">
                <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                @if (Auth::user())
                                    <li><a href="{{ route('home.index') }}"> Home </a></li>
                                    <li><a href="{{ route('home.about') }}"> About </a></li>
                                    <li><a href="{{ route('contact.customer') }}"> Contact </a></li>
                                @else
                                    <li><a href="{{ route('homepage') }}"> Home </a></li>
                                    <li><a href="{{ route('about') }}"> About </a></li>
                                    <li><a href="{{ route('contact') }}"> Contact </a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
        <div class="container-fluid">
            <div class="furniture-bottom-wrapper">
                <div class="furniture-login">
                    @if (Auth::user())
                    <ul>
                        <li><a href="{{ route('settings.index') }}">Profile </a></li>
                        <li><a href="{{ route('logout') }}">Logout </a></li>
                        <li><a href="{{ route('pesanan.show') }}">Lihat Pesanan </a></li>
                    </ul>
                    @else
                    <ul>
                        <li>Get Access: <a href="{{ route('logincustomer') }}">Login </a></li>
                        <li><a href="{{ route('registercustomer') }}">Reg </a></li>
                    </ul>
                    @endif

                </div>
                <div class="furniture-search">
                    <form action="#">
                        <input placeholder="Cari Produk..." type="text">
                        <button>
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
