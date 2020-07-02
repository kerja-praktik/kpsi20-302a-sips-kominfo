@extends('layouts.app', ['activePage' => 'peternakan_jumlah_produksi_ternak_unggas', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_jumlah_produksi_ternak_unggas')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
</div>
               


                      
                        <h4 class="card-title" align="center">Jumlah Produksi Ternak Unggas</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Ayam Buras</td>
                                    <td><b>Itik</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl5 as $tabel5)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel5->kecamatan}}</td>
                                    <td>{{$tabel5->ayam_buras}}</td>
                                    <td>{{$tabel5->itik}}</td>    
                                    <td>{{$tabel5->tahun}}</td>
                                    <td>{{$tabel5->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit5/'.$tabel5->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/peternakan_jumlah_produksi_ternak_unggas/hapus5/{{ $tabel5->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td><b><b>{{$jumlah21}}</td><b><b>
                                    <td><b><b>{{$jumlah22}}</td><b><b>
                                   
                                  
                                  
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