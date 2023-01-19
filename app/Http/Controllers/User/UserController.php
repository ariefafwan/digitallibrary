<?php

namespace App\Http\Controllers\User;

use App\Models\Izin;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dt1 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Dikirim')->count();
        $dt2 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Diterima')->count();
        $dt3 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Ditolak')->count();
        $page = "Dasboard User";
        return view('user.dashboard', compact('user', 'dt1', 'dt2', 'dt3', 'page'));
    }

    public function izinditerima()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Diterima";
        $izin = Izin::all()->where('user_id',Auth::user()->id)-> where('status', 'Diterima');
        $nippos = Auth::user()->nippos;
        if ($nippos == true) {
            return view('user.izincuti.diterima', compact('user', 'izin', 'page', 'nippos'));
        }
        return view('user.izincuti.belum', compact('user', 'izin', 'page', 'nippos'));
        
    }

    public function izinditolak()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Ditolak";
        $izin = Izin::all()-> where('status', 'Ditolak');
        $nippos = Auth::user()->nippos;
        if ($nippos == true) {
            return view('user.izincuti.ditolak', compact('user', 'izin', 'page', 'nippos'));
        }
        return view('user.izincuti.belum', compact('user', 'izin', 'page', 'nippos'));
        
    }
}
