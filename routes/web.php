<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

	//pemerintahan
	Route::get('{page_pemerintahan}', ['as' => 'page.pemerintahan', 'uses' => 'PemerintahanController@index']);

	Route::get('/tambah-jlh-desa-kelurahan', 'PemerintahanController@formulir1');
	Route::post('/formulir/tambah-jlh-desa-kelurahan', 'PemerintahanController@tambah1');
	Route::get('/desa-kelurahan/hapus/{id}','PemerintahanController@hapus1');
	Route::get('/pemerintahan/cari','PemerintahanController@cari');
	//edit
	Route::get('edit1/{id}','PemerintahanController@edit1');
	Route::put('/update1/{id}','PemerintahanController@update1');
	

	Route::get('/tambah-jlh-penduduk-luas-kepadatan', 'PemerintahanController@formulir2');
	Route::post('/formulir/tambah-jlh-penduduk-wilayah-kepadatan', 'PemerintahanController@tambah2');
	Route::get('/jlh-penduduk-wilayah-kepadatan/hapus/{id}','PemerintahanController@hapus2');

	//edit
	Route::get('edit2/{id}','PemerintahanController@edit2');
	Route::put('/update2/{id}','PemerintahanController@update2');


	//infrastruktur
	Route::get('{page_infrastruktur}', ['as' => 'page.infrastruktur', 'uses' => 'InfrastrukturController@index']);

	Route::get('/tambah-aplikasi-opd-toba', 'InfrastrukturController@formulir1');
	Route::post('/formulir/tambah-aplikasi-opd-toba', 'InfrastrukturController@tambah1');
	Route::get('/jlh-aplikasi-opd-toba/hapus/{id}','InfrastrukturController@hapus1');
	
	//edit
	Route::get('edit3/{id}','InfrastrukturController@edit1');
	Route::put('/update3/{id}','InfrastrukturController@update1');

	Route::get('/tambah-panjang-jalan', 'InfrastrukturController@formulir2');
	Route::post('/formulir/tambah-panjang-jalan', 'InfrastrukturController@tambah2');
	Route::get('/panjang-jalan/hapus/{id}','InfrastrukturController@hapus2');
	
	//edit
	Route::get('edit4/{id}','InfrastrukturController@edit2');
	Route::put('/update4/{id}','InfrastrukturController@update2');
	

	Route::get('/tambah-aplikasi-panjang-jalan-kabupaten', 'InfrastrukturController@formulir3');
	Route::post('/formulir/tambah-panjang-jalan-kabupaten', 'InfrastrukturController@tambah3');
	Route::get('/panjang-jalan-kabupaten/hapus/{id}','InfrastrukturController@hapus3');

	//edit
	Route::get('edit5/{id}','InfrastrukturController@edit3');
	Route::put('/update5/{id}','InfrastrukturController@update3');

	Route::get('/tambah-jembatan', 'InfrastrukturController@formulir4');
	Route::post('/formulir/tambah-jembatan', 'InfrastrukturController@tambah4');
	Route::get('/jembatan/hapus/{id}','InfrastrukturController@hapus4');
	//edit
	Route::get('edit6/{id}','InfrastrukturController@edit4');
	Route::put('/update6/{id}','InfrastrukturController@update4');

	Route::get('/tambah-pembangunanbersumberdanadesa', 'InfrastrukturController@formulir5');
	Route::post('/formulir/tambah-pembangunanbersumberdanadesa', 'InfrastrukturController@tambah5');
	Route::get('/pembangunanbersumberdanadesa/hapus/{id}','InfrastrukturController@hapus5');

	//edit
	Route::get('edit7/{id}','InfrastrukturController@edit5');
	Route::put('/update7/{id}','InfrastrukturController@update5');


	Route::get('/tambah-pembagianpenetapanbagihasilpajak', 'InfrastrukturController@formulir6');
	Route::post('/formulir/tambah-pembagianpenetapanbagihasilpajak', 'InfrastrukturController@tambah6');
	Route::get('/pembagianpenetapanbagihasilpajak/hapus/{id}','InfrastrukturController@hapus6');

	//edit
	Route::get('edit8/{id}','InfrastrukturController@edit6');
	Route::put('/update8/{id}','InfrastrukturController@update6');

	Route::get('/tambah-pembagian-penetapan-besaran-alokasi-dana-desa', 'InfrastrukturController@formulir7');
	Route::post('//formulir/tambah-pembagian-penetapan-besaran-alokasi-dana-desa', 'InfrastrukturController@tambah7');
	Route::get('/pembagian-penetapan-besaran-alokasi-dana-desa/hapus/{id}','InfrastrukturController@hapus7');

	//edit
	Route::get('edit9/{id}','InfrastrukturController@edit7');
	Route::put('/update9/{id}','InfrastrukturController@update7');

	Route::get('/tambah-penghitungan-dana-desa', 'InfrastrukturController@formulir8');
	Route::post('formulir/tambah-penghitungan-dana-desa', 'InfrastrukturController@tambah8');
	Route::get('/penghitungan-dana-desa/hapus/{id}','InfrastrukturController@hapus8');

	//edit
	Route::get('edit10/{id}','InfrastrukturController@edit8');
	Route::put('/update10/{id}','InfrastrukturController@update8');

	//Convert PDF

	Route::get('/pemerintahan_jlh_desa_kel/exportpdf1','PemerintahanController@exportpdf1');
	Route::get('/pemerintahan_jumlah_penduduk_wilayah_kepadatan/exportpdf2','PemerintahanController@exportpdf2');
	Route::get('/infrastruktur_aplikasi_opd_toba/exportpdf3','InfrastrukturController@exportpdf1');
	Route::get('/infrastruktur_panjang_jalan/exportpdf4','InfrastrukturController@exportpdf2');
	Route::get('/infrastruktur_panjang_jalan_kabupaten/exportpdf5','InfrastrukturController@exportpdf3');
	Route::get('/infrastruktur_jembatan/exportpdf6','InfrastrukturController@exportpdf4');
	Route::get('/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5', 'InfrastrukturController@exportpdf5');
	Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/exportpdf6', 'InfrastrukturController@exportpdf6');
	Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/exportpdf7', 'InfrastrukturController@exportpdf7');
	Route::get('/infrastruktur_perhitungan_dana_desa/exportpdf8', 'InfrastrukturController@exportpdf8');

	//search
	Route::any ('/search', function(Request $request){
		$search = $request->search;
		$products=Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$search.'%')->orWhere('kecamatan', 'LIKE', '%'.$search.'%')->get();
		return view('pages.index')->withDetails($products)->withQuery($search);
	});

	
	
});

