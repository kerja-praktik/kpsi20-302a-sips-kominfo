@extends('layouts.app', ['activePage' => 'pemerintahan_jlh_desa_kel', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
                <div class="col-md-12">
               
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a>
                    
                    <div class="col-12 text-right">
                                <a href="{{route('page.pemerintahan', 'formulir-jumlah-desa-kelurahan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                    </div>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.pemerintahan', 'pemerintahan_jlh_desa_kel')}}">Jumlah Desa dan Kelurahan Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.pemerintahan', 'pemerintahan_jlh_penduduk_wilayah_kepadatan')}}">Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</a>
                   
                    </div>
                      
                        <h4 class="card-title" align="center">Jumlah Desa dan Kelurahan Menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                            <form action="/pemerintahan_jlh_desa_kel" method ="GET" class="header_search_form clearfix">
                                        <input type="text" name="cari" id="query" value="{{ request()->input('search') }}" required="required" 
                                        class="header_search_input" placeholder="Search product...">
                                        <button type="submit" class="header_search_button trans_300" value="Submit">
                                            <i class="fas fa-search" style="font-size:20px"></i></button>
                            </form>

                    
                    <a href="/pemerintahan_jlh_desa_kel/exportpdf1" class="btn btn-sm btn-warning">CETAK PDF</a>          
                    
                    </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                    <td align="center" rowspan="2"><b><b>No</b></td>
                                    <td align="center" rowspan="2"><b>Kecamatan</b></td>

                                    <td align="center" colspan="2"><b>Jumlah</b></td>

                                   

                                    <td align="center" rowspan="2"><b>Total</b></td>
                                    <td align="center" rowspan="2" ><b>Tahun </b></td> 
                                    <td align="center" rowspan="2" ><b>Status </b></td>
                                    <td rowspan="2"><b>Aksi</b></td>      
                                    </tr>

                                    <tr> 
                                    <td align="center"><b>Desa</b></td>
                                    <td align="center"><b>Kelurahan</b></td>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl43 as $tabel43)
                              
                                    <tr>
                                 
                                    <td align="center">{{$tabel43->kecamatan}}</td>
                                    <td align="center">{{$tabel43->Jumlah_Desa}}</td>
                                    <td align="center">{{$tabel43->Jumlah_Kelurahan}}</td>
                                   
                                    <td align="center">{{$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan}}</td>
                                    <td align="center">{{$tabel43->tahun}}</td>
                                    <td align="center">{{$tabel43->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit1/'.$tabel43->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/desa-kelurahan/hapus/{{ $tabel43->id }}">Hapus</a> 
                                    
                                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><b></b></td>
                                    <td align="center"><b>Jumlah</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_desa,0,",",".")}}</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_kelurahan,0,",",".")}}</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_total,0,",",".")}}</b></td>
                                    <td align="center"><b></b></td>     
                                    <td><b></b></td>
                                    <td><b></b></td>
                                </tr>
                                </tbody>
                            </table>
                            {{ $tbl43->links() }}
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
        text: 'Jumlah Desa Dan Kelurahan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories43)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
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
        name: 'Desa',
        data: {!!json_encode($data43a)!!}

    }, {
        name: 'Kelurahan',
        data: {!!json_encode($data43b)!!}

    }]
});
   
    // });
    </script>
@stop