@extends('layouts.app', ['activePage' => 'pendidikansd', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
            </div>
            <div class="col-md-12">
                    <div id="chart">
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
                                <a href="{{route('page.index', 'formulir-pendidikan-sd')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikanpaud')}}">Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikansd')}}">Jumlah SD, Murid, Guru, serta Lembaga Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikansltp')}}">Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</a>
        
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
            
                        <h4 class="card-title" align="center">Jumlah SD, Murid, Guru, serta Lembaga Kabupaten Toba</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pendidikansd/exportpdf40" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Jumlah SD</td>
                                    <td align="center"><b>Jumlah Guru</td>
                                    <td align="center"><b>Jumlah Murid</td>
                                    <td align="center"><b>Negeri</td>
                                    <td align="center"><b>Swasta</td>
                                    <td align="center"><b>MI/MTs</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl40 as $tabel40)
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel40 -> kecamatan}}</td>
                                    <td align="center">{{$tabel40 -> tahun}}</td>
                                    <td align="center">{{number_format($tabel40->jumlah_sd, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel40->jumlah_guru, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel40->jumlah_murid, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel40->negeri, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel40->swasta, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel40->Madrasah_Ibtidaiyah_Tsanawiyah, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel40 -> status}}</td>
                                
                                    <td>
                                <a href="{{ url('/edit40/'.$tabel40->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus40/{{ $tabel40->id }}" >Hapus</a>
                    </td>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahsd,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsd1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsd2,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsd3,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsd4,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsd5,0,",",".")}}</td>
                                </tbody>
                            </table>
                            {{ $tbl40->links() }}
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
        text: 'Jumlah SD, Murid, dan Guru Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories40)!!},
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
        name: 'Jumlah SD',
        data: {!!json_encode($data40)!!}

    }, {
        name: 'Jumlah Guru',
        data: {!!json_encode($data40a)!!}

    }, {
        name: 'Jumlah Murid',
        data: {!!json_encode($data40b)!!}

    }]
});
    </script>
@stop


@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Lembaga SD Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories36)!!},
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
        name: 'Jumlah Negeri',
        data: {!!json_encode($data36)!!}

    },
    {
        name: 'Jumlah Swasta',
        data: {!!json_encode($data36a)!!}

    },
    {
        name: 'Jumlah MI/MTs',
        data: {!!json_encode($data36b)!!}

    }]
});
    </script>
@stop
