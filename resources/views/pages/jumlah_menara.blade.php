@extends('layouts.app', ['activePage' => 'jumlah_menara', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.index', 'tambah_jumlah_menara')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'jumlah_menara')}}">Jumlah Menara menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'rekapitulasi_data_menara')}}">Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'daftar_internet_dan_game_monitoring')}}">Daftar Internet/Game Net yang Dimonitoring</a>
                    <a class="dropdown-item" href="{{route('page.index', 'jumlah_desa_blank_spot')}}">Jumlah Desa Blank Spot</a>


                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Jumlah Menara Menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Menara</td>                                   
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl15 as $tabel15)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel15->kecamatan}}</td>
                                    <td align="center">{{$tabel15->jumlah_menara}}</td>                
                                    <td align="center">{{$tabel15->tahun}}</td>
                                    <td align="center"  >{{$tabel15->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit15/'.$tabel15->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_menara/hapus15/{{ $tabel15->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$jumlah69}}</td><b><b>
                                   
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