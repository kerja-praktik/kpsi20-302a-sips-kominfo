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
                                <a href="{{route('page.index', 'formulir_jumlah_akseptor')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
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
               


                      
                        <h4 class="card-title" align="center">Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <th scope="col">ID</th>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>IUD</td>
                                    <td align="center"><b>MOW</td>
                                    <td align="center"><b>MOP</td>
                                    <td align="center"><b>Implant</td>
                                    <td align="center"><b>Suntik</td>
                                    <td align="center"><b>Pil</td>
                                    <td align="center"><b>Kondom</td>
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl29 as $tabel29)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel29->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel29->iud, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->mow, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->mop, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->implant, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->suntik, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->pil, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->kondom, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->jumlah, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel29->tahun}}</td>
                                    <td align="center">{{$tabel29->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit29/'.$tabel29->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kesehatan_jumlah_akseptor_aktif/hapus/{{ $tabel29->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_iud}}</td>
                                    <td align="center"><b><b>{{$jumlah_mow}}</td>
                                    <td align="center"><b><b>{{$jumlah_mop}}</td>
                                    <td align="center"><b><b>{{$jumlah_implant}}</td>
                                    <td align="center"><b><b>{{$jumlah_suntik}}</td>
                                    <td align="center"><b><b>{{$jumlah_pil}}</td>
                                    <td align="center"><b><b>{{$jumlah_kondom}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_jumlah_akseptor, 0, ".", ".")}}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection