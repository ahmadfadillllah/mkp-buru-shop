@include('home.layout.head')
@include('home.layout.header')
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
        @include('auth.notification.index')
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
                    @include('home.modal.detailproduk')
                    <div class="custom-col-three-5 custom-col-style-5 mb-65">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ asset('admin/template/assets/images') }}/{{ $p->gambarproduk1 }}"
                                        style="border-radius: 10px">
                                </a>
                                <div class="product-action">
                                    @if (Auth::user())
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    @endif
                                    <a class="animate-right" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#detailProduk{{ $p->id }}" href="detailProduk{{ $p->id }}">
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
@include('home.layout.footer')
