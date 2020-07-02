@extends('layouts.app', ['activePage' => 'jumlah_penerima_bantuan_ternak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                        <div class="col-12 text-right">
                                <a href="{{route('page.index', 'tambah_jumlah_penerima_bantuan_ternak')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
<!-- 
                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Dropdown') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_populasi_ternak_besar')}}">Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_jumlah_ternak_dipotong')}}">Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_jumlah_ternak_unggas_dipotong')}}">Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_jumlah_produksi_ternak_unggas')}}">Jumlah Produksi Ternak Unggas</a>
                    <a class="dropdown-item" href="{{route('page.index', 'peternakan/peternakan_jumlah_populasi_ternak_unggas')}}">Jumlah Populasi Ternak Unggas</a> -->
                    
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div> -->
<!-- </div> -->
               


                      
                        <h4 class="card-title" align="center">Jumlah Penerima Kelompok Bantuan Ternak</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>

                        <a href="/jumlah_penerima_bantuan_ternak/exportpdf7" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Lokasi Penerima Bantuan/Kecamatan</th>
                                    <td><b>Desa/Kelurahan</td>
                                    <td><b>Jumlah Kelompok</td>
                                    <td><b>Jumlah Ternak</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                               
                             <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK BABI</td></b></b>
                                        <td></td>
                                        

                                        <td><b><b>{{$jumlahpenerima_kelompok_babi}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_babi}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      
                                        
                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7 as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach
                                    


                                <!-- PENERIMA TERNAK KERBAU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK KERBAU</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_kerbau}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_kerbau}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7a as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach



                                    <!-- PENERIMA TERNAK SAPI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK SAPI</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_sapi}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_sapi}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7b as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach


                                     <!-- PENERIMA TERNAK AYAM -->
                                     <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK AYAM</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_ayam}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_ayam}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7c as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach


                                    <!-- PENERIMA TERNAK ITIK -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK ITIK</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_itik}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_itik}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7d as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach

                                    <!-- PENERIMA TERNAK KAMBING -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK KAMBING</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_kambing}} Kelompok</td><b><b>
                                        <td><b><b>{{$jumlahpenerima_ternak_kambing}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7e as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{$tabel7->jumlah_ternak}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection