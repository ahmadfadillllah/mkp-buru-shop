@include('home.layout.head')
@include('home.layout.header')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url(https://template.hasthemes.com/ezone/ezone/assets/img/bg/breadcrumb.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>daftar</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> daftar </li>
            </ul>
        </div>
    </div>
</div>
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ms-auto me-auto">
                @include('auth.notification.index')
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                            <form action="{{ route('registercustomer.post') }}" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                <input type="number" name="nohp" placeholder="No. Handphone" value="{{ old('nohp') }}" required>
                                <div class="col-md-12">
                                    @php
                                    $provinces = new \App\Http\Controllers\DependantDropdownController;
                                    $provinces= $provinces->provinces();
                                    @endphp
                                    <div class="country-select">
                                        <label>Provinsi <span class="required">*</span></label>
                                        <select name="provinsi_id" id="provinsi" required>
                                            <option>==Pilih Salah Satu==</option>
                                            @foreach ($provinces as $item)
                                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Kota / Kabupaten <span class="required">*</span></label>
                                        <select name="kota_id" id="kota" required>
                                            <option>==Pilih Salah Satu==</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Kecamatan <span class="required">*</span></label>
                                        <select name="kecamatan_id" id="kecamatan" required>
                                            <option>==Pilih Salah Satu==</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Kelurahan <span class="required">*</span></label>
                                        <select name="kelurahan_id" id="desa" required>
                                            <option>==Pilih Salah Satu==</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="number" name="zipcode" placeholder="Zipcode" value="{{ old('zipcode') }}" required>
                                <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input type="checkbox">
                                        <label>Ingat saya</label>
                                        <a href="{{ route('logincustomer') }}">Sudah punya akun? login</a>
                                    </div>
                                    <button type="submit" class="default-btn floatright">Registrasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.layout.footer')
