@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.notification.index')
                    <h6 class="card-title">Daftar Kontak</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Handphone</th>
                                    <th>Subject</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $c)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $c->name }}</th>
                                    <th>{{ $c->email }}</th>
                                    <th>{{ $c->nohp }}</th>
                                    <th>{{ $c->subject }}</th>
                                    <th>{{ $c->message }}</th>
                                    <th>
                                        <a href="{{ route('contact.delete', $c->id) }}" class="btn btn-inverse-danger" onclick="return confirm('Yakin Hapus?')">Delete</a>
                                    </th>
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
