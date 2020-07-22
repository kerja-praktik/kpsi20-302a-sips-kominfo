<!DOCTYPE html>
<html>
<head>
	<title>Perhitungan Dana Desa Setiap Desa Kabupaten Toba</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Perhitungan Dana Desa Setiap Desa Kabupaten Toba</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center" ><b>No</b></td>
            <td align="center" ><b>Kecamatan</b></td>
            <td align="center" ><b>Nama Desa</b></td>
            <td align="center" ><b>Alokasi Dasar</b></td>
            <td align="center" ><b>Alokasi Formula</b></td>
            <td align="center" ><b>Pengguna Dana Desa Per-Desa</b></td>
            <td align="center" ><b>Tahun </b></td>
            </tr>

           
		</thead>
		<tbody>
        @foreach($tbl52 as $tabel52)
                                   
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    </tr>
                                    @endforeach
                                   
                                    
                                    <?php 
                                    $a=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Balige')->get()
                                    ?>
                                    @foreach($a as $tabela)
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>Total</b></td>
                                    <td align=center colspan="2"><b>{{$tabela->kecamatan}}</b></td>
                                    <td align="center">{{number_format($a->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar+alokasi_formula"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>
                                    @endforeach

                                    <?php 
                                    $b=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Laguboti')->get()
                                    ?>
                                    @foreach($b as $tabelb)
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>Total</b></td>
                                    <td align=center colspan="2"><b>{{$tabelb->kecamatan}}</b></td>
                                    <td align="center">{{number_format($b->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar+alokasi_formula"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>
                                    @endforeach
		</tbody>
    </table>    
    </div>


   
 
</body>
</html>