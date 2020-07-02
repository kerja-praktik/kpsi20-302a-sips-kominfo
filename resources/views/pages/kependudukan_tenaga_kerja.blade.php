@extends('layouts.app', ['activePage' => 'table', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

               


                      
                        <h4 class="card-title" align="center">Angka Partisipasi Angkatan Kerja (APAK)</h4>
                        <div class="col-12 text-right">
                                <a href="{{route('page.index', 'formulir_jumlah_tenaga_kerja')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kependudukan_tenaga_kerja/exportpdf23" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>  
                                
                                    <td align="center" rowspan="2"><b>ID</td>
                                    <td align="center" rowspan="2"><b>Kelompok Umur</td>
                                    <td align="center" colspan="3"><b>Angkatan Kerja</td>
                                    <td align="center" rowspan="2"><b>Bukan Angkatan Kerja</td>
                                    <td align="center" rowspan="2"><b>Tenaga Kerja</td>
                                    <td align="center" rowspan="2"><b>APAK</td>
                                    <td align="center" rowspan="2"><b>Pengangguran Terbuka</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td align="center" rowspan="2"><b>Aksi</td>
                                    </tr>
                                    <tr>
                                    <td><b>Bekerja</td>                                  
                                    <td><b>Pencari Kerja</td>  
                                    <td><b>Angkatan Kerja</td>  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl23 as $tabel23)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel23->kelompok_umur}}</td>
                                    <td align="center">{{number_format($tabel23->bekerja,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->pencari_kerja,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->angkatan_kerja,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->bukan_angkatan_kerja,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->tenaga_kerja,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->APAK,2,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->pengangguran_terbuka,2,",",".")}}</td>
                                    <td align="center">{{$tabel23->tahun}}</td>
                                    <td align="center">{{$tabel23->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit23/'.$tabel23->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/kependudukan_tenaga_kerja/hapus/{{ $tabel23->id }}" class="btn btn-sm btn-danger">Hapus</a>
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