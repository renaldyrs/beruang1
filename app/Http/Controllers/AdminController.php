<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use App\Models\Kurir;
use App\Models\bank;
use DB;

class AdminController extends Controller
{
    //
    public function viewadminhome(){
		return view('adminhome');
	  }

  //supplier
    public function viewadminsup(){
    $suplier = supplier::get();
	
    return view('admin_supplier',['suplier' => $suplier]);

    }
    public function delete($id_suplier){
      $suplier = supplier::find($id_suplier);
      $suplier->delete();
      return redirect()->back();
    }

    public function update($id_suplier){
    $suplier = supplier::all();
    return view('admin_supplierupdate',['suplier' => $suplier]);
    }

    public function proses(Request $request){
      // update data pegawai
      DB::table('suplier')->where('id_suplier',$request->id_suplier)->update([
        'nama_suplier' => $request->nama,
        'alamat' => $request->alamat,
        'id_kota' => $request->id_kota,
        'id_provinsi' => $request->id_provinsi
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect('/adminsupplier');
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
      DB::table('kurirs')->where('id_kurir',$request->id_kurir)->update([
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
        return view('adminbankupdate',['banks' => $bank]);
      }

    public function prosesbank(Request $request){
        // update data pegawai
        DB::table('banks')->where('id_bank',$request->id_bank)->update([
          'nama_bank' => $request->nama,
          'no_rekening' => $request->no_rekening
          
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/adminbank');
      }

  //laporan
  public function laporan(){
    $datas = DB::table('pesanan_item')
    ->join('pesanan', 'pesanan_item.id_pesanan', '=', 'pesanan.id_pesanan')
    ->select('pesanan_item.jumlah_barang','pesanan_item.harga', 'pesanan.tanggalpesanan','pesanan.status','pesanan.keterangan')
    ->get();
     
    return view('admin_laporan');
  }
}
