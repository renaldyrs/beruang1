<?php

namespace App\Http\Controllers;

use App\Models\bank;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\category;
use App\Models\pelanggan;
use App\Models\pembayaran;
use App\Models\pesanan;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use File;
class HalamanAwalController extends Controller
{
    //
	public function getcategory(){
		$category = category::get();
		return $category;
	// dd($category);
	}

    public function viewawal(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-awal',['barangs' => $barang,'category'=>$category]);
	}
	

	public function category($id){
		// $category = category::find($id);
		$category = category::all();
		$barang = barang::where('id_category', $id)->get();
		return view('halaman-awal',['barangs' => $barang, 'category' => $category]);
		// dd($barang);
	}
	public function editfoto(Request $request){
		// $this->validate($request, [
		// 	'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		// ]);
 
		$file = $request->file('file');
		$nama_file = Auth::user()->name."_".Auth::user()->id.".".$file->getClientOriginalExtension();
		// echo $nama_file;
		if(is_null(Auth::user()->foto)){
			$tujuan_upload = 'data_file/foto_users';
			$file->move($tujuan_upload,$nama_file);
			user::where('id',Auth::user()->id)->update([
				'foto'=>$nama_file,
			]);
			return redirect()->back();
		}else{
			File::delete('data_file/foto_users/'.Auth::user()->foto);
			$tujuan_upload = 'data_file/foto_users';
			$file->move($tujuan_upload,$nama_file);
			user::where('id',Auth::user()->id)->update([
				'foto'=>$nama_file,
			]);
			return redirect()->back();
		}

		

	}
	//catalog
	public function catalog(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-katalog',['barangs' => $barang,'category'=> $category]);
	}

	//pembayaran
	public function pembayaran(){
		$cek = pesanan::orderBy('id_pesanan', 'desc')->Limit(1)->get();
		// dd($cek);
		$id_pesanan = 0;
		foreach($cek as $c){
			$id_pesanan = $c->id_pesanan;
		}

		$alamat = DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('kota as k','pe.id_kota','=','k.id_kota')
		->join('provinsi as pr','k.id_provinsi','=','pr.id_provinsi')
		->select('alamat','nama_kota','nama_provinsi')
		->where('p.id',Auth::user()->id )->where('pe.id_pesanan',$id_pesanan)
		->get();


		$produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('pesanan_item as i','pe.id_pesanan','=','i.id_pesanan')
		->join('barangs as b','i.id_barang','=','b.id')
		->select('b.nama','i.jumlah_barang as qty','i.harga_barang as harga','b.file')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Belum dibayar')->where('pe.id_pesanan',$id_pesanan)
		->get();
		$bank = bank::get();
		$category = category::get();
		// dd($produk);
		return view('halaman-pembayaran',['alamat' => $alamat,'produk' => $produk,'bank' => $bank,'category'=>$category,'id_pesanan'=>$id_pesanan]);
	}
	public function code(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-pembayaran2',['barangs' => $barang,'category' => $category]);
	}
	//keranjang
	public function keranjang(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-keranjang',['barangs' => $barang,'category' => $category]);
	}
	//profil	
	public function profil(){
		$user = pelanggan::where('id',Auth::user()->id)->get();

		$produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('pesanan_item as i','pe.id_pesanan','=','i.id_pesanan')
		->join('barangs as b','i.id_barang','=','b.id')
		->join('pembayarans as ba', 'pe.id_pesanan','=','ba.id_pesanan')
		->select('b.nama','i.jumlah_barang as qty','i.harga_barang as harga','b.file', 'pe.id_pesanan', 'ba.id_bank')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Belum dibayar')
		->get();
		$pebatal=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('pesanan_item as i','pe.id_pesanan','=','i.id_pesanan')
		->join('barangs as b','i.id_barang','=','b.id')
		->join('pembayarans as ba', 'pe.id_pesanan','=','ba.id_pesanan')
		->select('b.nama','pe.status','i.jumlah_barang as qty','i.harga_barang as harga','b.file', 'pe.id_pesanan', 'ba.id_bank')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Batal')
		->get();
		$pesditerima=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('pesanan_item as i','pe.id_pesanan','=','i.id_pesanan')
		->join('pengiriman','pe.id_pesanan','=','pengiriman.id_pesanan')
		->join('barangs as b','i.id_barang','=','b.id')
		->join('pembayarans as ba', 'pe.id_pesanan','=','ba.id_pesanan')
		->select('b.nama','pe.status','i.jumlah_barang as qty','pengiriman.tanggal_pengiriman','pengiriman.no_resi','i.harga_barang as harga','b.file', 'pe.id_pesanan', 'ba.id_bank')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Sudah bayar')
		->get();
		// return view('halaman-profil');
		// $category = category::get();
		return view('halaman-profil',['user' => $user,'batal'=>$pebatal,'diterima'=>$pesditerima ,'produk'=>$produk]);
	}
	public function editprofil(Request $request){
		$user = pelanggan::where('id',Auth::user()->id)->get();
		$id = 0;
		foreach($user as $u){
			$id = $u->id_pelanggan;
		}
		if(count($user)==0){
			$pelanggan = [
                'id'=>Auth::user()->id,
                'nama_lengkap'=>$request->nama,
				'jenis_kelamin'=>$request->jk,
                'tanggal_lahir'=>$request->tgl,
                'no_hp'=>$request->no_hp
            ];
			pelanggan::insert($pelanggan);
		}else{
			pelanggan::where('id_pelanggan',$id)->update(
				['nama_lengkap'=>$request->nama,
				'jenis_kelamin'=>$request->jk,
				'tanggal_lahir'=>$request->tgl,
				'no_hp'=>$request->no_hp
				]
		);
		}
		// return view('halaman-profil');
		// $category = category::get();
		return redirect()->back();
	}
	//produk
	public function produk($id){
		
		$barang = barang::find($id);
		// dd($barang);
		// foreach($barang as $a){
		// 	echo $a->id;
		// }
		return view('halaman-produk',['barang' => $barang]);
		// echo $barang->id;
	}
	
