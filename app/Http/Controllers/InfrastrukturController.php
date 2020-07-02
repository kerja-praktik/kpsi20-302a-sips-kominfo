<?php

namespace App\Http\Controllers;
use App\Model_infrastruktur_aplikasi_opd_toba;
use App\Model_infrastruktur_panjang_jalan;
use App\Model_infrastruktur_panjang_jalan_kabupaten;
use App\Model_infrastruktur_jembatan;
use App\Model_infrastruktur_pembangunan_bersumber_dana_desa;
use App\Model_infrastruktur_penetapan_bagi_hasil_pajak;
use App\Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa;
use App\Model_infrastruktur_perhitungan_dana_desa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator\validateMaks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;

class InfrastrukturController extends Controller
{
    public function index(Request $request, $page_infrastruktur)
    {
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl52 as $tabel44b){
            $categories52[] = $tabel44b->kecamatan;
            $data52a[] = $tabel44b->alokasi_dasar;
            $data52b[] = $tabel44b->alokasi_formula;
            $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }

        if($request->has('cari')){
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
        }

        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}",  compact('jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b','categories43','categories44','categories48','categories47', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        }
        return abort(404);
    }


    public function formulir1($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
 
    }

    public function tambah1(Request $request)
    {
        Model_infrastruktur_aplikasi_opd_toba::create(['Nama_OPD' => $request->Nama_OPD,'aplikasi' => $request->aplikasi, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_aplikasi_opd_toba');
    }

    public function hapus1($id)
    {
        Model_infrastruktur_aplikasi_opd_toba::where('id',$id)->delete();
        return back();
    }

   
    public function edit1($id)
    {
            $tabel45 =Model_infrastruktur_aplikasi_opd_toba::FindOrFail($id);
            return view('pages.edit.edit-aplikasi-opd-toba',compact('tabel45'));
    }

    public function update1(Request $request, $id){


        $this->validate($request,[ 
            'Nama_OPD'=>'required',
            'aplikasi'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_aplikasi_opd_toba::where('id',$id)->update([
            'Nama_OPD'=>$input_data['Nama_OPD'],
            'aplikasi'=>$input_data['aplikasi'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_aplikasi_opd_toba')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf1()
    {
        $tbl45 = \App\Model_infrastruktur_aplikasi_opd_toba::all();
        $pdf = PDF::loadView('pages.export.export_aplikasi_opd_toba', ['tbl45' => $tbl45]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('aplikasi_opd_toba.pdf');
    }

    //2
    public function formulir2($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    }

    public function tambah2(Request $request)
    {
        Model_infrastruktur_panjang_jalan::create(['keadaan' => $request->keadaan, 'kondisi_jalan' => $request->kondisi_jalan, 'panjang_jalan_keadaan' => $request->panjang_jalan_keadaan,  'panjang_jalan_kondisi_jalan' => $request->panjang_jalan_kondisi_jalan, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_panjang_jalan');
    }

    public function hapus2($id)
    {
        Model_infrastruktur_panjang_jalan::where('id',$id)->delete();
        return back();
    }

    public function formulir3($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    	
 
    }

    public function edit2($id)
    {
            $tabel46 =Model_infrastruktur_panjang_jalan::FindOrFail($id);
            return view('pages.edit.edit-panjang-jalan',compact('tabel46'));
    }

    public function update2(Request $request, $id){


        $this->validate($request,[ 
            'keadaan'=>'required',
            'kondisi_jalan'=>'required',
            'panjang_jalan_keadaan'=>'required',
            'panjang_jalan_kondisi_jalan'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_panjang_jalan::where('id',$id)->update([
            'keadaan'=>$input_data['keadaan'],
            'kondisi_jalan'=>$input_data['kondisi_jalan'],
            'panjang_jalan_keadaan'=>$input_data['panjang_jalan_keadaan'],
            'panjang_jalan_kondisi_jalan'=>$input_data['panjang_jalan_kondisi_jalan'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_panjang_jalan')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf2()
    {
        $tbl46 = \App\Model_infrastruktur_panjang_jalan::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_panjang_jalan', ['tbl46' => $tbl46]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_panjang_jalan.pdf');
    }

    //3
    public function tambah3(Request $request)
    {
        $rule=[
            'kecamatan' => 'required|string|unique:infrastruktur-panjangjalankabupaten',
           ];
        $this->validate($request, $rule);
        Model_infrastruktur_panjang_jalan_kabupaten::create(['kecamatan' => $request->kecamatan,'panjang_jalan' => $request->panjang_jalan, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_panjang_jalan_kabupaten');
    }

    public function hapus3($id)
    {
        Model_infrastruktur_panjang_jalan_kabupaten::where('id',$id)->delete();
        return back();
    }

    public function edit3($id)
    {
            $tabel47 =Model_infrastruktur_panjang_jalan_kabupaten::FindOrFail($id);
            return view('pages.edit.edit-panjang-jalan-kabupaten',compact('tabel47'));
    }

    public function update3(Request $request, $id){


        $this->validate($request,[ 
            'kecamatan'=>'required',
            'panjang_jalan'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_panjang_jalan_kabupaten::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'panjang_jalan'=>$input_data['panjang_jalan'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_panjang_jalan_kabupaten')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf3()
    {
        $tbl47 = \App\Model_infrastruktur_panjang_jalan_kabupaten::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_panjang_jalan_kabupaten', ['tbl47' => $tbl47]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_panjang_jalan_kabupaten.pdf');
    }
    //4
    public function formulir4($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    	
 
    }

    public function tambah4(Request $request)
    {
       
        Model_infrastruktur_jembatan::create(['keadaan' => $request->keadaan,'jumlah_jembatan' => $request->jumlah_jembatan, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_jembatan');
       
    }

    public function hapus4($id)
    {
        Model_infrastruktur_jembatan::where('id',$id)->delete();
        return back();
    }

    public function edit4($id)
    {
            $tabel48 =Model_infrastruktur_jembatan::FindOrFail($id);
            return view('pages.edit.edit-jembatan',compact('tabel48'));
    }

    public function update4(Request $request, $id){


        $this->validate($request,[ 
            'keadaan'=>'required',
            'jumlah_jembatan'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_jembatan::where('id',$id)->update([
            'keadaan'=>$input_data['keadaan'],
            'jumlah_jembatan'=>$input_data['jumlah_jembatan'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_jembatan')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf4()
    {
        $tbl48 = \App\Model_infrastruktur_jembatan::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_jembatan', ['tbl48' => $tbl48]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_jembatan.pdf');
    }

    //5

    public function formulir5($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    	
 
    }

    public function tambah5(Request $request)
    {
        Model_infrastruktur_pembangunan_bersumber_dana_desa::create(['desa' => $request->desa,'kecamatan' => $request->kecamatan, 'jumlah' => $request->jumlah, 'irigasi' => $request->irigasi, 'jalan_desa' => $request->jalan_desa, 'keterangan' => $request->keterangan,'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_pembangunan_bersumber_dana_desa');
    }

    public function hapus5($id)
    {
        Model_infrastruktur_pembangunan_bersumber_dana_desa::where('id',$id)->delete();
        return back();
    }

    
    public function edit5($id)
    {
            $tabel49 =Model_infrastruktur_pembangunan_bersumber_dana_desa::FindOrFail($id);
            return view('pages.edit.edit-pembangunanbersumberdanadesa',compact('tabel49'));
    }

    public function update5(Request $request, $id){


        $this->validate($request,[ 
            'kecamatan'=>'required',
            'desa'=>'required',
            'irigasi'=>'required',
            'jalan_desa'=>'required',
            'jumlah'=>'required',
            'keterangan'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_pembangunan_bersumber_dana_desa::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'desa'=>$input_data['desa'],
            'irigasi'=>$input_data['irigasi'],
            'jalan_desa'=>$input_data['jalan_desa'],
            'jumlah'=>$input_data['jumlah'],
            'keterangan'=>$input_data['keterangan'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_pembangunan_bersumber_dana_desa')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf5()
    {
        $tbl49 = \App\Model_infrastruktur_pembangunan_bersumber_dana_desa::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_pembangunan_bersumber_dana_desa', ['tbl49' => $tbl49]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_pembangunan_bersumber_dana_desa.pdf');
    }
    //6
    public function formulir6($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
        
    	
    }

    public function tambah6(Request $request)
    {
        Model_infrastruktur_penetapan_bagi_hasil_pajak::create(['kecamatan' => $request->kecamatan,'desa' => $request->desa, 'alokasi_dasar' => $request->alokasi_dasar, 'realisasi_PBB' => $request->realisasi_PBB, 'bobot' => $request->bobot, 'alokasi_formula' => $request->alokasi_formula, 'pagu_bagi' => $request->pagu_bagi, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak');
    }

    public function hapus6($id)
    {
        Model_infrastruktur_penetapan_bagi_hasil_pajak::where('id',$id)->delete();
        return back();
    }

    public function formulir7($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    }

    public function edit6($id)
    {
            $tabel50 =Model_infrastruktur_penetapan_bagi_hasil_pajak::FindOrFail($id);
            return view('pages.edit.edit-pembagian_penetapan_bagi_hasil_pajak',compact('tabel50'));
    }

    public function update6(Request $request, $id){


        $this->validate($request,[ 
            'desa'=>'required',
            'kecamatan'=>'required',
            'alokasi_dasar'=>'required',
            'realisasi_PBB'=>'required',
            'bobot'=>'required',
            'alokasi_formula'=>'required',
            'pagu_bagi'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_penetapan_bagi_hasil_pajak::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'desa'=>$input_data['desa'],
            'alokasi_dasar'=>$input_data['alokasi_dasar'],
            'realisasi_PBB'=>$input_data['realisasi_PBB'],
            'bobot'=>$input_data['bobot'],
            'alokasi_formula'=>$input_data['alokasi_formula'],
            'pagu_bagi'=>$input_data['pagu_bagi'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf6()
    {
        $tbl50 = \App\ Model_infrastruktur_penetapan_bagi_hasil_pajak::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_pembagian_penetapan_bagi_hasil_pajak', ['tbl50' => $tbl50]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_pembagian_penetapan_bagi_hasil_pajak.pdf');
    }

    //7
    public function tambah7(Request $request)
    {
        Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::create(['kecamatan' => $request->kecamatan,'desa' => $request->desa, 'alokasi_dasar' => $request->alokasi_dasar, 'alokasi_formula' => $request->alokasi_formula, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa');
    }

    public function hapus7($id)
    {
        Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::where('id',$id)->delete();
        return redirect('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa');
    }


    public function edit7($id)
    {
            $tabel51 =Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::FindOrFail($id);
            return view('pages.edit.edit-pembagian_penetapan_besaran_alokasi_dana_desa',compact('tabel51'));
    }

    public function update7(Request $request, $id){


        $this->validate($request,[ 
            'desa'=>'required',
            'kecamatan'=>'required',
            'alokasi_dasar'=>'required',
            'alokasi_formula'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'desa'=>$input_data['desa'],
            'alokasi_dasar'=>$input_data['alokasi_dasar'],
            'alokasi_formula'=>$input_data['alokasi_formula'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf7()
    {
        $tbl51 = \App\ Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa', ['tbl51' => $tbl51]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa.pdf');
    }

    //8
    public function formulir8($page_infrastruktur){
        if (view()->exists("pages.{$page_infrastruktur}")) {
            return view("pages.{$page_infrastruktur}");
        }
        return abort(404);
    }

    public function tambah8(Request $request)
    {
        Model_infrastruktur_perhitungan_dana_desa::create(['kecamatan' => $request->kecamatan,'desa' => $request->desa, 'alokasi_dasar' => $request->alokasi_dasar, 'alokasi_formula' => $request->alokasi_formula, 'tahun'=>$request->tahun]);
        return redirect('/infrastruktur_perhitungan_dana_desa');
    }

    public function hapus8($id)
    {
        Model_infrastruktur_perhitungan_dana_desa::where('id',$id)->delete();
        return back();
    }
    
    public function edit8($id)
    {
            $tabel52 =Model_infrastruktur_perhitungan_dana_desa::FindOrFail($id);
            return view('pages.edit.edit-perhitungan_dana_desa',compact('tabel52'));
    }

    public function update8(Request $request, $id){


        $this->validate($request,[ 
            'desa'=>'required',
            'kecamatan'=>'required',
            'alokasi_dasar'=>'required',
            'alokasi_formula'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_infrastruktur_perhitungan_dana_desa::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'desa'=>$input_data['desa'],
            'alokasi_dasar'=>$input_data['alokasi_dasar'],
            'alokasi_formula'=>$input_data['alokasi_formula'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/infrastruktur_perhitungan_dana_desa')->with('message','Data Berhasil Diupdate!!');   
    }

    public function exportpdf8()
    {
        $tbl52 = \App\ Model_infrastruktur_perhitungan_dana_desa::all();
        $pdf = PDF::loadView('pages.export.export_infrastruktur_perhitungan_dana_desa', ['tbl52' => $tbl52]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);
        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('infrastruktur_perhitungan_dana_desa.pdf');
    }

    

    

}
