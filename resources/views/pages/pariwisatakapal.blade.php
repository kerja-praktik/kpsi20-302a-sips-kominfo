@extends('layouts.app', ['activePage' => 'table', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
            </div>
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.index', 'formulir-pariwisata-jenis-kapal')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisata')}}">Jumlah Wisata yang Berkunjung Menurut Bulan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisataobjek')}}">Potensi dan Objek Pariwisata Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatahotel')}}">Jumlah Hotel dan Akomodasi</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatakunjungan')}}">Jumlah Kunjungan Kapal Penumpang Beserta Barang dan Angkutan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatakapal')}}">Jumlah Perahu/Kapal</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatarestoran')}}">Jumlah Restoran/Rumah Makan</a>
        
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
                        <h4 class="card-title" align="center">Jumlah Perahu/Kapal</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisatakapal/exportpdf36" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Perahu Tanpa Motor</td>
                                    <td align="center"><b>Perahu Motor Tempel</td>
                                    <td align="center"><b>Kapal Motor</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl35 as $tabel35) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel35 -> kecamatan}}</td>
                                    <td align="center">{{number_format($tabel35->perahu_tanpa_motor, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel35->perahu_motor_tempel, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel35->kapal_motor, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel35 -> tahun}}</td>
                                    <td align="center">{{$tabel35 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit36/'.$tabel35->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus37/{{ $tabel35->id }}">Hapus</a>
                    </td>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal2,0,",",".")}}</td>
                                    <td align="center"><b><b></td>
                                    <td align="center"><b><b></td>
                                    <td align="center"></td>
                                </tbody>
                            </table>
                            {{ $tbl35->links() }}
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Perahu/Kapal' 
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories35)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Perahu Tanpa Motor',
        data: {!!json_encode($data35)!!}

    }, {
        name: 'Jumlah Perahu Motor Tempel',
        data: {!!json_encode($data35a)!!}

    }, {
        name: 'Jumlah Kapal Motor',
        data: {!!json_encode($data35b)!!}

    }]
});
    </script>
@stop