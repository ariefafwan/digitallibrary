<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role_id;
        if ($role == "1") {
            return redirect()->route('admin');
        } else if ($role == "2") {
            return redirect()->route('pegawai');
        } else if ($role == "3") {
            return redirect()->route('user');
        }
        return redirect()->to('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
