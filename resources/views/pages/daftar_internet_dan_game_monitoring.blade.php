@extends('layouts.app', ['activePage' => 'daftar_internet_dan_game_monitoring', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'tambah_daftar_internet_dan_game_monitoring')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
               


                      
                        <h4 class="card-title" align="center">Daftar Internet/Game Net yang Dimonitoring</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Nama Internet</td>
                                    <td align="center"><b>Alamat</td>
                                    <td align="center"><b>Nama Pemilik</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"></td>
                                    <td><b>Aksi</td>
                                    <td></td>
                                   
                                </thead>
                                <tbody>
                                <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Tampahan</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                @foreach($tbl17 as $tabel17)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{route('page.index', 'tambah_daftar_internet_dan_game_monitoring')}}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>

                  
                                    </tr>
                                    @endforeach
                                    

                                    <!-- KEC BALIGE -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Balige</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17a as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                        <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>    
                               
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach


                                    <!-- KEC LAGUBOTI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Laguboti</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17b as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC SIGUMPAR -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Sigumpar</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17c as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                         <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                    
                                    <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                   
                                    </tr>
                                    @endforeach

                                    <!-- KEC SILAEN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Silaen</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17d as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC HABINSARAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Habinsaran</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17e as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC BORBOR -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Borbor</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17f as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC NASSAU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Nassau</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17g as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC SIANTAR NARUMONDA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Siantar Narumonda</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17h as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC PORSEA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Porsea</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17i as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                       
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC PARMAKSIAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Parmaksian</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17j as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach


                                    <!-- KEC PINTU POHAN MERANTI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Pintu Pohan Meranti</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17k as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC ULUAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Uluan</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17l as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach



                                    <!-- KEC LUMBAN JULU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Lumban Julu</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17m as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC BONATUA LUNASI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Bonatua Lunasi</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17n as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
                                    </tr>
                                    @endforeach

                                    <!-- KEC AJIBATA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Ajibata</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl17o as $tabel17)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>
                                        <td align="center">{{$tabel17->tahun}}</td>
                                        <td align="center">{{$tabel17->status}}</td>
                                        <td></td>
                                        <td>
                                <a href="{{ url('/edit17/'.$tabel17->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/daftar_internet_dan_game_monitoring/hapus17/{{ $tabel17->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td></td>
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