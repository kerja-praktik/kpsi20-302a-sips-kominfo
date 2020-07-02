@extends('layouts.app', ['activePage' => 'pendidikansltp', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{route('page.index', 'formulir-pendidikan-sltp')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikanpaud')}}">Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikansd')}}">Jumlah SD, Murid, Guru, serta Lembaga Kabupaten Toba</a>
                    <a class="dropdown-item" href="{{route('page.index', 'pendidikansltp')}}">Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</a>

                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    </div>
</div>
                        <h4 class="card-title" align="center">Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pendidikansltp/exportpdf41" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Jumlah SLTP</td>
                                    <td align="center"><b>Jumlah Guru</td>
                                    <td align="center"><b>Jumlah Murid</td>
                                    <td align="center"><b>Negeri</td>
                                    <td align="center"><b>Swasta</td>
                                    <td align="center"><b>MI/MTs</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl41 as $tabel41)
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel41 -> kecamatan}}</td>
                                    <td align="center">{{$tabel41 -> tahun}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_sltp, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_guru, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_murid, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->negeri, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->swasta, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->Madrasah_Ibtidaiyah_Tsanawiyah, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel41 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit41/'.$tabel41->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus41/{{ $tabel41->id }}" >Hapus</a>
                    </td>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp2,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp3,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp4,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp5,0,",",".")}}</td>
                                </tbody>
                            </table>
                            {{ $tbl41->links() }}
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection