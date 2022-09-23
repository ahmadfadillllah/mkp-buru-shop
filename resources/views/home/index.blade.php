<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} - Homepage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home') }}/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/icofont.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/bundle.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/responsive.css">
    <script src="{{ asset('home') }}/assets/js/vendor/modernizr-3.11.7.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <a href="index.html">
                            <img src="{{ asset('home') }}/assets/img/logo/2.png" alt="">
                        </a>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="#">home</a>
                                    <ul class="single-dropdown">
                                        <li><a href="index.html">Fashion</a></li>
                                        <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                        <li><a href="index-fruits.html">fruits</a></li>
                                        <li><a href="index-book.html">book</a></li>
                                        <li><a href="index-electronics.html">electronics</a></li>
                                        <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                        <li><a href="index-food.html">food & drink</a></li>
                                        <li><a href="index-furniture.html">furniture</a></li>
                                        <li><a href="index-handicraft.html">handicraft</a></li>
                                        <li><a target="_blank" href="index-smart-watch.html">smart watch</a></li>
                                        <li><a href="index-sports.html">sports</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul class="single-dropdown">
                                        <li><a href="about-us.html">about us</a></li>
                                        <li><a href="menu-list.html">menu list</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="register.html">register</a></li>
                                        <li><a href="cart.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">shop</a>
                                    <div class="category-menu-dropdown shop-menu">
                                        <div class="category-dropdown-style category-common2 mb-30">
                                            <h4 class="categories-subtitle"> shop layout</h4>
                                            <ul>
                                                <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                                <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                                <li><a href="shop.html">grid 4 column</a></li>
                                                <li><a href="shop-grid-box.html">grid box style</a></li>
                                                <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                                <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                                <li><a href="shop-list-box.html">list box style</a></li>
                                                <li><a href="cart.html">shopping cart</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-dropdown-style category-common2 mb-30">
                                            <h4 class="categories-subtitle"> product details</h4>
                                            <ul>
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-2.html">tab style 2</a></li>
                                                <li><a href="product-details-3.html"> tab style 3</a></li>
                                                <li><a href="product-details-4.html">sticky style</a></li>
                                                <li><a href="product-details-5.html">sticky style 2</a></li>
                                                <li><a href="product-details-6.html">gallery style</a></li>
                                                <li><a href="product-details-7.html">gallery style 2</a></li>
                                                <li><a href="product-details-8.html">fixed image style</a></li>
                                                <li><a href="product-details-9.html">fixed image style 2</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-banner-img">
                                            <a href="single-product.html">
                                                <img src="{{ asset('home') }}/assets/img/banner/18.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="blog.html">blog</a>
                                    <ul class="single-dropdown">
                                        <li><a href="blog.html">blog 3 colunm</a></li>
                                        <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart">
                        <a class="icon-cart-furniture" href="#">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count-furniture green">02</span>
                        </a>
                        <ul class="cart-dropdown">
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="{{ asset('home') }}/assets/img/cart/1.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="{{ asset('home') }}/assets/img/cart/2.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="{{ asset('home') }}/assets/img/cart/3.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="cart-space">
                                <div class="cart-sub">
                                    <h4>Subtotal</h4>
                                </div>
                                <div class="cart-price">
                                    <h4>$240.00</h4>
                                </div>
                            </li>
                            <li class="cart-btn-wrapper">
                                <a class="cart-btn btn-hover" href="#">view cart</a>
                                <a class="cart-btn btn-hover" href="#">checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">Fashion</a></li>
                                            <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                            <li><a href="index-fruits.html">Fruits</a></li>
                                            <li><a href="index-book.html">book</a></li>
                                            <li><a href="index-electronics.html">electronics</a></li>
                                            <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                            <li><a href="index-food.html">food & drink</a></li>
                                            <li><a href="index-furniture.html">furniture</a></li>
                                            <li><a href="index-handicraft.html">handicraft</a></li>
                                            <li><a href="index-smart-watch.html">smart watch</a></li>
                                            <li><a href="index-sports.html">sports</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="menu-list.html">menu list</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="cart.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">shop</a>
                                        <ul>
                                            <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                            <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                            <li><a href="shop.html">grid 4 column</a></li>
                                            <li><a href="shop-grid-box.html">grid box style</a></li>
                                            <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                            <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                            <li><a href="shop-list-box.html">list box style</a></li>
                                            <li><a href="product-details.html">tab style 1</a></li>
                                            <li><a href="product-details-2.html">tab style 2</a></li>
                                            <li><a href="product-details-3.html"> tab style 3</a></li>
                                            <li><a href="product-details-4.html">sticky style</a></li>
                                            <li><a href="product-details-5.html">sticky style 2</a></li>
                                            <li><a href="product-details-6.html">gallery style</a></li>
                                            <li><a href="product-details-7.html">gallery style 2</a></li>
                                            <li><a href="product-details-8.html">fixed image style</a></li>
                                            <li><a href="product-details-9.html">fixed image style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact </a></li>
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
                        <ul>
                            <li>Get Access: <a href="login.html">Login </a></li>
                            <li><a href="register.html">Reg </a></li>
                        </ul>
                    </div>
                    <div class="furniture-search">
                        <form action="#">
                            <input placeholder="I am Searching for . . ." type="text">
                            <button>
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider-4 slider-height-6 bg-img"
                style="background-image: url({{ asset('home') }}/assets/img/slider/figure1-home.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="ms-auto col-lg-6">
                            <div class="furniture-content fadeinup-animated">
                                <h2 class="animated">Comfort <br>Collection.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-4 slider-height-6 bg-img"
                style="background-image: url({{ asset('home') }}/assets/img/slider/figure2-home.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="ms-auto col-lg-6">
                            <div class="furniture-content fadeinup-animated">
                                <h2 class="animated">Comfort <br>Collection.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area start -->
    <div class="product-style-area pt-120">
        <div class="coustom-container-fluid">
            <div class="section-title-7 text-center">
                <h2>Semua Produk</h2>
                <p>Daftar produk yang dijual</p>
            </div>
            <div class="product-tab-list text-center mb-65 nav" role="tablist">
                <a class="active" href="#furniture1" data-bs-toggle="tab" role="tab">
                    <h4>Home </h4>
                </a>
                @foreach ($kategoriproduk as $kp)
                <a href="#{{ $kp->namakategori }}" data-bs-toggle="tab" role="tab">
                    <h4>{{ $kp->namakategori }} </h4>
                </a>
                @endforeach
            </div>
            <div class="tab-content">
                <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
                    <div class="coustom-row-5">
                        @foreach ($produk as $p)
                        <div class="custom-col-three-5 custom-col-style-5 mb-65">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ asset('admin/template/assets/images') }}/{{ $p->gambarproduk1 }}" style="border-radius: 10px">
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-top" title="Add To Cart" href="#">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-right" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#detailProduk{{ $p->id }}" href="#">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="product-details.html">{{ $p->namaproduk }}</a></h4>
                                    <span>@currency($p->hargaproduk)</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area end -->
    <!-- services area start -->
    <div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
        <div class="container-fluid">
            <div class="services-wrapper">
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('home') }}/assets/img/icon-img/26.png" alt="">
                    </div>
                    <div class="services-content">
                        <h4>Free Shippig</h4>
                    </div>
                </div>
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('home') }}/assets/img/icon-img/27.png" alt="">
                    </div>
                    <div class="services-content">
                        <h4>24/7 Support</h4>
                    </div>
                </div>
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('home') }}/assets/img/icon-img/28.png" alt="">
                    </div>
                    <div class="services-content">
                        <h4>Secure Payments</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services area end -->
    <!-- footer area start -->
    <footer class="footer-area">
        <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
            <div class="container-fluid">
                <div class="widget-wrapper">
                    <div class="footer-widget mb-30">
                        <h2>{{ config('app.name') }}</h2>
                        <div class="footer-about-2">
                            <p>IMPLEMENTASI BUSINESS TO CUSTOMER PADA <br>
                                BISNIS PENJUALAN MINYAK KAYU PUTIH <br>
                                KHAS PULAU BURU BERBASIS WEB</p>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">Contact Info</h3>
                        <div class="footer-info-wrapper-3">
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Address: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>Fakultas Ilmu Komputer <br> Universitas Muslim Indonesia</p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Phone: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>+62 823-9814-3023</p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>E-mail: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p><a href="#"> admin@</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom ptb-20 gray-bg-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright-furniture">
                            <p>Copyright © <a href="/">{{ config('app.name') }}</a> 2022 . All Right Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- modal -->
    @foreach ($produk as $p)
        @include('home.detailproduk')
    @endforeach
    <!-- all js here -->
    <script src="{{ asset('home') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/popper.js"></script>
    <script src="{{ asset('home') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/ajax-mail.js"></script>
    <script src="{{ asset('home') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('home') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('home') }}/assets/js/main.js"></script>
</body>

</html>
