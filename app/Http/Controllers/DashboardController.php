<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $id =  Auth::user()->id;
        $admin = Auth::user()->role;

        $berita = null;
        if($admin === 'admin'){
            $berita = Berita::count();
        }else{
            $berita = Berita::where('id_user',$id)->count();
        }
        
        $penulis = User::where('role','user')->count();


        return view('dashboard',compact('berita','penulis'));
    }
}
