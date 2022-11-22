<?php

namespace App\Http\Controllers\User;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EditUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $page = "Profile User";
        return view('user.user', compact('user', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user($id);
        $page = "Edit Profile User";
        return view('user.edit', compact('user', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user($id);
        
        $nm = $request->profile_img;
        $namaFile = $nm->getClientOriginalName();

        $dtUpload = User::find($id);
        $dtUpload->name = $request->name;
        $dtUpload->profile_img = $namaFile;
        $dtUpload->nippos = $request->nippos;
        $dtUpload->nmrhp = $request->nmrhp;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->kantor = $request->kantor;
        $dtUpload->jabatan = $request->jabatan;
        $dtUpload->status_kawin = $request->status_kawin;

        $nm->move(public_path() . '/img/profil', $namaFile);
        $dtUpload->save();

        return redirect()->route('edituser.show', $user->id)->with(['message' => 'News created successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
