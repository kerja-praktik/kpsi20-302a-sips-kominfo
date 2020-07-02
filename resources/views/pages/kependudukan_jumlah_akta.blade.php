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
                                <a href="{{route('page.index', 'formulir_jumlah_akta')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{route('page.index', 'kependudukan_jumlah_penduduk')}}">Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{route('page.index', 'kependudukan_jumlah_akta')}}">Jumlah Akta Kelahiran, Perkawinan, Perceraian, dan E-KTP Menurut Kecamatan Tahun 2018</a>
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>

               


                      
                        <h4 class="card-title" align="center">Jumlah Akta Kelahiran, Perkawinan, Perceraian, dan E-KTP Menurut Kecamatan Tahun 2018</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kependudukan_jumlah_akta/exportpdf22" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                    <td align="center"><b>ID</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Akta Kelahiran</td>
                                    <td align="center"><b>Akta Perkawinan</td>
                                    <td align="center"><b>Akta Perceraian</td>
                                    <td align="center"><b>Yang Memiliki E-KTP</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Tahun</td>
                                    <td><b>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl22 as $tabel22)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel22->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel22->akta_kelahiran, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->akta_perkawinan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->akta_perceraian, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->yang_memiliki_ektp, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel22->tahun}}</td>
                                    <td align="center">{{$tabel22->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit22/'.$tabel22->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kependudukan_jumlah_akta/hapus/{{ $tabel22->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_kelahiran, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_perkawinan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_perceraian, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_yang_memiliki_ektp, 0, ".", ".")}}</td>
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