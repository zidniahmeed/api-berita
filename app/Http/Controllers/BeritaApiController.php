<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    public function getAllBerita(){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $berita = Berita::get();

        $result['data'] = $berita;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    } 

    public function getBeritaByuserId(Request $request){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $berita = Berita::where('id_user', $request->id_user)->get();

        $result['data'] = $berita;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    } 

    public function createBerita(Request $request){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

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

        $result['data'] = $data;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);

    }

    public function getOneBerita(Request $r){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $berita = Berita::find($r->id);

        $result['data'] = $berita;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    }

    public function delete(Request $r){

        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $berita = Berita::find($r->id);
        $berita->delete();

        $result['data'] = $berita;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    }


    public function updateBerita(Request $request){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $data = Berita::find($request->id);
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
        $result['data'] = $data;
        $result['status'] = true;
        $result['message'] = 'success';
        return response()->json($result);

    }
}
