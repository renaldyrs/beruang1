<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\category;
use File;
class AdminBarangController extends Controller
{
    //
    public function adminbarang(){
		$barang = barang::get();
		$category = category::get();
		return view('adminbarang',['barangs' => $barang, 'category' => $category]);
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'harga' => 'required',
			'stock' => 'required',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		
		$nama_file = time()."_".$file->getClientOriginalName();
		barang::create([
			'id_category' => $request->category,
			'file' => $nama_file,
			
            'nama' => $request->nama,
            'harga' => $request->harga,
			'stock' => $request->stock,
			
			'keterangan' => $request->keterangan,
		]);
 

		// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		return redirect()->back();
	}

    public function delete($id)
        {
            $barang = barang::find($id);
			File::delete('data_file/'.$barang->file);
            $barang->delete();
            return redirect()->back();
        }

	public function update($id){
		$barang = barang::find($id);
		
		return view('adminbarangupdate',['barangs' => $barang]);
	}
	
}
