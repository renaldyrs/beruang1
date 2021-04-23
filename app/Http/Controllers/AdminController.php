<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use App\Models\Kurir;
use App\Models\bank;
use App\Models\pembayaran;
use App\Models\pengiriman;
use App\Models\User;
use App\Models\pesanan;
use App\Models\pesanan_item;
use App\Models\provinsi;
use PDF;
use DB;

class AdminController extends Controller
{
    //
    public function viewadminhome(){
      $jumpesan = pesanan::get();
      $jumuser=User::where('id_role',2)->get();
      $pesbayar = pesanan::where('status','Sudah dibayar')->get();
      $pesbatal = pesanan::where('status','Batal')->get();
		  return view('adminhome', ['jumpesan'=>$jumpesan, 'jumuser'=>$jumuser,'pesbayar'=>$pesbayar,'pesbatal'=>$pesbatal]);
	  }

  

  //kurir
    public function viewadminkurir(){
    $kurir = kurir::get();

    return view('adminkurir',['kurirs' => $kurir]);

    }

    public function tambah(Request $request){
    DB::table('kurirs')->insert([

    'kode_kurir' => $request->kode,
    'nama_kurir' => $request->nama
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/adminkurir');

    }
      
    public function deletekurir($id_kurir){
          $kurir = kurir::find($id_kurir);
          $kurir->delete();
          return redirect()->back();

    }

    public function updatekurir($id_kurir){
    $kurir = kurir::find($id_kurir);
    return view('adminkurirupdate',['kurirs' => $kurir]);

    }

    public function proseskurir(Request $request){
      // update data pegawai
      DB::table('kurirs')
      ->where('id_kurir',$request->id)
      ->update([
        'nama_kurir' => $request->nama,
        'kode_kurir' => $request->kode_kurir
        
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect('/adminkurir');

    }
    
  //bank
    public function viewadminbank(){
    $bank = bank::get();
	
    return view('adminbank',['banks' => $bank]);

    }

    public function tambahbank(Request $request){
      DB::table('banks')->insert([
     
      'no_rekening' => $request->no_rekening,
      'nama_bank' => $request->nama
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect('/adminbank');
      
      }

    public function deletebank($id_bank){
        $bank = bank::find($id_bank);
        $bank->delete();
        return redirect()->back();

      }

    public function updatebank($id_bank){
        $bank = bank::find($id_bank);
        return view('adminbankupdate',['bank' => $bank]);

      }

    public function prosesbank(Request $request){
        // update data pegawai
        DB::table('bank')->where('id_bank',$request->id)
        ->update([
          'nama_bank' => $request->nama,
          'no_rekening' => $request->no_rekening
          
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/adminbank');

      }

  //laporan
  public function laporan(){
    $laporan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->join('pengiriman','pengiriman.id_pesanan','=','pesanan.id_pesanan')
    ->select('pesanan.id_pesanan','barangs.nama','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.total','pengiriman.jenis_pengiriman','pengiriman.biaya_pengiriman')
    ->get();
     
    return view('admin_laporan',compact('laporan'));

  }

  public function cetak(){

    $laporan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->select('pesanan.id_pesanan','barangs.nama','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.total')
    ->where('status','Sudah bayar')
    ->get();
    $total = pesanan::where('status','Sudah bayar')->get();
    $grantotal = 0;
    foreach($total as $a){
      $grantotal += $a->total;
    }
    return view('cetaklaporan',['laporan'=>$laporan,'gran'=>$grantotal]);
    	
  }
  public function prosescetak(){

    
    $laporan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->select('pesanan.id_pesanan','barangs.nama','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.total')
  
    ->where('status','Sudah bayar')
    ->get();
    $total = pesanan::where('status','Sudah bayar')->get();
    $grantotal = 0;
    foreach($total as $a){
      $grantotal += $a->total;
    }
    

    $pdf = \PDF::loadview('cetaklaporan',['laporan'=>$laporan,'gran'=>$grantotal]);
    	return $pdf->download('laporan-pdf.pdf');
  }

 

  //pesanan
  public function viewpesanan(){
    $pesanan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('pembayarans as p', 'pesanan.id_pesanan','=','p.id_pesanan')
    ->join('provinsi', 'pesanan.id_provinsi','=', 'provinsi.id_provinsi')
    ->join('kota', 'pesanan.id_kota','=', 'kota.id_kota')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->select('pesanan.id_pesanan','p.bukti_pembayaran','pesanan.grantotal','barangs.nama','provinsi.nama_provinsi','kota.nama_kota','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.alamat','pesanan.total')
    ->get();
    return view('admininformasipesan',compact('pesanan'));

  }
// pesanan diterima
  public function viewpesananditerima(){
    $pesanan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->join('provinsi', 'pesanan.id_provinsi','=', 'provinsi.id_provinsi')
    ->join('kota', 'pesanan.id_kota','=', 'kota.id_kota')
    ->select('pesanan.id_pesanan','barangs.nama','provinsi.nama_provinsi','kota.nama_kota','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.alamat','pesanan.total')
    ->where('pesanan.status','=','Sudah bayar')
    ->get();
    return view('adminpesananditerima',compact('pesanan'));

  }

  public function kirim(Request $request){
    if(is_null($request->no_resi)){
      return redirect()->back();
    }else{
      pengiriman::where('id_pesanan',$request->id_pesanan)->update([
        'tanggal_pengiriman'=>$request->tanggal_kirim,
        'no_resi'=>$request->no_resi,
      ]);
      return redirect()->back();
    }
  }
// pesanan batal
  public function viewpesananbatal(){
    $pesanan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('provinsi', 'pesanan.id_provinsi','=', 'provinsi.id_provinsi')
    ->join('kota', 'pesanan.id_kota','=', 'kota.id_kota')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->select('pesanan.id_pesanan','barangs.nama','provinsi.nama_provinsi','kota.nama_kota','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.alamat','pesanan.total')
    ->where('pesanan.status','=','Batal')
    ->get();
    return view('adminpesananbatal',compact('pesanan'));

  }

  public function statusbayar(Request $request,$id_pesanan){
    $cek = pembayaran::where('id_pesanan',$id_pesanan)->get();
    $file = null;
    foreach($cek as $c){
      $file = $c->bukti_pembayaran;
    }
    if(is_null($file)){
      return redirect()->back();
    }else{
      $id = pesanan::find($id_pesanan);
      $status="Sudah bayar";
      pembayaran::where('id_pesanan',$request->id_pesanan)
      ->update([
        'status' =>$status
      ]);
      DB::table('pesanan')
      ->where('id_pesanan',$request->id_pesanan)
      ->update([
        'status' =>$status
      ]);
      return redirect()->back();
    }
  }

  public function statusbatal(Request $request,$id_pesanan){
    $id = pesanan::find($id_pesanan);
    $status="Batal";
    DB::table('pesanan')
    ->where('id_pesanan',$request->id_pesanan)
    ->update([
      'status' =>$status
    ]);
    return redirect()->back();

  }
  
  public function viewpesanandikirim(){
    $pesanan = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->join('barangs','pesanan_item.id_barang','=','barangs.id')
    ->join('provinsi', 'pesanan.id_provinsi','=', 'provinsi.id_provinsi')
    ->join('pengiriman','pesanan.id_pesanan','=','pengiriman.id_pesanan')
    ->join('kurirs','pengiriman.id_kurir','=','kurirs.id_kurir')
    ->join('kota', 'pesanan.id_kota','=', 'kota.id_kota')
    ->select('pesanan.id_pesanan','pengiriman.tanggal_pengiriman','barangs.nama','grantotal','kurirs.nama_kurir','pengiriman.no_resi','pengiriman.biaya_pengiriman','provinsi.nama_provinsi','kota.nama_kota','pesanan_item.jumlah_barang','pesanan_item.harga_barang', 'pesanan.tanggal_pesanan','pesanan.status','pesanan.alamat','pesanan.total')
    ->where('pesanan.status','=','Sudah bayar')
    ->whereNotNull('no_resi')
    ->get();
    return view('adminpengiriman',compact('pesanan'));
  }

}
