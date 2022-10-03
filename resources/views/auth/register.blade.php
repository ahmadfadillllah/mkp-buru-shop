@include('auth.layout.head')
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper">
                                </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    @include('auth.notification.index')
                                    <a href="#" class="noble-ui-logo d-block mb-2">{{ config('app.name') }}</a>
                                    <h5 class="text-muted fw-normal mb-4">Selamat Datang, Registrasi tokomu sekarang!</h5>
                                    <form class="forms-sample" action="{{ route('register.post') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">No. Handphone</label>
                                            <input type="number" class="form-control" name="nohp" value="{{ old('nohp') }}" placeholder="No. Handphone">
                                        </div>
                                        <div class="mb-3">
                                        @php
                                            $provinces = new \App\Http\Controllers\DependantDropdownController;
                                            $provinces= $provinces->provinces();
                                        @endphp
                                            <label for="userEmail" class="form-label">Provinsi</label>
                                            <select class="form-control" name="provinsi_id" id="provinsi" required>
                                                <option>==Pilih Salah Satu==</option>
                                                @foreach ($provinces as $item)
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Kota / Kabupaten</label>
                                            <select class="form-control" name="kota_id" id="kota" required>
                                                <option>==Pilih Salah Satu==</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Kecamatan</label>
                                            <select class="form-control" name="kecamatan_id" id="kecamatan" required>
                                                <option>==Pilih Salah Satu==</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Kelurahan</label>
                                            <select class="form-control" name="kelurahan_id" id="desa" required>
                                                <option>==Pilih Salah Satu==</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Zip Code</label>
                                            <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" value="{{ old('zipcode') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Alamat Lengkap</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                autocomplete="current-password" placeholder="Konfirmasi Password">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Register</button>
                                        </div>
                                    </form>
                                    <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Sudah punya
                                        akun? login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('auth.layout.footer')
