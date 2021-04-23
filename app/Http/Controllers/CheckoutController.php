<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use App\Models\pelanggan;
use App\Models\pengiriman;
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
            // echo "c";
            pelanggan::where('id_pelanggan',$id)->update(
                    ['nama_lengkap'=>$request->nama_pelanggan,
                    'kode_pos'=>$request->kode_pos,
                    'no_hp'=>$request->no_hp
                    ]
            );
            

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
            $kurir = kurir::where('kode_kurir',$request->kurir)->select('id_kurir')->get();
            $id_kurir=0;
            foreach($kurir as $k){
                $id_kurir = $k->id_kurir;
            }
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

            pengiriman::insert([
                'id_kurir' => $id_kurir,
                'id_pesanan'=>$id_pesan,
                'nama_penerima'=>$request->nama_pelanggan,
                'no_hp'=>$request->no_hp,
                'kode_pos'=>$request->kode_pos,
                'Jenis_pengiriman'=>$request->jenis_pengiriman,
                'biaya_pengiriman'=>$request->biaya_pengiriman
            ]);
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            
            return redirect('/pembayaran');
        }else{
            // return($cek);
            $pelanggan = [
                'id'=>Auth::user()->id,
                'nama_lengkap'=>$request->nama_pelanggan,
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
            $kurir = kurir::where('kode_kurir',$request->kurir)->select('id_kurir')->get();
            $id_kurir=0;
            foreach($kurir as $k){
                $id_kurir = $k->id_kurir;
            }
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
            pengiriman::insert([
                'id_kurir' => $id_kurir,
                'id_pesanan'=>$id_pesan,
                'nama_penerima'=>$request->nama_pelanggan,
                'no_hp'=>$request->no_hp,
                'kode_pos'=>$request->kode_pos,
                'Jenis_pengiriman'=>$request->jenis_pengiriman,
                'biaya_pengiriman'=>$request->biaya_pengiriman
            ]);
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            return redirect('/pembayaran');
        }
        
        
    }
}

