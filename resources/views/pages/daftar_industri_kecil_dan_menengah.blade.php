@extends('layouts.app', ['activePage' => 'daftar_industri_kecil_dan_menengah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_daftar_industri_kecil_dan_menengah')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'daftar_industri_kecil_dan_menengah')}}">Daftar Industri Kecil dan Menengah Kab. Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'jumlah_industri_dan_tenaga_kerja')}}">Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah Menurut Kecamatan</a>
                                 
                    
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div> -->
</div>
                        <h4 class="card-title" align="center">Daftar Industri Kecil dan Menengah Kab. Toba Samosir</h4>


                            <!-- <p class="card-category">Here is a subtitle for td align="center"is table</p> -->
                        </div>
                        <div class="card-body table-full-widtd align="center" table-responsive" >
                            <table class="table table-hover table-striped">
                            <a href="/perindustrian/exportpdf13" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                <tr>
                                    <td rowspan="2"><b>No</td>
                                    <td rowspan="2"><b>Kecamatan</td>
                                    <td align="center" colspan="2"><b>Pangan</td>
                                    <td align="center" colspan="2"><b>Sandang dan Kulit</td>
                                    <td align="center" colspan="2"><b>Kimia dan Bahan Bangunan</td>
                                    <td align="center" colspan="2"><b>Kerajinan Umum</td>
                                    <td align="center" colspan="2"><b>Logam/Metal</td>
                                    <td align="center" colspan="2"><b>Jumlah/Total</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td align="center" rowspan="2"><b>Aksi</td>
                                    </tr>

                                <tr>
                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                           
                      
                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                </tr>
                                </thead>
                                   
                               
                                <tbody>
                                @foreach($tbl13 as $tabel13)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>                                    
                                        <td>{{$tabel13->kecamatan}}</td>
                                        <td align="center">{{$tabel13->pangan_unit}}</td>
                                        <td align="center">{{$tabel13->pangan_tenaga_kerja}}</td>
                                        <td align="center">{{$tabel13->sandang_dan_kulit_unit}}</td>
                                        <td align="center">{{$tabel13->sandang_dan_kulit_tenaga_kerja}}</td>
                                        <td align="center">{{$tabel13->kimia_dan_bahan_bangunan_unit}}</td>
                                        <td align="center">{{$tabel13->kimia_dan_bahan_bangunan_tenaga_kerja}}</td>
                                        <td align="center">{{$tabel13->kerajinan_umum_unit}}</td>
                                        <td align="center">{{$tabel13->kerajinan_umum_tenaga_kerja}}</td>
                                        <td align="center">{{$tabel13->logam_metal_unit}}</td>
                                        <td align="center">{{$tabel13->logam_metal_tenaga_kerja}}</td>

                                        <td align="center">{{$tabel13->pangan_unit + $tabel13->sandang_dan_kulit_unit + $tabel13->kimia_dan_bahan_bangunan_unit + $tabel13->kerajinan_umum_unit + $tabel13->logam_metal_unit}}</td>
                                        <td align="center">{{$tabel13->pangan_tenaga_kerja + $tabel13->sandang_dan_kulit_tenaga_kerja + $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13->kerajinan_umum_tenaga_kerja + $tabel13->logam_metal_tenaga_kerja}}</td>
                                        <td align="center">{{$tabel13->tahun}}</td>
                                        <td align="center">{{$tabel13->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit13/'.$tabel13->id) }}" class="btn btn-sm btn-success">Edit</a>
                               
                            &nbsp
                                   <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger" href="/daftar_industri_kecil_dan_menengah/hapus13/{{ $tabel13->id }}">Hapus</a>
                         
                    </td>

                  
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td></b></b>
                                    <td align="center"><b><b>{{$jumlah55}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah56}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah57}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah58}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah59}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah60}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah61}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah62}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah63}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah64}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah65}}</td><b><b>
                                    <td align="center"><b><b>{{$jumlah66}}</td><b><b>
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