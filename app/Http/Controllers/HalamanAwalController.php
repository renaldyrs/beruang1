<?php

namespace App\Http\Controllers;

use App\Models\bank;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\category;
use App\Models\pelanggan;
use App\Models\pembayaran;
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
			$tujuan_upload = 'data_file';
			$file->move($tujuan_upload,$nama_file);
			user::where('id',Auth::user()->id)->update([
				'foto'=>$nama_file,
			]);
			return redirect()->back();
		}else{
			File::delete('data_file/'.Auth::user()->foto);
			$tujuan_upload = 'data_file';
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
		$alamat = DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('kota as k','pe.id_kota','=','k.id_kota')
		->join('provinsi as pr','k.id_provinsi','=','pr.id_provinsi')
		->select('alamat','nama_kota','nama_provinsi')
		->where('p.id',Auth::user()->id )->where('tanggal_pesanan',date('Y-m-d'))
		->get();
		$produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->join('pesanan_item as i','pe.id_pesanan','=','i.id_pesanan')
		->join('barangs as b','i.id_barang','=','b.id')
		->select('b.nama','i.jumlah_barang as qty','i.harga_barang as harga','b.file')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Belum dibayar')->where('tanggal_pesanan',date('Y-m-d'))
		->get();
		$bank = bank::get();
		$category = category::get();
		// dd($produk);
		return view('halaman-pembayaran',['alamat' => $alamat,'produk' => $produk,'bank' => $bank,'category'=>$category]);
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
		
		// return view('halaman-profil');
		// $category = category::get();
		return view('halaman-profil',['user' => $user]);
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
		$produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Belum dibayar')
		->get();
		$id_pesanan = 0;
		foreach($produk as $p){
			$id_pesanan = $p->id_pesanan;
		}
			pembayaran::insert(
				[
					'id_bank'=>$request->bank,
					'id_pesanan'=>$id_pesanan,
					'tanggal_pembayaran'=>null,
					'bukti_pembayaran' => null,
					'status'=>'belum dibayar'
				]
				);
		return view('halaman-pembayaran2',['bank'=>$bank,'category' => $category]);
	}
	public function upload(Request $request){
		// $bank = bank::where('id_bank',$request->bank)->get();
		$produk=DB::table('pelanggan as p')->join('pesanan as pe', 'p.id_pelanggan','=','pe.id_pelanggan')
		->where('p.id',Auth::user()->id )
		->where('pe.status','Belum dibayar')->where('pe.tanggal_pesanan',date('Y-m-d'))
		->get();
		// dd($produk);
		DB::table('pembayarans')->update([
			'tanggal_pembayaran'=>date('Y-m-d'),
			'bukti_pembayaran'=>$request->bukti
		]);
		return  redirect('');
	}

}
