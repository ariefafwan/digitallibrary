<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Izin;
use App\Models\Pegawai;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class IzinPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        foreach ($pegawai as $p)
        {
            $izin = Izin::all()->where('pegawai_id', $p->id)->where('status', 'Dikirim');
        }
        $page = "Permohonan Izin Dikirim";
        return view('pegawai.izincuti.izin', compact('user', 'izin', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Permohonan Izin Cuti";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        return view('pegawai.izincuti.create', compact('user', 'page', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->lampiran;
        $idgen = time() . rand(100, 999);
        $namaFile = $nm->getClientOriginalName();

        $dtUpload = new Izin();
        $dtUpload->nmrizin = $idgen;
        $dtUpload->pegawai_id = $request->pegawai_id;
        $dtUpload->status = $request->status;
        $dtUpload->jenis = $request->jenis;
        $dtUpload->tglawal = $request->tglawal;
        $dtUpload->tglakhir = $request->tglakhir;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->lampiran = $namaFile;

        $nm->move(public_path() . '/storage/lampiran', $namaFile);
        $dtUpload->save();


        return redirect()->route('izin.index')
            ->with('updatesuccess', 'Permohonan Izin Berhasil Dikirim');
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
        //
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

        if(file_exists(public_path('/storage/lampiran/') . $izin->lampiran)){
            unlink(public_path('/storage/lampiran/') . $izin->lampiran);
        }

        $izin->delete();

        return redirect()->route('izin.index')
            ->with('updatesuccess', 'Permohonan Izin Berhasil Dihapus');
    }
}
