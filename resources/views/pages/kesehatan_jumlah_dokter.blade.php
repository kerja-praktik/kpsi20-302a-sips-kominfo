@extends('layouts.app', ['activePage' => 'table', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart2">
                </div>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Dropdown') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.index', 'formulir_jumlah_dokter')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_rekapitulasi_penyandang_masalah')}}">Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_dokter')}}">Jumlah Dokter Menurut Unit Kerja</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_tenaga_kesehatan')}}">Jumlah Tenaga Kesehatan Menurut Kecamatan </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_fasilitas_kesehatan')}}">Jumlah Fasilitas Kesehatan Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_kasus_penyakit')}}">Jumlah Kasus 10 Penyakit Terbanyak di Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_akseptor_aktif')}}">Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrasepsi yang Dipakai </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_bayi_lahir')}}">Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR) </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_daftar_lokasi_panti')}}">Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir </a>
           
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Jumlah Dokter Menurut Unit Kerja</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_dokter/exportpdf25" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <td align="center" rowspan="2"><b>ID</td>
                                    <td align="center" rowspan="2"><b>Unit Kerja</td>
                                    <td align="center" colspan="3"><b>Dokter</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td  rowspan="2">Aksi</td>
                                    </tr>
                                    <tr>
                                    <td>Umum</td>                                  
                                    <td>Gigi</td>  
                                    <td>Spesialis</td>  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl25 as $tabel25)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel25->unit_kerja}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_umum, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_gigi, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_spesialis, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel25->tahun}}</td>
                                    <td align="center">{{$tabel25->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit25/'.$tabel25->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kesehatan_jumlah_dokter/hapus/{{ $tabel25->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_umum}}</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_gigi}}</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_spesialis}}</td>
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
        text: 'Jumlah Dokter Menurut Unit Kerja'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories25)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Dokter Umum',
        data: {!!json_encode($data25)!!}

    }, {
        name: 'Dokter Gigi',
        data: {!!json_encode($data25a)!!}
    }, {
        name: 'Dokter Spesialis',
        data: {!!json_encode($data25b)!!}

    }]
});
    </script>
@stop