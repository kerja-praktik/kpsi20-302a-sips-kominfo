@extends('layouts.app', ['activePage' => 'infrastruktur_aplikasi_opd_toba', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.infrastruktur', 'formulir-aplikasi-opd-toba')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_aplikasi_opd_toba')}}">Aplikasi OPD Kabupaten Toba</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan')}}">Panjang Jalan Menurut Jenis Permukaan dan Kondisi</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_jembatan')}}">Jembatan Menurut Status dan Keadaan</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_panjang_jalan_kabupaten')}}">Panjang Jalan Kabupaten Menurut Kecamatan</a>
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Aplikasi yang ada di OPD Kabupaten Toba</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_aplikasi_opd_toba/exportpdf3" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" >No</td>
                                    <td align="center" >Nama OPD</td>
                                    <td align="center" >Aplikasi</td>
                                    <td align="center" >Status </td>
                                    <td align="center" >Tahun </td>
                                    <td>Aksi</td>      
                                    </tr>

                                    
                                </thead>
                                
                                <tbody>
                                @foreach($tbl45 as $tabel45)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel45->Nama_OPD}}</td>
                                    <td align="center">{{$tabel45->aplikasi}}</td>
                                    <td align="center">{{$tabel45->status}}</td>
                                    <td align="center">{{$tabel45->tahun}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit3/'.$tabel45->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/jlh-aplikasi-opd-toba/hapus/{{ $tabel45->id }}">Hapus</a>
                                    
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tbl45->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection