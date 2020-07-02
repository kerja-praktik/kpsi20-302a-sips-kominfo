@extends('layouts.app', ['activePage' => 'infrastruktur_pembagian_penetapan_bagi_hasil_pajak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.infrastruktur', 'formulir-pembagian_penetapan_bagi_hasil_pajak')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_pembangunan_bersumber_dana_desa')}}">Pembangunan Yang Bersumber dari Dana Desa</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_pembagian_penetapan_bagi_hasil_pajak')}}">Pembagian Dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa</a>
                    </div>
</div>
                                    
                        <h4 class="card-title" align="center">Pembagian dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa</h4>

                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/exportpdf6" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" rowspan="3"><b>No</b></td>
                                    <td align="center" rowspan="3"><b>Kecamatan</b></td>
                                    <td align="center" rowspan="3"><b>Nama Desa</b></td>
                                    <td align="center" rowspan="3"><b>Alokasi Dasar</b></td>
                                    <td align="center" colspan="3"><b>Alokasi Berdasarkan Formula</b></td>
                                    <td align="center" rowspan="3"><b>Pagu Bagi Hasil Pajak Per-Desa</b></td>
                                    <td align="center" rowspan="3"><b>Tahun</b></td>
                                    <td align="center" rowspan="3"><b>Status </b></td>
                                    <td rowspan="3"><b>Aksi</b></td>
                                    </tr>

                                    <tr>
                                    <td align="center" colspan ="2"><b>Jumlah PBB</b></td>
                                    <td align="center"><b>Alokasi Formula</b></td>
                                    </tr>

                                    <tr>
                                    <td align="center" ><b>Realisasi PBB</b></td>
                                    <td align="center"><b>Bobot</b></td>
                                    </tr>

                                    
                                    <tr>
                                    <td align="center"> <b> </b></td>
                                    <td colspan="3" align="center"> <b> Bagi Hasil Pajak Per-Desa </b></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    </tr>

                                </thead>

                                <tbody>
                                @foreach($tbl50 as $tabel50)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel50->kecamatan}}</td>
                                    <td align="center">{{$tabel50->desa}}</td>
                                    <td align="center">{{number_format($tabel50->alokasi_dasar,1,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->realisasi_PBB,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->bobot,4,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->pagu_bagi,0,",",".")}}</td>
                                    <td align="center">{{$tabel50->tahun}}</td>
                                    <td align="center">{{$tabel50->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit8/'.$tabel50->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pembagianpenetapanbagihasilpajak/hapus/{{ $tabel50->id }}">Hapus</a>
                             
                                    </td>
                                    </tr>
                                    @endforeach
                                        
                                    </tr>
                                    
                                </tbody>


                                    
                                </thead>
                                
                            </table>
                            {{ $tbl50->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection