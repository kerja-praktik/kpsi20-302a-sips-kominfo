@extends('layouts.app', ['activePage' => 'jumlah_industri_dan_tenaga_kerja', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_jumlah_industri_dan_tenaga_kerja')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                   
                    <a class="dropdown-item" href="{{route('page.index', 'daftar_industri_kecil_dan_menengah')}}">Daftar Industri Kecil dan Menengah Kab. Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'jumlah_industri_dan_tenaga_kerja')}}">Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah Menurut Kecamatan</a>
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/perindustrian/exportpdf14" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Industri Kecil dan Menengah</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl14 as $tabel14)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel14->kecamatan}}</td>
                                    <td align="center">{{$tabel14->industri_kecil_dan_menengah}}</td>
                                    <td align="center">{{$tabel14->tenaga_kerja}}</td>    
                                    <td align="center">{{$tabel14->tahun}}</td>
                                    <td align="center">{{$tabel14->status}}</td>
                                    <td>
                                <a href="{{ url('/edit14/'.$tabel14->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger" href="/jumlah_industri_dan_tenaga_kerja/hapus14/{{ $tabel14->id }}">Hapus</a>
                        
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$jumlah67}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah68}}</td><b><b>
                                   
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    


                                </tbody>
                            </table>
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
        text: 'Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories14)!!},
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
        name: 'Industri Kecil dan Menengah',
        data: {!!json_encode($data14)!!}

    }, {
        name: 'Tenaga Kerja',
        data: {!!json_encode($data14a)!!}

    }]
    
});
    </script>
@stop