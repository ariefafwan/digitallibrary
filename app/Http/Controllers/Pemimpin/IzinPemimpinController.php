<?php

namespace App\Http\Controllers\Pemimpin;

use App\Models\Izin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class IzinPemimpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $izin = Izin::all()->where('status', 'Dikirim');
        $page = "Daftar Permohonan Izin";
        return view('pemimpin.izincuti.izin', compact('user', 'izin', 'page'));
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
        $user = Auth::user();
        $izin = Izin::findOrFail($id);
        $page = "Edit Permohonan Izin Cuti";
        return view('pemimpin.izincuti.edit', compact('user', 'izin', 'page'));
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

        $dtUpload = Izin::find($id);
        $dtUpload->nmrizin = $request->nmrizin;
        $dtUpload->user_id = $request->user_id;
        $dtUpload->status = $request->status;
        $dtUpload->jenis = $request->jenis;
        $dtUpload->tglawal = $request->tglawal;
        $dtUpload->tglakhir = $request->tglakhir;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->balasan = $request->balasan;
        $dtUpload->lampiran = $request->lampiran;
        $dtUpload->save();

        return redirect()->route('izinpemimpin.index')
            ->with('updatesuccess', 'Permohonan Izin Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $izin = Izin::findOrFail($id);

        if(file_exists(public_path('lampiran/') . $izin->lampiran)){
            unlink(public_path('lampiran/') . $izin->lampiran);
        }

        $izin->delete();

        return redirect()->route('izinpemimpin.index')
            ->with('updatesuccess', 'Permohonan Izin Berhasil Dihapus');
    }
}
