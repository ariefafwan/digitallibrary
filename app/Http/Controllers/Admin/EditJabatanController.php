<?php

namespace App\Http\Controllers\Admin;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EditJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Pegawai";
        $divisi = Divisi::all();
        $jabatan = Role::all();
        $pegawai = User::all()-> where('role_id', '3');
        return view('admin.editjabatan.daftaruser', compact('user', 'pegawai', 'page', 'jabatan', 'divisi'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $page = 'Detail Users';
        return view('admin.editjabatan.show', compact('user', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $dtUpload = User::find($id);
        $dtUpload->role_id = $request->role_id;

        $dtUpload->save();

        return redirect()->route('daftarpegawai.index')->with(['message' => 'successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('daftarpegawai.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
