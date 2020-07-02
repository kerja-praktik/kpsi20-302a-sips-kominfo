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
                                <a href="{{route('page.index', 'formulir_rekapitulasi_penyandang_masalah')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
               


                      
                        <h4 class="card-title" align="center">Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_penyandang_masalah/exportpdf24" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <td align="center"><b>ID</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Rastra Non PKH</td>
                                    <td align="center"><b>RLTH</td>
                                    <td align="center"><b>KUBE</td>
                                    <td align="center"><b>Pendampingan Anak Berhadapan Dengan Hukum</td>
                                    <td align="center"><b>KAT</td>
                                    <td align="center"><b>PKH</td>
                                    <td align="center"><b>ASLUT</td>
                                    <td align="center"><b>ASPD</td>
                                    <td align="center"><b>ODHA</td>
                                    <td align="center"><b>UEP LANSIA</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl24 as $tabel24)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel24->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel24->rastra_non_PKH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->RLTH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->KUBE, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->pendamping_anak_berhadapan_dengan_hukum, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->KAT, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->PKH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ASLUT, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ASPD, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ODHA, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->UEP_lansia, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel24->tahun}}</td>
                                    <td align="center">{{$tabel24->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit24/'.$tabel24->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kesehatan_rekapitulasi_penyandang_masalah/hapus/{{ $tabel24->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_rastra}}</td>
                                    <td align="center"><b><b>{{$jumlah_RLTH}}</td>
                                    <td align="center"><b><b>{{$jumlah_KUBE}}</td>
                                    <td align="center"><b><b>{{$jumlah_pendamping_anak}}</td>
                                    <td align="center"><b><b>{{$jumlah_KAT}}</td>
                                    <td align="center"><b><b>{{$jumlah_PKH}}</td>
                                    <td align="center"><b><b>{{$jumlah_ASLUT}}</td>
                                    <td align="center"><b><b>{{$jumlah_ASPD}}</td>
                                    <td align="center"><b><b>{{$jumlah_ODHA}}</td>
                                    <td align="center"><b><b>{{$jumlah_UEP_lansia}}</td>
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