@include('home.layout.head')
@include('home.layout.header')
<div class="breadcrumb-area pt-205 pb-210"
    style="background-image: url(https://template.hasthemes.com/ezone/ezone/assets/img/bg/breadcrumb.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>checkout</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form action="#">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <p style="color: red">Harap mengisi dengan benar, jika salah diluar tanggung jawab kami!</p>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Nama <span class="required">*</span></label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>No. Handphone<span class="required">*</span></label>
                                    <input type="number" name="nohp" value="{{ Auth::user()->nohp }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Alamat <span class="required">*</span></label>
                                    <input type="text" name="alamat" value="{{ Auth::user()->alamat }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Provinsi<span class="required">*</span></label>
                                    <input type="text" name="provinsi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Kota/Kabupaten<span class="required">*</span></label>
                                    <input type="text" name="kota">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Kecamatan<span class="required">*</span></label>
                                    <input type="text" name="kecamatan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="number" name="postcode" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $c)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{ $c->namaproduk }} <strong class="product-quantity"> ×
                                            {{ $c->quantity }}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">@currency($c->hargaproduk * $c->quantity)</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">@currency($total)</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <h6>Pilih metode pembayaran</h6>
                        <div class="payment-accordion">
                            <div class="panel-group" id="faq">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a data-bs-toggle="collapse" aria-expanded="true"
                                                href="#payment-1">> Bank Transfer atau QRIS</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse" data-bs-parent="#faq">
                                        <div class="panel-body">
                                            <div class="order-button-payment">
                                                <input type="submit" value="Bayar" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a class="collapsed" data-bs-toggle="collapse"
                                                aria-expanded="false" href="#payment-2">> Cash On Delivery (COD)</a>
                                        </h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                        <div class="panel-body">
                                            <div class="order-button-payment">
                                                <input type="submit" value="Pilih" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.layout.footer')
