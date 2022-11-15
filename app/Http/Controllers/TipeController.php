<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        $tipe = Tipe::get();
        return view('tipe.index',compact('tipe'));
    }

    public function store(Request $request){
       $tipe = New Tipe;
       $tipe->tipe = $request->tipe; 
       $tipe->save();

       return redirect()->back()->with('message', 'data berhasil di tambahkan');
    }

    public function delete($id){
        $tipe = Tipe::find($id);
        $tipe->delete();
        return redirect()->back()->with('message', 'data berhasil di hapus');
    }

}