	public function bayar(Request $request){
		$category = category::get();
		$bank = bank::where('id_bank',$request->bank)->get();
		// return $request->id_pesanan;
		$cek= pembayaran::where('id_pesanan', $request->id_pesanan)->get();
		if(count($cek) >0){
			return view('halaman-pembayaran2',['bank'=>$bank,'category' => $category, 'id_pesanan'=>$request->id_pesanan]);
		}else{
			pembayaran::insert(
				[
					'id_bank'=>$request->bank,
					'id_pesanan'=>$request->id_pesanan,
					'tanggal_pembayaran'=>null,
					'bukti_pembayaran' => null,
					'status'=>'belum dibayar'
				]
				);
		return view('halaman-pembayaran2',['bank'=>$bank,'category' => $category, 'id_pesanan'=>$request->id_pesanan]);
		}
	}
	public function upload(Request $request){
		// $bank = bank::where('id_bank',$request->bank)->get();
		// $produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		// ->where('p.id',Auth::user()->id )
		// ->where('pe.status','Belum dibayar')->where('pe.tanggal_pesanan',date('Y-m-d'))
		// ->get();
		// dd($produk);
		$cek = DB::table('pembayarans')->where('id_pesanan',$request->id_pesanan)->get();
		$f ="";
		foreach($cek as $c){
			$f = $c->bukti_pembayaran;
		}

		$file = $request->file('bukti');
		if(is_null($file)){
			return  redirect('/profile');
		}else{

		
		// return $file;
		$nama_file = time()."_".$file->getClientOriginalName();
		if(is_null($f)){
			// dd($cek);
			$tujuan_upload = 'data_file/bayar';
			$file->move($tujuan_upload,$nama_file);
			DB::table('pembayarans')->where('id_pesanan',$request->id_pesanan)->update([
				'tanggal_pembayaran'=>date('Y-m-d'),
				'bukti_pembayaran'=>$nama_file
			]);
			return  redirect('/profile');
		}else{
			$tujuan_upload = 'data_file/bayar';
			// dd($f);
			File::delete('data_file/bayar'.$f);
			$file->move($tujuan_upload,$nama_file);
			DB::table('pembayarans')->where('id_pesanan',$request->id_pesanan)->update([
				'tanggal_pembayaran'=>date('Y-m-d'),
				'bukti_pembayaran'=>$nama_file
			]);
			return  redirect('/profile');
		}
		
		}
		
	}

}
