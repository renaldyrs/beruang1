<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewadminhome(){
		return view('adminhome');
	}

  //supplier
  public function viewadminsup(){
    
    return view('admin_supplier');

  }

  //laporan
  public function laporan(){

    return view('admin_laporan');
  }
}
