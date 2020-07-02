@extends('layouts.app', ['activePage' => 'infrastruktur_panjang_jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.infrastruktur', 'formulir-panjang-jalan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_aplikasi_opd_toba')}}">Aplikasi OPD Kabupaten Toba</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan')}}">Panjang Jalan Menurut Jenis Permukaan dan Kondisi</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_jembatan')}}">Jembatan Menurut Status dan Keadaan</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan_kabupaten')}}">Panjang Jalan Kabupaten Menurut Kecamatan</a>
                    </div>
                    </div>
                                    
                        <h4 class="card-title" align="center">Panjang Jalan Menurut Jenis Permukaan dan Kondisi</h4>

                        </div>
                        <div class="col-12 text-left">
                
                <a href="/infrastruktur_panjang_jalan/exportpdf4" class="btn btn-sm btn-warning">CETAK PDF</a>          
                
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center"><b>No</b></td>
                                    <td align="center"><b>Keadaan</b></td>
                                    <td align="center"><b>Panjang Jalan</b></td>
                                    <td align="center"><b>Status </b></td>
                                    <td align="center"><b>Tahun</b></td>
                                    <td align="center"><b>Aksi</b></td>

                                    </tr>

                                    <tr>
                                    <td align="center"></td>
                                    <td colspan="2"><b>Jenis Keadaan</b></td>
                                    </tr>

                                    @foreach($tbl46 as $tabel46)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel46->keadaan}}</td>
                                    <td align="center">{{$tabel46->panjang_jalan_keadaan}} km</td>
                                    <td align="center">{{$tabel46->status}}</td>
                                    <td align="center">{{$tabel46->tahun}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit4/'.$tabel46->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                   
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/panjang-jalan/hapus/{{ $tabel46->id }}">Hapus</a>
                                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td align="center"><b></b></td>
                                    <td colspan="2"><b>Kondisi Jalan</b></td>
                                    </tr>

                                    @foreach($tbl46 as $tabel46)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel46->kondisi_jalan}}</td>
                                    <td align="center">{{$tabel46->panjang_jalan_kondisi_jalan}} km</td>
                                    <td align="center">{{$tabel46->status}}</td>
                                    <td align="center">{{$tabel46->tahun}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit4/'.$tabel46->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                        <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/panjang-jalan/hapus/{{ $tabel46->id }}">Hapus</a>
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                          
                                </thead>
                               
                            </table>
                            {{ $tbl46->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection