@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lihat Pesanan</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.notification.index')
                    <h6 class="card-title">Lihat Pesanan</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pemesan</th>
                                    <th>Status</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>{{ $p->metode_pembayaran }}</td>
                                    <td>
                                        @if($p->status == 'Sudah Dipesan')
                                        <form action="{{ route('konfirmasi-pesanan') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="idPesanan" value="{{ $p->id }}">
                                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                                        </form>
                                        @elseif($p->status == 'Pesanan Dikonfirmasi')
                                            <form action="{{ route('dalam-perjalanan') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="idPesanan" value="{{ $p->id }}">
                                                <button type="submit" class="btn btn-success">Dalam Perjalanan</button>
                                            </form>
                                        @elseif($p->status == 'Pesanan Dalam Perjalanan')
                                            <form action="{{ route('selesai') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="idPesanan" value="{{ $p->id }}">
                                                <button type="submit" class="btn btn-success">Pesanan Selesai</button>
                                            </form>
                                        @elseif($p->status == 'Pesanan Selesai')
                                                <button type="button" class="btn btn-success">Pesanan Selesai</button>
                                        @endif
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
