<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        $id =  Auth::user()->id;
        $admin = Auth::user()->role;

        if($admin === 'admin'){
            $data = Berita::get();
            return view('berita.index',compact('data'));
        }else{
            $data = Berita::where('id_user',$id)->get();
            return view('berita.index',compact('data'));    
        }

    }

    public function create(){
        return view('berita.create');
    }

    public function store(Request $request){
        $data = new Berita;
        $data->title = $request->title;
        $data->id_user = $request->id_user;
        $data->status = 'pending';
        $data->id_tipe = $request->id_tipe;
        $data->berita = $request->berita;
        $data->slug = $request->slug;

        $images = null;
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/thumbnail',$name);
            $images = $name; 
        }else{
            $images = $request->thumbnail;
        }
        $data->thumbnail = $images;
        $data->save();
        return redirect()->route('berita')->with('message', 'berita berhasil di tambahkan');
    }

    public function show($id){
        $data = Berita::find($id);
        return view('berita.show', compact('data'));
    }

    public function edit($id){
        $data = Berita::find($id);
        return view('berita.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Berita::find($id);
        $data->title = $request->title;
        $data->id_user = $request->id_user;
        $data->status = "pending";
        $data->id_tipe = $request->id_tipe;
        $data->berita = $request->berita;
        $data->slug = $request->slug;

        $images = null;
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/thumbnail',$name);
            $images = $name; 
        }else{
            $images = $request->thumbnail;
        }
        $data->thumbnail = $images;

        $data->save();
        return redirect()->route('berita')->with('message', 'berita berhasil di update');
    }

    public function delete($id){
        $data = Berita::find($id);
        $data->delete();
        return redirect()->route('berita')->with('message', 'berita berhasil di hapus');
    }   
    
    
    public function setstatus(Request $request, $id){
        $data = Berita::find($id);
        $data->status = $request->status;

        $data->save();
        return redirect()->route('berita')->with('message', 'status berhasil di update');

    }

}
