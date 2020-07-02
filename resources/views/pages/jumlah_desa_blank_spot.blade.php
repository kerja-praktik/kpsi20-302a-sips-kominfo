@extends('layouts.app', ['activePage' => 'jumlah_desa_blank_spot', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_jumlah_desa_blank_spot')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
               


                      
                        <h4 class="card-title" align="center">Jumlah Desa Blank Spot</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th><b>No</th>
                                    <th><b>Kecamatan</th>
                                    <th><b>Data Blank Spot</th>                                  
                                    <th><b>Tahun</th>
                                    <th><b>Status</th>
                                    <th><b>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($tbl18 as $tabel18)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel18->kecamatan}}</td>
                                        <td>{{$tabel18->data_blank_spot}}</td>                                 
                                        <td>{{$tabel18->tahun}}</td>
                                        <td>{{$tabel18->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit18/'.$tabel18->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_desa_blank_spot/hapus18/{{ $tabel18->id }}" class="btn btn-sm btn-danger">Hapus</a>    
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td><b><b>{{$jumlah70}}</td><b><b>
                                   
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