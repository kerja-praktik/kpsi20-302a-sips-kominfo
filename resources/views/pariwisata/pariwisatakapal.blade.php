@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
     
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div>
                            </div>
                            <div class="carousel-item">
                            <div id="chart2"></div>   
                            </div>
                            <div class="carousel-item">
                            <div id="chart3"></div>   
                        </div>
                        </div>
                        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                        <h4 class="card-title" align="center">Jumlah Perahu/Kapal</h4>


                           
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisatakapal/exportpdf36" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Perahu Tanpa Motor</td>
                                    <td align="center"><b>Perahu Motor Tempel</td>
                                    <td align="center"><b>Kapal Motor</td>
                                    <td><b>Tahun</td>
                                   
                                 
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
                                  
                                  
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkapal2,0,",",".")}}</td>
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
      
         <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/pariwisatahotel1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/pariwisata1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek1')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan1')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran1')}}">6</a></li>

            <li class="page-item">
            <a class="page-link" href="{{url('/pariwisataobjek1')}}">Next</a>
            </li>
        </ul>
        </nav>
    
@endsection

@section('chart')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Perahu Tanpa Motor'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories35)!!},
        crosshair: true,
            
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

    }]
});
    </script>
@stop

@section('charts')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Perahu Motor Tempel'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories35)!!},
        crosshair: true,
            
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
     name: 'Jumlah Perahu Motor Tempel',
        data: {!!json_encode($data35a)!!}

    }]
});
    </script>
@stop

@section('charts1')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kapal Motor'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories35)!!},
        crosshair: true,
            
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
        name: 'Jumlah Kapal Motor',
        data: {!!json_encode($data35b)!!}

    }]
});
    </script>
@stop
