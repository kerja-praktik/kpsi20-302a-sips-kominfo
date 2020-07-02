@extends('layouts.app', ['activePage' => 'table', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'formulir-pariwisata-hotel')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisata')}}">Jumlah Wisata yang Berkunjung per Bulan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisataobjek')}}">Potensi dan Objek Pariwisata Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatahotel')}}">Jumlah Hotel dan Akomodasi</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatakunjungan')}}">Jumlah Kunjungan Kapal Penumpang Beserta Barang dan Angkutan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatakapal')}}">Jumlah Perahu/Kapal</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pariwisatarestoran')}}">Jumlah Restoran/Rumah Makan</a>
        
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
                        <h4 class="card-title" align="center">Jumlah Hotel dan Akomodasi</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisatahotel/exportpdf34" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Nama Hotel</td>
                                    <td align="center"><b>Jumlah Kamar</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</ align="center">
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl34 as $tabel34)
                                    <tr>
                                    <th scope="row" align="center">{{$loop->iteration}}</th> 
                                    <td align="center">{{$tabel34 -> kecamatan}}</td>
                                    <td align="center">{{$tabel34 -> hotel}}</td>
                                    <td align="center">{{number_format($tabel34->jumlah_kamar,0,",",".")}}</td>
                                    <td align="center">{{$tabel34 -> tahun}}</td>
                                    <td align="center">{{$tabel34 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit34/'.$tabel34->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus35/{{ $tabel34->id }}">Hapus</a>
                    </td>
                                    
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahkamar,0,",",".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl34->links() }}
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection