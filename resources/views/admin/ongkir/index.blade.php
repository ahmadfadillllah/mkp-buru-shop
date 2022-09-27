@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Harga Ongkos Kirim</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Harga Ongkos Kirim</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kota</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kota as $k)
                                @include('admin.ongkir.modal.edit')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>@currency($k->ongkir)</td>
                                    <td><button type="button" class="btn btn-outline-warning mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#editOngkir{{ $k->id }}">Edit</button></td>
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
