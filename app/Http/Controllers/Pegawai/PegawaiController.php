<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Izin;
use App\Models\Pegawai;
use App\Models\Pinjam;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dashboard Pegawai";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        if ($pegawai->isEmpty()){
            return view('pegawai.datapegawai.tambah', compact('user', 'page', 'pegawai'));
        }
        $dt1 = DB::table('izins')->get()->where('status', 'Dikirim')->count();
        $dt2 = DB::table('izins')->get()->where('status', 'Diterima')->count();
        $dt3 = DB::table('izins')->get()->where('status', 'Ditolak')->count();
        return view('pegawai.dashboard', compact('user', 'dt1', 'dt2', 'dt3','page', 'pegawai'));
    }

    public function izinditerima()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Diterima";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        foreach ($pegawai as $p)
        {
            $izin = Izin::all()->where('pegawai_id', $p->id)->where('status', 'Diterima');
        }
        return view('pegawai.izincuti.diterima', compact('user', 'izin', 'page', 'pegawai'));
    }

    public function izinditolak()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Ditolak";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        foreach ($pegawai as $p)
        {
            $izin = Izin::all()->where('pegawai_id', $p->id)->where('status', 'Ditolak');
        }
        return view('pegawai.izincuti.ditolak', compact('user', 'izin', 'page', 'pegawai'));
    }

    public function selesai()
    {
        $user = Auth::user();
        $page = "Peminjaman Selesai";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pinjam = Pinjam::paginate(10)->where('status', 'Selesai');
        return view('pegawai.book.pinjam.selesai.pinjam', compact('user', 'page', 'pinjam', 'pegawai'));
    }
    
    public function denda()
    {
        $user = Auth::user();
        $page = "Peminjaman Didenda";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pinjam = Pinjam::paginate(10)->where('tglkembali', '<', Carbon::now())->where('status', 'Berjalan');
        return view('pegawai.book.pinjam.denda.pinjam', compact('user', 'page', 'pinjam', 'pegawai'));
    }
    
}