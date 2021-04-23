<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
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
            'id_provinsi' => $request->id_provinsi,
            'no'=> $request->notel
          ]);
          // alihkan halaman ke halaman pegawai
          return redirect('/adminsupplier');
    
        }
}
