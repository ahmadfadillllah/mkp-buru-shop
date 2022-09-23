@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftara Produk</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.notification.index')
                    @include('admin.produk.modal.tambah')
                    <button type="button" class="btn btn-inverse-primary" data-bs-toggle="modal" data-bs-target="#tambahProduk" style="float: right">Tambah Produk</button>
                    <h6 class="card-title">Daftar Produk</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            @foreach ($produk as $p)
            @include('admin.produk.modal.edit')
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ $p->namaproduk }}</h6>
                        <div class="card">
                            <img src="{{ asset('admin/template/assets/images') }}/{{ $p->gambarproduk1 }}" class="card-img-top" alt="Gambar tidak ditemukan" width="100">
                            <div class="card-body">
                                Kategori: <span class="badge border border-secondary text-secondary">{{ $p->kategoriproduk }}</span>
                                <hr>
                                Harga: <span class="badge border border-primary text-primary">@currency($p->hargaproduk)</span>
                                <hr>
                                Stok: <span class="badge border border-info text-info">{{ $p->stokproduk }}</span>
                                <hr>
                            <p class="card-text">{{ $p->deskripsiproduk }}</p>
                            <br>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editProduk{{ $p->id }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('produk.delete', $p->id) }}" class="btn btn-inverse-danger" onclick="return confirm('Yakin Hapus?')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</div>
@include('admin.layout.footer')
