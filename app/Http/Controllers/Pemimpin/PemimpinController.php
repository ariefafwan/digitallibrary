<?php

namespace App\Http\Controllers\Pemimpin;

use App\Models\Divisi;
use App\Models\Izin;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PemimpinController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dt1 = DB::table('izins')->get()->where('status', 'Dikirim')->count();
        $dt2 = DB::table('izins')->get()->where('status', 'Diterima')->count();
        $dt3 = DB::table('izins')->get()->where('status', 'Ditolak')->count();
        $page = "Dashboard Pegawai";
        return view('pemimpin.dashboard', compact('user', 'dt1', 'dt2', 'dt3','page'));
    }

    public function izinditerima()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Diterima";
        $izin = Izin::all()-> where('status', 'Diterima');
        return view('pemimpin.izincuti.diterima', compact('user', 'izin', 'page'));
    }

    public function izinditolak()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Ditolak";
        $izin = Izin::all()-> where('status', 'Ditolak');
        return view('pemimpin.izincuti.ditolak', compact('user', 'izin', 'page'));
    }
    
}