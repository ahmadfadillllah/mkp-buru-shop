@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="position-relative">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                        <img src="{{ asset('admin/template/assets/images/others/figure.jpg') }}" class="rounded-top"
                            alt="profile cover">
                    </figure>
                    <div
                        class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                        <div>
                            <img class="wd-70 rounded-circle" src="{{ asset('admin/template/assets/images') }}/{{ Auth::user()->avatar }}"
                                alt="profile">
                            <span class="h4 ms-3 text-dark">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="d-none d-md-block">
                            @include('admin.settings.modal.editimage')
                            <button type="button" data-feather="edit" class="btn-icon-prepend" data-bs-toggle="modal" data-bs-target="#editImage">Edit Gambar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-6 col-xl-6 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        @include('admin.settings.modal.editprofile')
                        <h6 class="card-title mb-0">Tentang</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile" style="float: right">
                            Edit
                          </button>
                    </div>
                    <p>Hi! saya {{ Auth::user()->name }} sebagai {{ Auth::user()->role }}</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Tanggal Masuk:</label>
                        <p class="text-muted">{{ Auth::user()->created_at }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">No.Handphone:</label>
                        <p class="text-muted">{{ Auth::user()->nohp }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Provinsi:</label>
                        <p class="text-muted">{{  Auth::user()->provinsi->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Kota/Kabupaten:</label>
                        <p class="text-muted">{{  Auth::user()->kota->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Kecamatan:</label>
                        <p class="text-muted">{{  Auth::user()->kecamatan->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Kelurahan:</label>
                        <p class="text-muted">{{  Auth::user()->kelurahan->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Zip Code:</label>
                        <p class="text-muted">{{  Auth::user()->zipcode }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Alamat:</label>
                        <p class="text-muted">{{ Auth::user()->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-6 col-xl-6 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    @include('admin.notification.index')
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">Ganti Password</h6>
                    </div>
                    <form action="{{ route('settings.changepassword') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="formFile">Password sekarang</label>
                            <input class="form-control" name="passwordsekarang" type="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="formFile">Password baru</label>
                            <input class="form-control" name="passwordbaru" type="password">
                        </div>
                        <button type="submit" class="btn btn-inverse-warning mb-1 mb-md-0">Ganti password</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
    </div>

</div>
@include('admin.layout.footer')
