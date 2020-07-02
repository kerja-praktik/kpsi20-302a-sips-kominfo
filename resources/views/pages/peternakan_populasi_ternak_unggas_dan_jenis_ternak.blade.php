@extends('layouts.app', ['activePage' => 'peternakan_populasi_ternak_unggas_dan_jenis_ternak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_populasi_ternak_unggas')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_populasi_ternak_besar')}}">Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_jumlah_ternak_dipotong')}}">Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_jumlah_ternak_unggas_dipotong')}}">Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_jumlah_produksi_ternak_unggas')}}">Jumlah Produksi Ternak Unggas</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan_jumlah_populasi_ternak_unggas')}}">Jumlah Populasi Ternak Unggas</a>
                    
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>

                                    
                        <h4 class="card-title" align="center">Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</h4>

               
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>

<!-- TOMBOL SEARCH -->  

<form action="/peternakan_populasi_ternak_unggas_dan_jenis_ternak" method="GET">
   @csrf

   <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" name="cari" class="form-control float-right" placeholder="Search" id="cari">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  </form>
                </div>



<!-- BATAS AKHIR -->






                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Ayam Kampung</td>
                                    <td><b>Ayam Pedaging</td>
                                    <td><b>Ayam Petelor</td>
                                    <td><b>Itik / Itik Manila</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl2 as $tabel2)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel2->kecamatan}}</td>
                                        <td>{{number_format($tabel2->ayam_kampung,0,",",".")}}</td>
                                        <td>{{$tabel2->ayam_pedaging}}</td>
                                        <td>{{$tabel2->ayam_petelor}}</td>
                                        <td>{{$tabel2->itik_itik_manila}}</td>
                                        <td>{{$tabel2->tahun}}</td>
                                        <td>{{$tabel2->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit2/'.$tabel2->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/peternakan_populasi_ternak_unggas_dan_jenis_ternak/hapus2/{{ $tabel2->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td>
                                    <td><b><b>{{number_format($jumlah8,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah9,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah10,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah11,0,",",".")}}</td><b><b>
                                  
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
        text: 'Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1)!!},
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
        name: 'Ayam Kampung',
        data: {!!json_encode($data1)!!}

    },
    {
        name: 'Ayam Pedaging',
        data: {!!json_encode($data1a)!!}

    }, 
    {
        name: 'Ayam Petelor',
        data: {!!json_encode($data1b)!!}

    }   
    
    ]
});
    
    </script>
@stop