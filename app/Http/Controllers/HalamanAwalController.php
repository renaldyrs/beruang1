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
		return view('halaman-awal',['barangs' => $barang]);
	}
	

	//catalog
	public function catalog(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-katalog',['barangs' => $barang, 'category' => $category]);
	}
	//keranjang
	public function keranjang(){
		return view('halaman-keranjang');
	}
	//profil
	public function profil(){
		
		return view('halaman-profil');
	}
	//produk
	public function produk(){
		
		return view('halaman-produk');
	}
	


}
