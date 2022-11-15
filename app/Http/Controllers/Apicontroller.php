<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;

class Apicontroller extends Controller
{
    public function getAllTipe(){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $tipe = Tipe::get();

        $result['data'] = $tipe;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    } 

    public function createtipe(Request $request){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $tipe = New Tipe;
        $tipe->tipe = $request->tipe; 
        $tipe->save();

        $result['data'] = $tipe;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);

    }

    public function getOneTipe(Request $r){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $tipe = Tipe::find($r->id);

        $result['data'] = $tipe;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    }

    public function delete(Request $r){

        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $tipe = Tipe::find($r->id);
        $tipe->delete();

        $result['data'] = $tipe;
        $result['status'] = true;
        $result['message'] = 'success';

        return response()->json($result);
    }


    public function updatetipe(Request $request){
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error"; 

        $tipe =Tipe::find($request->id);

        $tipe->tipe = $request->tipe; 
        $tipe->save();

        $result['data'] = $tipe;
        $result['status'] = true;
        $result['message'] = 'success';
        return response()->json($result);

    }
}
