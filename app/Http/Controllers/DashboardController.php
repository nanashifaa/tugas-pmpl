<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penelitian;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $total = Penelitian::count();
        $aktif = Penelitian::where('status','Aktif')->count();
        $selesai = Penelitian::where('status','Selesai')->count();
        $recent = Penelitian::latest()->take(3)->get();

        return view('dashboard',compact('user','total','aktif','selesai','recent'));
    }
}