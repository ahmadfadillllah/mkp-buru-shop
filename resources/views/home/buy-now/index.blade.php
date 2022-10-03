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
                <div class="checkbox-form">
                    <h3>Detail Pembelian</h3>
                    <p style="color: red">Harap mengisi dengan benar, jika salah diluar tanggung jawab kami!</p>
                    <p>Data ini dapat diubah di halaman profile.</p>
                    <br>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Email<span class="required">*</span></label>
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
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Provinsi<span class="required">*</span></label>
                                <input type="text" name="provinsi" value="{{ Auth::user()->provinsi->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Kota / Kabupaten<span class="required">*</span></label>
                                <input type="text" name="kota" value="{{ Auth::user()->kota->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Kecamatan<span class="required">*</span></label>
                                <input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan->name }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Kelurahan<span class="required">*</span></label>
                                <input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan->name }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Postcode / Zip <span class="required">*</span></label>
                                <input type="number" name="postcode" value="{{ Auth::user()->zipcode }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Produk</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{ $produk->namaproduk }}<strong class="product-quantity"></strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">@currency($total)</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart_item">
                                    <th>Ongkos Kirim</th>
                                    <td><strong><span class="amount">@currency($ongkir['ongkir'])</span></strong>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">@currency($grand_total)</span></strong>
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
                                                <input type="submit" id="pay-button" value="Bayar" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->kota_id == 455)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a class="collapsed" data-bs-toggle="collapse"
                                                    aria-expanded="false" href="#payment-2">> Cash On Delivery (COD)</a>
                                            </h5>
                                        </div>
                                        <div id="payment-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                            <form action="{{ route('buynow.cod') }}" method="post">
                                                @csrf
                                                <div class="panel-body">
                                                    <div class="order-button-payment">
                                                        <input type="text" name="cart_id" value="{{ $produk->id }}" hidden>
                                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                        <input type="submit" value="Pilih" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTIO  N_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $token }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
            let dataId = @json($cartById);
            console.log(dataId);
            var status = "Sudah Dipesan"
            var data = { status: status,idcart :dataId };
            console.log(data);
            var dataType = "json";
            var headers = { "X-CSRF-TOKEN": $('input[name="_token"]').val()};
            $.ajax({
                type: "POST",
                url: "{{ route('checkout.transfer') }}",
                data: data,
                headers: headers,
                success: function(data, status) {
                    var data = data;
                    Swal.fire(
                    'Sukses',
                    'Pembayaran berhasil,Silahkan Cek status Pesanan Anda anda',
                    'success'
                    )
                console.log(data);
                window.location = "/customer/homepage";
                },
                dataType: dataType
            });

        },
        onPending: function(result){
          /* You may add your own implementation here */
        //   alert("wating your payment!"); console.log(result);
        Swal.fire(
                'Upps!',
                'Pembayaran dipending',
                'info'
                )
        },
        onError: function(result){
          /* You may add your own implementation here */
        //   alert("payment failed!"); console.log(result);
          Swal.fire(
                'Gagal',
                'Pembayaran gagal',
                'warning'
                )
        },
        onClose: function(){
          /* You may add your own implementation here */
        //   alert('you closed the popup without finishing the payment');
        Swal.fire(
                'Upps!',
                'Pembayaran ditunda',
                'warning'
                )
        }
      })
    });
</script>

@include('home.layout.footer')
