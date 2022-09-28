@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
@include('admin.notification.index')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    {{-- @if (Auth::user()->role == 'admin') --}}
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                        <a href="{{ route('laporanMingguan') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Laporan Mingguan</h6>
    
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2"></h3>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <a href="{{ route('laporanBulanan') }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Laporan Bulanan</h6>
        
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <h3 class="mb-2"></h3>
                                        </div>
                                        <div class="col-6 col-md-12 col-xl-7">
                                            <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <a href="{{ route('laporanTahunan') }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Laporan Tahunan</h6>
        
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <h3 class="mb-2"></h3>
                                        </div>
                                        <div class="col-6 col-md-12 col-xl-7">
                                            <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endif --}}
    <!-- row -->

</div>
@include('admin.layout.footer')
