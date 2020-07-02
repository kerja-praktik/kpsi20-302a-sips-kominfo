@extends('layouts.app', ['activePage' => 'infrastruktur_pembangunan_bersumber_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.infrastruktur', 'formulir-pembangunanbersumberdanadesa')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_pembangunan_bersumber_dana_desa')}}">Pembangunan Yang Bersumber dari Dana Desa</a>
                        <a class="dropdown-item" href="{{route('page.infrastruktur', 'infrastruktur_pembagian_penetapan_bagi_hasil_pajak')}}">Pembagian Dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa</a>
                    </div>
</div>
                                    
                        <h4 class="card-title" align="center">Pembangunan Yang Bersumber Dari Dana Desa</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" >No</td>
                                    <td align="center" >Kecamatan</td>
                                    <td align="center" >Desa</td>
                                    <td align="center" >Irigasi</td>
                                    <td align="center" >Jalan Desa</td>
                                    <td align="center" >Jumlah (Km/m)</td>
                                    <td align="center" >Keterangan</td>
                                    <td align="center" >Tahun </td>
                                    <td align="center" >Status </td>
                                    <td>Aksi</td>  
                                    </tr>

                                   
                                    
                                    </thead>

                                    <tbody>
                                @foreach($tbl49 as $tabel49)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel49->kecamatan}}</td>
                                    <td align="center">{{$tabel49->desa}}</td>
                                    <td align="center">{{$tabel49->irigasi}}</td>
                                    <td align="center">{{$tabel49->jalan_desa}}</td>
                                    <td align="center">{{$tabel49->jumlah}}</td>
                                    <td align="center">{{$tabel49->keterangan}}</td>
                                    <td align="center">{{$tabel49->tahun}}</td>
                                    <td align="center">{{$tabel49->status}}</td>
                                    
                                    <td align="center">
                                    <a href="{{ url('/edit7/'.$tabel49->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pembangunanbersumberdanadesa/hapus/{{ $tabel49->id }}">Hapus</a>
                                  
                                    </td>

                                    </tr>
                                @endforeach
                                    
                                </tbody>


                                    
                              
                                <tbody>
                                    
                                </tbody>
                            </table>
                            {{ $tbl49->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection