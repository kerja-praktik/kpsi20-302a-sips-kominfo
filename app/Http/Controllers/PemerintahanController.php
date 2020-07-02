<?php
namespace App\Http\Controllers;
use App\Model_pemerintahan_jlh_desa_kel;
use App\Model_formulir_jlh_penduduk_wilayah_kepadatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator\validateMaks;
use PDF;
use Illuminate\Http\Request;

class PemerintahanController extends Controller
{
    public function index(Request $request, $page_pemerintahan)
    {
        $i=0;
        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        // $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        // $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        // $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        // $jumlah_panjang_jalan=0;
        // foreach ($tbl47 as $tabel47){
        //     $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        // }
        // $categories47 = [];
        // $data47a = [];
        // foreach ($tbl47 as $tabel44b){
        //     $categories47[] = $tabel44b->kecamatan;
        //     $data47a[] = $tabel44b->panjang_jalan;
        // }


        // $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        // $categories48 = [];
        // $data48a = [];
        // foreach ($tbl48 as $tabel44b){
        //     $categories48[] = $tabel44b->keadaan;
        //     $data48a[] = $tabel44b->jumlah_jembatan;
        // }
        // $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        // $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        // $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        // $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        // $categories51 = [];
        // $data51a = [];
        // $data51b = [];
        // $data51c = [];
        // foreach ($tbl51a as $tabel44b){
        //     $categories51[] = $tabel44b->kecamatan;
        //     $data51a[] = $tabel44b->alokasi_dasar;
        //     $data51b[] = $tabel44b->alokasi_formula;
        //     $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        // }
        // $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        // $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        // $jumlah_alokasi_formula=0;
        // foreach ($tbl52 as $tabel52){
        //     $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        // }

        // $jumlah_pengguna_dana_desa=0;
        // foreach ($tbl52 as $tabel53a){
        //     $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        // }
        
        // $categories52 = [];
        // $data52a = [];
        // $data52b = [];
        // $data52c = [];
        // foreach ($tbl52 as $tabel44b){
        //     $categories52[] = $tabel44b->kecamatan;
        //     $data52a[] = $tabel44b->alokasi_dasar;
        //     $data52b[] = $tabel44b->alokasi_formula;
        //     $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        // }


        if (view()->exists("pages.{$page_pemerintahan}")) {
            return view("pages.{$page_pemerintahan}",  compact('tbl44c','data43a','data43b','data44c','data44a',
            'data44b','categories43','categories44', 'jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tabel2'));
        }
        return abort(404);
    }

    public function cari(Request $request)
	{
        // menangkap data pencarian
        $cari = $request->cari;
        $tbl43 = Model_pemerintahan_jlh_desa_kel::where('kecamatan','like',"%".$cari."%")
		->paginate();
      
        $i=0;
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
 
    		// mengambil data dari table pegawai sesuai pencarian data
		
 
    		// mengirim data pegawai ke view index
		return view('pages.pemerintahan_jlh_desa_kel', compact('tbl43','jumlah_desa','jumlah_kelurahan', 'jumlah_total', 'categories43', 'data43a', 'data43b'));
 
	}
    
    // public function search(Request $request){
        
    //     if($request->has('cari')){
    //         $tbl = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
    //     }else{
    //      $tbl=Model_pemerintahan_jlh_desa_kel::all();
    //     }
    //      return view('pemerintahan_jlh_desa_kel',['kecamatan' => $kecamatan],compact('tbl'));
    //  }

    
    // public function search(Request $request)
    // {

    //     if($request->has('cari')){
    //         $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
    //     }else{
    //         $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
    //     }
      
    //     return view('/pemerintahan_jlh_desa_kel',['kecamatan' => $kecamatan], compact('tabel2'));
    // }

    public function index2(Request $request){
        
        if($request->has('cari')){
            $products = \App\Products_model::where('p_name','LIKE','%'.$request->cari.'%')->
            orwhere('p_code','LIKE','%'.$request->cari.'%')->get();
        }else{
         $products=Products_model::all();
        }
         return view('frontEnd.index',compact('products'));
     }

     //1
    public function formulir1($page_pemerintahan){
        if (view()->exists("pages.{$page_pemerintahan}")) {
            return view("pages.{$page_pemerintahan}");
        }
        return abort(404);
    }

    public function tambah1(Request $request)
    {
        $rule=[
            'kecamatan' => 'required|string|unique:pemerintahan-jumlahdesakel',
            'tahun' => 'required|number',
            
           ];
           $this->validate($request, $rule);
        Model_pemerintahan_jlh_desa_kel::create([
            'kecamatan' => $request->kecamatan,
            'Jumlah_Desa' => $request->desa, 
            'Jumlah_Kelurahan' => $request->kelurahan,
            'tahun'=>$request->tahun]);
        
            return redirect('/pemerintahan_jlh_desa_kel')->with('success','Data berhasil ditambahkan !!!');
          
    }

    public function hapus1($id)
    {
        Model_pemerintahan_jlh_desa_kel::where('id',$id)->delete();
        return back();
    }
    
    public function edit1($id)
    {
            $tabel43 =Model_pemerintahan_jlh_desa_kel::FindOrFail($id);
            return view('pages.edit.edit-jumlah-desa-kelurahan',compact('tabel43'));
    }

    public function update1(Request $request, $id){


        $this->validate($request,[ 
            'kecamatan'=>'required',
            'desa'=>'required',
            'kelurahan'=>'required',
            'tahun'=>'required'|'number',
            
        ]);
        $input_data=$request->all();
        Model_pemerintahan_jlh_desa_kel::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'Jumlah_Desa'=>$input_data['desa'],
            'Jumlah_Kelurahan'=>$input_data['kelurahan'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/pemerintahan_jlh_desa_kel')->with('message','Data Berhasil Diupdate!!');   
    }

    //convert PDF
    public function exportpdf1()
    {
        $tbl43 = \App\Model_pemerintahan_jlh_desa_kel::all();
        $pdf = PDF::loadView('pages.export.export_pemerintahan_jlh_desa_kel', ['tbl43' => $tbl43]);
        PDF::setOptions(['isPhpEnabled' => true]);
        PDF::setOptions(['javascript-delay' => 1000]);
        PDF::setOptions(['no-stop-slow-scripts' => true]);
        PDF::setOptions(['enable-smart-shrinking' => true]);


        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('pemerintahan_jlh_desa_kel.pdf');
    }
    //2
    public function formulir2($page_pemerintahan){
        if (view()->exists("pages.{$page_pemerintahan}")) {
            return view("pages.{$page_pemerintahan}");
        }
        return abort(404);
    	
 
    }

    public function tambah2(Request $request)
    {
        $rule=[
            'kecamatan' => 'required|string|unique:pemerintahan-jlhpendudukwilayahkepadatan',
           ];
        $this->validate($request, $rule);
        Model_formulir_jlh_penduduk_wilayah_kepadatan::create(['kecamatan' => $request->kecamatan,'Jlh_Penduduk' => $request->Jlh_Penduduk, 'Luas_Wilayah'=>$request->Luas_Wilayah, 'tahun'=>$request->tahun]);
           
            return redirect('/pemerintahan_jlh_penduduk_wilayah_kepadatan')->with('success','Data berhasil ditambahkan !!!');
           
    }

    public function hapus2($id)
    {
        Model_formulir_jlh_penduduk_wilayah_kepadatan::where('id',$id)->delete();
        return back();
    }

    public function edit2($id)
    {
            $tabel44 =Model_formulir_jlh_penduduk_wilayah_kepadatan::find($id);
            return view('pages.edit.edit-jlh-penduduk-wilayah-kepadatan',compact('tabel44'));
    }

    public function update2(Request $request, $id){


        $this->validate($request,[ 
            'kecamatan'=>'required',
            'Jlh_Penduduk'=>'required',
            'Luas_Wilayah'=>'required',
            'tahun'=>'required',
            
        ]);
        $input_data=$request->all();
        Model_formulir_jlh_penduduk_wilayah_kepadatan::where('id',$id)->update([
            'kecamatan'=>$input_data['kecamatan'],
            'Jlh_Penduduk'=>$input_data['Jlh_Penduduk'],
            'Luas_Wilayah'=>$input_data['Luas_Wilayah'],
            'tahun'=>$input_data['tahun']]);
        return redirect('/pemerintahan_jlh_penduduk_wilayah_kepadatan')->with('message','Data Berhasil Diupdate!');   
    }

    public function exportpdf2()
    {
        $tbl44 = \App\ Model_formulir_jlh_penduduk_wilayah_kepadatan::all();
        $pdf = PDF::loadView('pages.export.export_pemerintahan_jlh_penduduk_wilayah_kepadatan', ['tbl44' => $tbl44]);
        // PDF::setOptions(['isPhpEnabled' => true]);
        // PDF::setOptions(['javascript-delay' => 1000]);
        // PDF::setOptions(['no-stop-slow-scripts' => true]);
        // PDF::setOptions(['enable-smart-shrinking' => true]);


        // $pdf->setOption('javascript-delay', 1000);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // $pdf->setOption('enable-smart-shrinking', true);
        // PDF::setOptions(['isPhpEnabled' => true]);
        return $pdf->download('pemerintahan_jlh_penduduk_wilayah_kepadatan.pdf');
    }
    


}
