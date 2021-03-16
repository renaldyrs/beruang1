<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use App\Models\pelanggan;
use App\Models\pesanan;
use App\Models\pesanan_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $pela = pelanggan::where('id',Auth::user()->id)->select('id_pelanggan')->get();
            // dd($pela);
            // echo date('Y-m-d');
            $id=0;
            foreach($pela as $a){
                $id = $a->id_pelanggan;
            }
            echo "c";
            $cartItems = json_decode($request->cookie('dw-carts'), true); 
            $pesanan = [
                'id_kota'=>$request->kota,
                'id_provinsi'=>$request->provinsi,
                'id_pelanggan'=>$id,
                'tanggal_pesanan'=> date('Y-m-d'),
                'alamat'=>$request->alamat_lengkap,
                'status'=>'Belum dibayar',
                'total'=>$request->total,
                'grantotal'=>$request->grand_total
            ];
            pesanan::insert($pesanan);
            $pesan = pesanan::where('id_pelanggan',$id)->select('id_pesanan')->get();
            $id_pesan=0;
            foreach($pesan as $a){
                $id_pesan= $a->id_pesanan;
            }
            foreach($cartItems as $a){
                pesanan_items::insert([
                    'id_barang'=>$a['product_id'],
                    'id_pesanan'=>$id_pesan,
                    'jumlah_barang'=>$a['qty'],
                    'harga_barang'=>$a['product_price']
                ]);
            }
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            
            return redirect('/');
        }else{
            // return($cek);
            $pelanggan = [
                'id'=>Auth::user()->id,
                'nama_lengkap'=>$request->nama_pelanggan,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'kode_pos'=>$request->kode_pos,
                'no_hp'=>$request->no_hp
            ];
            pelanggan::insert($pelanggan);
            $pela = pelanggan::where('id',Auth::user()->id)->select('id_pelanggan')->get();
            // dd($pela);
            // echo date('Y-m-d');
            $id=0;
            foreach($pela as $a){
                $id = $a->id_pelanggan;
            }
            echo "c";
            $cartItems = json_decode($request->cookie('dw-carts'), true); 
            $pesanan = [
                'id_kota'=>$request->kota,
                'id_provinsi'=>$request->provinsi,
                'id_pelanggan'=>$id,
                'tanggal_pesanan'=> date('Y-m-d'),
                'alamat'=>$request->alamat_lengkap,
                'status'=>'Belum dibayar',
                'total'=>$request->total,
                'grantotal'=>$request->grand_total
            ];
            pesanan::insert($pesanan);
            $pesan = pesanan::where('id_pelanggan',$id)->select('id_pesanan')->get();
            $id_pesan=0;
            foreach($pesan as $a){
                $id_pesan= $a->id_pesanan;
            }
            foreach($cartItems as $a){
                pesanan_items::insert([
                    'id_barang'=>$a['product_id'],
                    'id_pesanan'=>$id_pesan,
                    'jumlah_barang'=>$a['qty'],
                    'harga_barang'=>$a['product_price']
                ]);
            }
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            return redirect('/pembayaran');
        }
        
        
    }
}

