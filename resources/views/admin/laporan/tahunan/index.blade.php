@include('admin.layout.head')
<!-- partial:partials/_sidebar.html -->
@include('admin.layout.sidebar')
<!-- partial -->
@include('admin.layout.partial')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Tahunan</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.notification.index')
                    <form action="{{ route('laporanTahunan') }}" method="get">
                        @csrf
                        <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <select class="form-control" name="year" id="nilaiChartMasterTahun">
                                        <?php
                                        for ($x=date("Y"); $x>1900; $x--)
                                        {
                                            echo'<option value="'.$x.'">'.$x.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <select name="status" id="" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="Belum Dipesan">Belum Dipesan</option>
                                        <option value="Sudah Dipesan">Sudah Dipesan</option>
                                        <option value="Sudah Dikonfirmasi">Sudah Dikonfirmasi</option>
                                        <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                        <option value="Pesanan Selesai">Pesanan Selesai</option>
                                    </select>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <select name="pembayaran" id="" class="form-control">
                                        <option value="">Pilih Metode Pembayaran</option>
                                        <option value="COD">COD</option>
                                        <option value="TRANSFER">TRANSFER</option>
                                    </select>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    <h6 class="card-title">Laporan Tahunan</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pemesan</th>
                                    <th>Status</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>{{ $p->metode_pembayaran }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Laporan Tahunan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [{
            name: 'Belum Dipesan',
            y: {{ $belumDipesan }},
        },  {
            name: 'Sudah Dipesan',
            y: {{ $sudahDipesan }}
        },  {
            name: 'Pesanan Dikonfirmasi',
            y: {{ $sudahDikonfirmasi }}
        }, {
            name: 'Pesanan Dalam Perjalanan',
            y: {{ $dalamPerjalanan }}
        }, {
            name: 'Pesanan Selesai',
            y: {{ $pesananSelesai }}
        }]
    }]
});
</script>
@include('admin.layout.footer')
