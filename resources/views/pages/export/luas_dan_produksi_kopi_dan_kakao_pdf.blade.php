<!DOCTYPE html>
<html>
<head>
	<title>Luas Tanaman dan Produksi Kopi dan Kakao Tanaman Perkebunan Rakyat Menurut Kecamatan</title>
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
		<h5>Luas Tanaman dan Produksi Kopi dan Kakao Tanaman Perkebunan Rakyat Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
                                    <td rowspan="2"><b>No</td>
                                    <td rowspan="2"><b>Kecamatan</td>
                                    <td align="center" colspan="3"><b>Kopi</td>
                                    <td align="center" colspan="3"><b>Kakao</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                          
                                    </tr>

                                <tr>
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>
                      
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>

                                </tr>
                                </thead>
		</thead>
		<tbody>
		@foreach($tbl8 as $tbl8) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
            <td scope="row">{{$tbl8->kecamatan}}</td>
        <td align="center">{{number_format($tbl8->luas_areal_kopi,3,",",".")}}</td>
        <td align="center">{{number_format($tbl8->produksi_kopi,3,",",".")}}</td>
        <td align="center">{{number_format($tbl8->produktivitas_kopi,3,",",".")}}</td>
        <td align="center">{{number_format($tbl8->luas_areal_kakao,3,",",".")}}</td>
        <td align="center">{{number_format($tbl8->produksi_kakao,3,",",".")}}</td>
        <td align="center">{{number_format($tbl8->produktivitas_kakao,3,",",".")}}</td>
        <td align="center">{{$tbl8->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $tabel8 = DB::table("perkebunan_luas_dan_produksi_kopi_dan_kakao")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($tabel8->sum("luas_areal_kopi"),3,",",".")}}</td>  
                                    <td align="center">{{number_format($tabel8->sum("produksi_kopi"),3,",",".")}}</td>
                                    <td align="center">{{number_format($tabel8->sum("produktivitas_kopi"),3,",",".")}}</td>  
                                    <td align="center">{{number_format($tabel8->sum("luas_areal_kakao"),3,",",".")}}</td> 
                                    <td align="center">{{number_format($tabel8->sum("produksi_kakao"),3,",",".")}}</td>  
                                    <td align="center">{{number_format($tabel8->sum("produktivitas_kakao"),3,",",".")}}</td> 
                                       
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>