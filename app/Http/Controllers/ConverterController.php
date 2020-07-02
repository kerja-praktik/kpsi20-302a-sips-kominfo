<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ConverterController extends Controller
{
    
    function pdf()
    {
    $data['judul1']= "Jumlah Desa dan Kelurahan Menurut Kecamatan";
     $pdf=\PDF::loadview('pages.pemerintahan_jlh_penduduk_wilayah_kepadatan', $data);
     return $pdf->download('invoice.pdf');
    }

    
    
}
