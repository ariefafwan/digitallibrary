<?php

namespace App\Http\Controllers\User;

use App\Models\Izin;
use App\Models\Member;
use App\Models\Pinjam;
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
        $page = "Dasboard User";
        $member = Member::where('user_id', Auth::user()->id)->get();
        if ($member->isEmpty()) {
            return view('user.member.tambah', compact('user', 'page', 'member'));
        }
        // $dt1 = DB::table('users')->get()->where('role_id', '2')->count();
        $dt1 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Dikirim')->count();
        $dt2 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Diterima')->count();
        $dt3 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Ditolak')->count();
        return view('user.dashboard', compact('user', 'dt1', 'dt2', 'dt3', 'page', 'member'));
    }

    public function record()
    {
        $user = Auth::user();
        $page = "Record Peminjaman";
        $member = Member::where('user_id', Auth::user()->id)->get();
        if ($member->isEmpty()) {
            return view('user.member.tambah', compact('user', 'page', 'member'));
        }
        foreach ($member as $user) {
            $pinjam = Pinjam::all()->where('member_id', $user->id);
        }
        return view('user.member.record', compact('user', 'page', 'member', 'pinjam'));
    }
}
