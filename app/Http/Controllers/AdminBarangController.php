<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class AdminBarangController extends Controller
{
    //
    public function adminbarang(){
		$barang = barang::get();
		return view('adminbarang',['barangs' => $barang]);
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'harga' => 'required',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		barang::create([
			'file' => $nama_file,
            'nama' => $request->nama,
            'harga' => $request->harga,
			'keterangan' => $request->keterangan,
		]);
 
		return redirect()->back();
	}

    public function delete($id)
        {
            $barang = barang::find($id);
            $barang->delete();
            return redirect()->back();
        }

	
}
