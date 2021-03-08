<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $cartItems = json_decode($request->cookie('dw-carts'), true); 
        $subtotal = collect($cartItems)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });
        $courier = kurir::get();
        return view('pengiriman', compact('cartItems','subtotal','courier'));
    }
    public function pengiriman(Request $request){
        $cek = pelanggan::where('id',Auth::user()->id)->get();
        if(count($cek)>0){

        }else{
            // return($cek);
            $pelanggan = [
                'id'=>Auth::user()->id,
                'nama_lengkap'=>$request->nama_pelanggan,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'kode_pos'=>$request->kode_pos,
                'no_hp'=>$request->no_hp
            ];
            // pelanggan::insert($pelanggan);
            $pela = pelanggan::where('id',Auth::user()->id)->select('id_pelanggan')->get();
            // dd($pela);
            $id=0;
            foreach($pela as $a){
                $id = $a->id_pelanggan;
            }
            $cartItems = json_decode($request->cookie('dw-carts'), true); 
            $subtotal = collect($cartItems)->sum(function($q) {
                return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
            });

        }
        
        
    }
}

