<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\category;
class HalamanAwalController extends Controller
{
    //
    public function viewawal(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-awal',['barangs' => $barang, 'category' => $category]);
	}
	

	public function category($id){
		// $category = category::find($id);
		$category = category::all();
		$barang = barang::where('id_category', $id)->get();
		return view('halaman-awal',['barangs' => $barang, 'category' => $category]);
		// dd($barang);
	}

	//catalog
	public function catalog(){
		$barang = barang::get();
		
		return view('halaman-katalog',['barangs' => $barang]);
	}

	//pembayaran
	public function pembayaran(){
		return view('halaman-pembayaran');
	}
	public function code(){
		$barang = barang::get();
		return view('halaman-pembayaran2',['barangs' => $barang]);
	}
	//keranjang
	public function keranjang(){
		$barang = barang::get();
		return view('halaman-keranjang',['barangs' => $barang]);
	}
	//profil
	public function profil(){
		
		return view('halaman-profil');
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
	


}
