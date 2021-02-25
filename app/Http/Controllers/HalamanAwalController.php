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
	public function viewbeli(){
		return view('halaman-beli');
	}
	public function login1(){
		return view('login1');
	}

	//catalog
	public function catalog(){
		$barang = barang::get();
		$category = category::get();
		return view('halaman-katalog',['barangs' => $barang, 'category' => $category]);
	}
	


}
