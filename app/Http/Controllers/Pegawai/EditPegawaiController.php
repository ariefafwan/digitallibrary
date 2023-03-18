<?php

namespace App\Http\Controllers\Pegawai;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EditPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Profile Anda";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        return view('pegawai.datapegawai.data', compact('user', 'page', 'pegawai'));
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
        $nm = $request->profile_img;
        $namaFile = $nm->getClientOriginalName();
        
        $dtUpload = new Pegawai();
        $dtUpload->user_id = $request->user_id;
        $dtUpload->name = $request->name;
        $dtUpload->gender = $request->gender;
        $dtUpload->nmrhp = $request->nmrhp;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->date_of_birth = $request->date_of_birth;
        $dtUpload->profile_img = $namaFile;

        $nm->move(public_path() . '/storage/profil', $namaFile);
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Profile Baru Berhasil ditambahkan');
        return redirect()->route('editpegawai.index');
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
        $user = Auth::user($id);
        $pegawai = Pegawai::all()->where('user_id', Auth::user()->id);
        $profile = Pegawai::findOrfail($id);
        $page = "Edit Profile User";
        return view('pegawai.datapegawai.edit', compact('user', 'page', 'pegawai', 'profile'));
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
        $nm = $request->profile_img;
        $namaFile = $nm->getClientOriginalName();
        
        $dtUpload = Pegawai::findOrFail($id);
        $dtUpload->user_id = $request->user_id;
        $dtUpload->name = $request->name;
        $dtUpload->gender = $request->gender;
        $dtUpload->nmrhp = $request->nmrhp;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->date_of_birth = $request->date_of_birth;
        $dtUpload->profile_img = $namaFile;

        $nm->move(public_path() . '/storage/profil', $namaFile);
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Profile Berhasil diedit');
        return redirect()->route('editpegawai.index');
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
