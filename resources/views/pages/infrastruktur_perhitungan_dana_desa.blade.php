@extends('layouts.app', ['activePage' => 'infrastruktur_perhitungan_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.infrastruktur', 'formulir-penghitungan-dana-desa')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')}}">Pembagian dan Penetapan Besaran Alokasi Dana Desa di Kabupaten Toba</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_perhitungan_dana_desa')}}">Perhitungan Dana Desa Setiap Desa Kabupaten Toba</a>
                    </div>
                    </div>
                                    
                        <h4 class="card-title" align="center">Perhitungan Dana Desa Setiap Desa Kabupaten Toba</h4>

                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_perhitungan_dana_desa/exportpdf8" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" ><b>No</b></td>
                                    <td align="center" ><b>Kecamatan</b></td>
                                    <td align="center" ><b>Nama Desa</b></td>
                                    <td align="center" ><b>Alokasi Dasar</b></td>
                                    <td align="center" ><b>Alokasi Formula</b></td>
                                    <td align="center" ><b>Pengguna Dana Desa Per-Desa</b></td>
                                    <td align="center" ><b>Tahun </b></td>
                                    <td align="center" ><b>Status </b></td>
                                    <td><b>Aksi</b></td>  
                                    </tr>                              
 
                                </thead>
                                <tbody>
                                <!-- <tr>
                                <td align="center" ><b>I</b></td>
                                    <td align="center" ><b>Balige</b></td>
                                    <td align="center" ><b></b></td>
                                    <td align="center" ><b></b></td>
                                    <td align="center" ><b>{{number_format($jumlah_alokasi_formula,0,",",".")}}</b></td>
                                    <td align="center" ><b>{{number_format($jumlah_pengguna_dana_desa,0,",",".")}}</b></td>
                                    <td align="center" ><b> </b></td>
                                    <td align="center" ><b> </b></td>
                                    <td><b></b></td>  
                                </tr> -->
                                
                                    @foreach($tbl52 as $tabel52)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                    <td align="center">{{$tabel52->status}}</td>
                                    
                                    <td align="center">
                                    <a href="{{ url('/edit10/'.$tabel52->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/penghitungan-dana-desa/hapus/{{ $tabel52->id }}">Hapus</a>
                                           
                                    </td>
                                    </tr>
                                    @endforeach
                                   
                                    
                                    <?php $i++; 
                                    $a=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Balige')->get()
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>Total</b></td>
                                    <td align=center><b>Balige</b></td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar+alokasi_formula"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>
                                   

                                    <?php $i++; 
                                    $b=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Laguboti')->get()
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>Total</b></td>
                                    <td align=center><b>Laguboti</b></td>
                                    <td align="center">{{number_format($b->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($b->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar+alokasi_formula"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>
                                   

                                    
                                </tbody>
                            </table>
                            {{ $tbl52->links() }}
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
        categories: {!!json_encode($categories52)!!},
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
        name: 'Alokasi Dasar',
        data: {!!json_encode($data52a)!!}

    }, {
        name: 'Alokasi Formula',
        data: {!!json_encode($data52b)!!}

    }]
});
   
    // });
    </script>
@stop