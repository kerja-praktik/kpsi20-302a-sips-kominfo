@extends('layouts.app', ['activePage' => 'infrastruktur_jembatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.infrastruktur', 'formulir-jembatan')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_aplikasi_opd_toba')}}">Aplikasi OPD Kabupaten Toba</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan')}}">Panjang Jalan Menurut Jenis Permukaan dan Kondisi</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_jembatan')}}">Jembatan Menurut Status dan Keadaan</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan_kabupaten')}}">Panjang Jalan Kabupaten Menurut Kecamatan</a>                        
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Jembatan Menurut Status dan Keadaan</h4>

                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_jembatan/exportpdf6" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr align="center">
                                    <td align="center" ><b>No</b></td>
                                    <td align="center" ><b>Keadaan</b></td>
                                    <td align="center" ><b>Jumlah Jembatan</b></td>
                                    <td align="center"><b>Status </b></td>
                                    <td align="center"><b>Tahun</b></td>
                                    <td><b>Aksi</b></td>
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl48 as $tabel48)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel48->keadaan}}</td>
                                    <td align="center">{{$tabel48->jumlah_jembatan}} unit</td>
                                    <td align="center">{{$tabel48->status}}</td>
                                    <td align="center">{{$tabel48->tahun}}</td>

                                    <td>
                                    <a href="{{ url('/edit6/'.$tabel48->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/jembatan/hapus/{{ $tabel48->id }}">Hapus</a>
                                    </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                            {{ $tbl48->links() }}
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
        text: 'Jembatan Menurut Status dan Keadaan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories48)!!},
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
        name: 'Keadaan Jembatan',
        data: {!!json_encode($data48a)!!}

    }]
});
    
    </script>
@stop