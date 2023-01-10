<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        $dt1 = DB::table('users')->get()->where('role_id', '2')->count();
        $dt2 = DB::table('users')->get()->where('role_id', '3')->count();
        return view('admin.dashboard', compact('user', 'dt1', 'dt2', 'page'));
    }
}
