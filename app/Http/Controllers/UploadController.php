<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\barang;
 
class UploadController extends Controller
{
	public function upload(){
		$barang = barang::get();
		return view('halaman-awal',['barangs' => $barang]);
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
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		barang::create([
			'file' => $nama_file,
            'nama' => $request->nama,
            'harga' => $request->harga,
			'stock' => $request->stock,
			'keterangan' => $request->keterangan,
		]);
 
		return redirect()->back();
	}

}