@extends('layouts.app', ['activePage' => 'luas_tanaman_dan_produksi_kelapa_dan_pinang', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-witd align="center"-hover">
                        <div class="card-header ">
                            
                        
                            
                            <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.index', 'tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'luas_dan_produksi_kopi_dan_kakao')}}">Luas Tanaman dan Produksi Kopi dan Kakao Tanaman Perkebunan Rakyat Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'luas_tanaman_dan_produksi_karet_dan_kelapa_sawit')}}">Luas Tanaman dan Produksi Karet dan Kelapa Sawit Tanaman Perkebunan Rakyat Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'luas_tanaman_dan_produksi_aren_dan_kemiri')}}">Luas Tanaman dan Produksi Aren dan Kemiri Tanaman Perkebunan Rakyat Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'luas_tanaman_dan_produksi_kelapa_dan_pinang')}}">Luas Tanaman dan Produksi Kelapa dan Pinang Tanaman Perkebunan Rakyat Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'luas_tanaman_dan_produksi_andaliman_dan_nilam')}}">Luas Tanaman dan Produksi Andaliman dan Nilam Tanaman Perkebunan Rakyat Menurut Kecamatan</a>
                  
                    
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div> -->
</div>
               


                      
                        <h4 class="card-title" align="center">Luas Tanaman dan Produksi Kelapa dan Pinang Tanaman Perkebunan Rakyat Menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for td align="center"is table</p> -->
                        </div>
                        <div class="card-body table-full-widtd align="center" table-responsive" >
                            <table class="table table-hover table-striped">
                               
                                <thead>
                                <tr>
                                    <td rowspan="2"><b>No</td>
                                    <td rowspan="2"><b>Kecamatan</td>
                                    <td align="center" colspan="3"><b>Kelapa</td>
                                    <td align="center" colspan="3"><b>Pinang</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td align="center" rowspan="2"><b>Aksi</td>
                                    </tr>

                                <tr>
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>
                      
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>

                                </tr>
                                </thead>
                                   
                               
                                <tbody>
                                @foreach($tbl11 as $tabel11)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>                                    
                                        <td>{{$tabel11->kecamatan}}</td>
                                        <td align="center">{{$tabel11->luas_areal_kelapa}}</td>
                                        <td align="center">{{$tabel11->produksi_kelapa}}</td>
                                        <td align="center">{{$tabel11->produktivitas_kelapa}}</td>
                                        <td align="center">{{$tabel11->luas_areal_pinang}}</td>
                                        <td align="center">{{$tabel11->produksi_pinang}}</td>
                                        <td align="center">{{$tabel11->produktivitas_pinang}}</td>
                                        <td align="center">{{$tabel11->tahun}}</td>
                                        <td align="center">{{$tabel11->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit11/'.$tabel11->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/luas_tanaman_dan_produksi_kelapa_dan_pinang/hapus11/{{ $tabel11->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                   
                                    </tr>
                                    @endforeach
                                    

                                    <tr>
                                    <td></td>
                                    <td scope="row">Jumlah</td>
                                    <td align="center">{{$jumlah43}}</td>
                                    <td align="center">{{$jumlah44}}</td>
                                    <td align="center">{{$jumlah45}}</td>
                                    <td align="center">{{$jumlah46}}</td>
                                    <td align="center">{{$jumlah47}}</td>
                                    <td align="center">{{$jumlah48}}</td>
                                  
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