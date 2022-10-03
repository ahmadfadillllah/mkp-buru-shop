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
                    <h3 class="footer-widget-title-5">Info Kontak</h3>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                $('#' + name).empty();
                $('#' + name).append('<option>==Pilih Salah Satu==</option>');
                $.each(data, function (key, value) {
                    $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
    $(function () {
        $('#provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
        });
        $('#kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
        })
        $('#kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
        })
    });

</script>
</body>

</html>
