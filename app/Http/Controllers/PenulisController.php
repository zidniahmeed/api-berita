<?php

namespace App\Http\Controllers;

use App\Models\User;

class PenulisController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $penulis = User::where('role','user')->get();
        return view('penulis.index',compact('penulis'));
    }


    public function delete($id){
        $penulis = User::find($id);
        $penulis->delete();
        return redirect()->back()->with('message', 'data berhasil di hapus');
    }
}
