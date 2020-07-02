@extends('layouts.app', ['activePage' => 'pemerintahan_jlh_penduduk_wilayah_kepadatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div id="chart1">
                <br></br>
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
                                <a href="{{route('page.pemerintahan', 'formulir-jlh-penduduk-wilayah-kepadatan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.pemerintahan', 'pemerintahan_jlh_desa_kel')}}">Jumlah Desa dan Kelurahan Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.pemerintahan', 'pemerintahan_jlh_penduduk_wilayah_kepadatan')}}">Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</a>
           
                    </div>
                    </div>

                        <h4 class="card-title" align = "center">Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="col-12 text-right">
                        <form action="/pariwisata/search" method="get">
   @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" name="cari" class="form-control float-right" placeholder="Search" id="cari">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="nc-zoom-split"></i></button>
                    </div>
                    </div>
                    </form>
                        </div>
                        <div class="col-12 text-left">
               
                <a href="/pemerintahan_jumlah_penduduk_wilayah_kepadatan/exportpdf2" class="btn btn-sm btn-warning">CETAK PDF</a>          
                   
                </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td><b>No</b></td>
                                    <td><b>Kecamatan</b></td>
                                    <td><b>Jumlah Penduduk (Jiwa)</b></td>
                                    <td><b>Luas Wilayah (ha)</b></td>
                                    <td><b>Kepadatan 
                                        <br>Penduduk</b></td>
                                    <td><b>Tahun </b></td>     
                                    <td><b>Status </b></td>
                                    <td><b>Aksi</b></td>
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl44 as $tabel44)
                                <?php $i++; 
                                 ?>
                                    <tr>
                                    <td >{{$i}}</td>
                                    <td >{{$tabel44->kecamatan}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk,0,",",".")}}</td>
                                    <td >{{number_format($tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk/$tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{$tabel44->tahun}}</td>
                                    <td >{{$tabel44->status}}</td>

                                    <td>
                                    <a href="{{ url('/edit2/'.$tabel44->id) }}" class="btn btn-sm btn-success">Edit</a>
                                     &nbsp
                                     <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/jlh-penduduk-wilayah-kepadatan/hapus/{{ $tabel44->id }}">Hapus</a> 
                                     
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                    <tr>
                                    <td><b></b></td>
                                    <td><b>Jumlah</b></td>
                                    <td><b>{{ number_format($jumlah_penduduk,0,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_luas_wilayah,2,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_kepadatan_penduduk,2,",",".")}}</b></td>
                                    <td><b></b></td>     
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    </tr>                               
                                </tbody>
                            </table>
                            {{ $tbl44->links() }}
                        </div>
                    </div>
                </div>
                </html>
                
                
            </div>
        </div>
    </div>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart1', {
    title: {
        text: 'Jumlah Penduduk, Luas Wilayah, dan kepadatan Penduduk'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories44)!!}
    },
    labels: {
        items: [{
            style: {
                left: '50px',
                top: '18px',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'red'
            }
        }]
    },
    series: [{
        type: 'column',
        name: 'Jumlah Penduduk',
        data:  {!!json_encode($data44a)!!}
    }, {
        type: 'column',
        name: 'Luas Wilayah (kali 100)',
        data: {!!json_encode($data44b)!!}
    }, {
        type: 'spline',
        name: 'Kepadatan Penduduk',
        data: {!!json_encode($data44c)!!},
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
</script>

@stop

