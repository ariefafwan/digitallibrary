<?php

namespace App\Http\Controllers\Admin;

use App\Models\Izin;
use App\Models\Member;
use App\Models\Pegawai;
use App\Models\Pinjam;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        $dt1 = DB::table('pegawais')->get()->count();
        $dt2 = DB::table('members')->get()->count();
        return view('admin.dashboard', compact('user', 'dt1', 'dt2', 'page'));
    }

    public function daftarmember()
    {
        $user = Auth::user();
        $page = "Daftar Member";
        $member = Member::latest()->paginate(10);
        return view('admin.member.daftar', compact('user', 'page', 'member'));
    }

    public function detailmember($id)
    {
        $user = Auth::user();
        $page = "Detail Member";
        $member = Member::findOrFail($id);
        return view('admin.member.show', compact('user', 'page', 'member'));
    }

    public function daftarpegawai()
    {
        $user = Auth::user();
        $page = "Daftar Pegawai";
        $pegawai = Pegawai::latest()->paginate(10);
        return view('admin.pegawai.pegawai', compact('user', 'page', 'pegawai'));
    }

    public function detailpegawai($id)
    {
        $user = Auth::user();
        $page = "Detail Pegawai";
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.show', compact('user', 'page', 'pegawai'));
    }

    public function peminjaman()
    {
        $user = Auth::user();
        $page = "Peminjaman";
        $peminjaman = Pinjam::latest()->where('status', 'Berjalan')->paginate(10);
        return view('admin.peminjaman.index', compact('user', 'peminjaman', 'page'));
    }

    public function dendapinjam()
    {
        $user = Auth::user();
        $page = "Peminjaman Didenda";
        $peminjaman = Pinjam::latest()->where('tglkembali', '<', Carbon::now())->where('status', 'Berjalan')->paginate(10);
        return view('admin.peminjaman.denda', compact('user', 'peminjaman', 'page'));
    }

    public function laporanpinjam()
    {
        $user = Auth::user();
        $page = "Laporan Peminjaman";
        $peminjaman = Pinjam::latest()->where('status', 'Selesai')->paginate(10);
        return view('admin.peminjaman.laporan', compact('user', 'peminjaman', 'page'));
    }

    public function editroles()
    {
        $user = Auth::user();
        $page = "Edit Roles/Jadikan Pegawai";
        $role = Role::all();
        $data = User::doesntHave('doesnt')->where('role_id', '3')->get();
        return view('admin.users', compact('user', 'page', 'data', 'role'));
    }

    public function updaterole(Request $request, $id)
    {
        $dtUpload = User::findOrFail($id);
        $dtUpload->role_id = $request->role_id;

        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'User Berhasil Diedit');
        return back();
    }
    
    public function destroyrole($id)
    {
        $dtUpload = User::findOrFail($id);
        $dtUpload->delete();
        Alert::success('Informasi Pesan!', 'User Berhasil dihapus');
        return back();
    }

    public function cutiditerima()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Cuti Diterima";
        $izin = Izin::latest()->where('status', 'Diterima')->paginate(10);
        return view('admin.pegawai.cutiditerima', compact('user', 'izin', 'page'));
    }

    public function cutiditolak()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Cuti Ditolak";
        $izin = Izin::latest()->where('status', 'Ditolak')->paginate(10);
        return view('admin.pegawai.cutiditolak', compact('user', 'izin', 'page'));
    }
}
