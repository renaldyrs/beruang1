<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\barang;
use Facade\FlareClient\Http\Response;

use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function add( Request $request)
    {
        // add the product to cart
        // \Cart::session(auth()->id())->add(array(
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'price' => $product->price,
        //     'quantity' => 1,
        //     'attributes' => array(),
        //     'associatedModel' => $product
        // ));



        // return redirect()->route('cart.index');
        
        $this->validate($request, [
            'product_id' => 'required|exists:barangs,id', //PASTIKAN PRODUCT_IDNYA ADA DI DB
            // 'qty' => 'required|integer' //PASTIKAN QTY YANG DIKIRIM INTEGER
        ]);
        $carts = json_decode($request->cookie('dw-carts'), true); 
        if ($carts && array_key_exists($request->product_id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$request->product_id]['qty'] += 1;
            echo "halo";
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            $product = barang::find($request->product_id);
            // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            $carts[$request->product_id] = [
                'qty' => 1,
                'product_id' => $product->id,
                'product_name' => $product->nama,
                'product_price' => $product->harga,
                'product_image' => $product->file,
                'keterangan' => $product->keterangan
            ];
            echo "a";
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        // Cookie::queue($cookie);
        return redirect()->back()->cookie($cookie); 
        
        // // echo
        
        // $cookie = Cookie::make('name', 'value', 120);
            // $response = new Response('aku');
            // $response->withCookie(cookie())
    }
    public function index(Request $request)
    {

        $cartItems = json_decode($request->cookie('dw-carts'), true); 
        $subtotal = collect($cartItems)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });


       
    // // unset($cartItems[2]);
    // // // dd($cartItems);
    
        return view('halaman-keranjang', compact('cartItems','subtotal'));
    }
    public function change($id,$n,Request $request){
        // Cookie::queue($cookie);
        $carts = json_decode($request->cookie('dw-carts'), true); 
        if ($carts && array_key_exists($id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$id]['qty'] =$n;
            // echo "halo";
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            $product = Product::find($request->product_id);
            // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            $carts[$request->product_id] = [
                'qty' => 1,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
            echo "a";
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        Cookie::queue($cookie);
        
        // return redirect()->back()->cookie($cookie); 
        // return redirect()->back();
         
    }
    public function delete($id,Request $request){
        $carts = json_decode($request->cookie('dw-carts'), true); 
        unset($carts[$id]);
        if ($carts  ) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            // $carts[$request->product_id]['qty'] += 1;
            
            echo "halo";
            
            $cookie = cookie('dw-carts', json_encode($carts), 2880);
            Cookie::queue($cookie);
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            // $product = barang::find($request->product_id);
            // // TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            // $carts[$request->product_id] = [
            //     'qty' => 1,
            //     'product_id' => $product->id,
            //     'product_name' => $product->nama,
            //     'product_price' => $product->harga,
            //     'product_image' => $product->file,
            //     'keterangan' => $product->keterangan
            // ];
            $cookie = \Cookie::forget('dw-carts');
            Cookie::queue($cookie);
            // echo "a";
            return redirect('keranjang');
        }
    }
}
