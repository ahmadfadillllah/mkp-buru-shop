@include('home.layout.head')
@include('home.layout.header')
<div class="breadcrumb-area pt-205 pb-210"
    style="background-image: url(https://template.hasthemes.com/ezone/ezone/assets/img/bg/breadcrumb.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>pesanan saya</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> pesanan saya </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Pesanan Saya</h1>
                @include('auth.notification.index')
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>gambar</th>
                                    <th>produk</th>
                                    <th>harga</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $c)
                                <input type="text" name="id[]" value="{{ $c->id }}" hidden>
                                    <tr>
                                        <td class="product-name"><a href="javascript:void(0);">{{ $c->status }}</a></td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{ asset('admin/template/assets/images/') }}/{{ $c->gambarproduk1 }}" height="100" style="border-radius: 10px"></a>
                                        </td>
                                        <td class="product-name"><a href="javascript:void(0);">{{ $c->namaproduk }}</a></td>
                                        <td class="product-price-cart"><span class="amount">@currency($c->hargaproduk)</span></td>
                                        <td class="product-price-cart"><span class="amount">{{ $c->quantity }}</span></td>
                                        <td class="product-subtotal">@currency($c->hargaproduk * $c->quantity)</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('home.layout.footer')
