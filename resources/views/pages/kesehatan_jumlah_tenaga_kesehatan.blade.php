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
                        <span class="no-icon">{{ __('Dropdown') }}</span>
                    </a>
                    <div class="col-12 text-right">
                                <a href="{{route('page.index', 'formulir_jumlah_tenaga_kesehatan')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_rekapitulasi_penyandang_masalah')}}">Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_dokter')}}">Jumlah Dokter Menurut Unit Kerja</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_tenaga_kesehatan')}}">Jumlah Tenaga Kesehatan Menurut Kecamatan </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_fasilitas_kesehatan')}}">Jumlah Fasilitas Kesehatan Menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_kasus_penyakit')}}">Jumlah Kasus 10 Penyakit Terbanyak di Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_akseptor_aktif')}}">Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrasepsi yang Dipakai </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_jumlah_bayi_lahir')}}">Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR) </a>
                    <a class="dropdown-item" href="{{route('page.index', 'kesehatan_daftar_lokasi_panti')}}">Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir </a>
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
               


                      
                        <h4 class="card-title" align="center">Jumlah Tenaga Kesehatan Menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_tenaga_kesehatan/exportpdf26" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>ID</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Tenaga Medis</td>
                                    <td><b>Tenaga Keperawatan</td>
                                    <td><b>Tenaga Kebidanan</td>
                                    <td><b>Tenaga Kefarmasian</td>
                                    <td><b>Tenaga Kesehatan Lainnya</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl26 as $tabel26)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel26->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_medis, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_keperawatan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kebidanan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kefarmasian, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kesehatan_lainnya, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel26->tahun}}</td>
                                    <td align="center">{{$tabel26->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit26/'.$tabel26->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kesehatan_jumlah_tenaga_kesehatan/hapus/{{ $tabel26->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_tenaga_medis}}</td>
                                    <td align="center"><b><b>{{$jumlah_tenaga_keperawatan}}</td>
                                    <td align="center"><b><b>{{$jumlah_tenaga_kebidanan}}</td>
                                    <td align="center"><b><b>{{$jumlah_tenaga_kefarmasian}}</td>
                                    <td align="center"><b><b>{{$jumlah_tenaga_kesehatan_lainnya}}</td>
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