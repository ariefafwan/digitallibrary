<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard User";
        return view('user.dashboard', compact('user', 'page'));
    }
}
