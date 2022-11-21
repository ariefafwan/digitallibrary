<?php

namespace App\Http\Controllers\Pemimpin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PemimpinController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Pemimpin";
        return view('pemimpin.dashboard', compact('user', 'page'));
    }
}
