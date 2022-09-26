<div class="header-cart">
    <a class="icon-cart-furniture" href="#">
        <i class="ti-shopping-cart"></i>
        <span class="shop-count-furniture green">{{ count($cart) }}</span>a
    </a>
    <ul class="cart-dropdown">
        @foreach ($cart as $c)
            <li class="single-product-cart">
                <div class="cart-img">
                    <a href="#"><img src="{{ asset('admin/template/assets/images') }}/{{ $c->gambarproduk1 }}" alt="" height="100"></a>
                </div>
                <div class="cart-title">
                    <h5><a href="#"> {{ $c->namaproduk }}</a></h5>
                    <h6><a href="#">{{ $c->kategoriproduk }}</a></h6>
                    <span>{{ $c->hargaproduk }} x {{ $c->quantity }}</span>
                </div>
                <div class="cart-delete">
                    <a href="{{ route('home.delete', $c->id) }}"><i class="ti-trash"></i></a>
                </div>
            </li>
        @endforeach
        <li class="cart-space">
            <div class="cart-sub">
                <h4>Subtotal</h4>
            </div>
            <div class="cart-price">
                <h4>@currency($total)</h4>
            </div>
        </li>
        <li class="cart-btn-wrapper">
            <a class="cart-btn btn-hover" href="{{ route('cart.index') }}">view cart</a>
            <a class="cart-btn btn-hover" href="{{ route('checkout.index') }}">checkout</a>
        </li>
    </ul>
</div>
