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
                                <a href="{{route('page.index', 'formulir_jumlah_fasilitas_kesehatan')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
               


                      
                        <h4 class="card-title" align="center">Jumlah Fasilitas Kesehatan Menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/kesehatan_jumlah_fasilitas_kesehatan/exportpdf26" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <th scope="col">ID</th>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Rumah Sakit</td>
                                    <td align="center"><b>Rumah Bersalin</td>
                                    <td align="center"><b>Puskesmas</td>
                                    <td align="center"><b>Puskesmas Pembantu</td>
                                    <td align="center"><b>Poskesdes</td>
                                    <td align="center"><b>Klinik/Balai Kesehatan</td>
                                    <td align="center"><b>Polindes</td>
                                    <td align="center"><b>Apotek</td>
                                    <td align="center"><b>Toko Obat</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl27 as $tabel27)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel27->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel27->rumah_sakit, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->rumah_bersalin, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->puskesmas, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->puskesmas_pembantu, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->poskesdes, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->balai_kesehatan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->polindes, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->apotek, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->toko_obat, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->tahun)}}</td>
                                    <td align="center">{{$tabel27->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit27/'.$tabel27->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kesehatan_jumlah_fasilitas_kesehatan/hapus/{{ $tabel27->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_rumah_sakit}}</td>
                                    <td align="center"><b><b>{{$jumlah_rumah_bersalin}}</td>
                                    <td align="center"><b><b>{{$jumlah_puskesmas}}</td>
                                    <td align="center"><b><b>{{$jumlah_puskesmas_pembantu}}</td>
                                    <td align="center"><b><b>{{$jumlah_poskesdes}}</td>
                                    <td align="center"><b><b>{{$jumlah_balai_kesehatan}}</td>
                                    <td align="center"><b><b>{{$jumlah_polindes}}</td>
                                    <td align="center"><b><b>{{$jumlah_apotek}}</td>
                                    <td align="center"><b><b>{{$jumlah_toko_obat}}</td>

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