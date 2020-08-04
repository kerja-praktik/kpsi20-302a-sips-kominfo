@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

                        <h4 class="card-title" align="center">Jumlah Hotel dan Akomodasi</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                      

                        
                        <div class="col-12 text-left">
                            <a href="/pariwisatahotel/exportpdf34" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Nama Hotel</td>
                                    <td align="center"><b>Jumlah Kamar</td>
                                    <td><b>Tahun</td>
                                    
                                 
                                </thead>
                                <tbody>

                                @foreach($tbl34 as $tabel34)
                                    <tr>
                                    <th scope="row" align="center">{{$loop->iteration}}</th> 
                                    <td align="center">{{$tabel34 -> kecamatan}}</td>
                                    <td align="center">{{$tabel34 -> hotel}}</td>
                                    <td align="center">{{number_format($tabel34->jumlah_kamar,0,",",".")}}</td>
                                    <td align="center">{{$tabel34 -> tahun}}</td>
                                    
                                  
                                    </tr>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahkamar,0,",",".")}}</td>
                                    <td></td>
                                   
                                    <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl34->links() }}
                        </div>
                        </div>
                    </div>
                    </html>
                </div>

        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/pariwisata1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/pariwisata1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek1')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan1')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran1')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pariwisatakapal1')}}">Next</a>
            </li>
        </ul>
        </nav>
    </div>
@endsection