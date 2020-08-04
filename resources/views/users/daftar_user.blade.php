@extends('layouts.app', ['activePage' => 'daftar_user', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
 
                      
                        <h4 class="card-title" align="center">Daftar User</h4>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">

                            <a href="/jumlah_penerima_bantuan_ternak/exportpdf7" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Nama Dinas</th>
                                    <td align="center"><b>Username</td>
                                    <td align="center"><b>Email</td>
                                    <td align="center"><b>Alamat Kantor</td>
                                    <td align="center"><b>Nomor Telepon</td>
                                    <td align="center"><b></td> 
                                </thead>
                                <tbody>
                                   
                                   @foreach($daftar_user as $users)
                                    <tr>
                                    
                                        <td align="center" scope="row">{{$loop->iteration}}</td>
                                        <td align="center">{{$users->nama_dinas}}</td>
                                        <td align="center">{{$users->username}}</td>
                                        <td align="center">{{$users->email}}</td>
                                        <td align="center">{{$users->alamat_kantor}}</td>
                                        <td align="center">{{$users->nomor_telepon}}</td>
                                        <td align="center">
                                        <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/daftar_user/hapus/{{ $users->id }}">Hapus</a>
                                        </td>
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