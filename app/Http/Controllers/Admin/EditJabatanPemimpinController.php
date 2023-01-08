<?php

namespace App\Http\Controllers\Admin;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EditJabatanPemimpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $divisi = Divisi::all();
        $page = "Daftar Pemimpin";
        $jabatan = Role::all();
        $pegawai = User::all()-> where('role_id', '2');
        return view('admin.editjabatan.daftarpemimpin', compact('user', 'pegawai', 'page', 'jabatan', 'divisi'));
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
        //
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

        return redirect()->route('daftarpemimpin.index')->with(['message' => 'successfully!']);
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

        return redirect()->route('daftarpemimpin.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
