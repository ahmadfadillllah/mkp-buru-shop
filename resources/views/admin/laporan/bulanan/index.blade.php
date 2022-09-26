@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Bulanan</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- @include('admin.kategoriproduk.modal.tambah') --}}
                    {{-- <button type="button" class="btn btn-inverse-primary" data-bs-toggle="modal" data-bs-target="#tambahKategori" style="float: right">Tambah Kategori</button> --}}
                    <h6 class="card-title">Laporan Bulanan</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($kategoriproduk as $kp)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $kp->namakategori }}</td>
                                        <td>{{ $kp->deskripsikategori }}</td>
                                        <td><img src="{{ asset('admin/template/assets/images/kategoriproduk') }}/{{ $kp->gambarkategori }}" alt="Gambar tidak ditemukan" style="border-radius: 80px"></td>
                                        <td><button type="button" class="btn btn-outline-warning mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#editKategori{{ $kp->id }}">Edit</button></td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.layout.footer')
