@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Akun</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.notification.index')
                    <h6 class="card-title">Akun</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Handphone</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akun as $a)
                                @include('admin.akun.modal.edit')
                                @include('admin.akun.modal.gantipassword')
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset('admin/template/assets/images') }}/{{ Auth::user()->avatar }}" height="100"></td>
                                        <td>{{ $a->name }}</td>
                                        <td>{{ $a->email }}</td>
                                        <td>{{ $a->nohp }}</td>
                                        <td>{{ $a->role }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#editAkun{{ $a->id }}">Edit</button>
                                            <button type="button" class="btn btn-outline-danger mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#gantiPassword{{ $a->id }}">Ganti Password</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.layout.footer')
