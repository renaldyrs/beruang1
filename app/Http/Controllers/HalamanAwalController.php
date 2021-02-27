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
	

	//catalog
	public function catalog(){
		$barang = barang::get();
		
		return view('halaman-katalog',['barangs' => $barang]);
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
	public function produk(){
		
		return view('halaman-produk');
	}
	


}
