<?php

namespace App\Http\Controllers\User;

use App\Models\Izin;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $izin = Izin::all()->where('user_id',Auth::user()->id)-> where('status', 'Dikirim');
        $page = "Permohonan Izin Dikirim";
        $nippos = Auth::user()->nippos;
        if ($nippos == true) {
            return view('user.izincuti.dikirim', compact('user', 'izin', 'page', 'nippos'));
        }
        return view('user.izincuti.belum', compact('user', 'izin', 'page', 'nippos'));
        
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
        $nippos = Auth::user()->nippos;
        if ($nippos == true) {
            return view('user.izincuti.create', compact('user', 'page', 'nippos'));
        }
        return view('user.izincuti.belum', compact('user', 'page', 'nippos'));
        
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
        $dtUpload->user_id = $request->user_id;
        $dtUpload->status = $request->status;
        $dtUpload->jenis = $request->jenis;
        $dtUpload->tglawal = $request->tglawal;
        $dtUpload->tglakhir = $request->tglakhir;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->lampiran = $namaFile;

        $nm->move(public_path() . '/lampiran', $namaFile);
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

        if(file_exists(public_path('lampiran/') . $izin->lampiran)){
            unlink(public_path('lampiran/') . $izin->lampiran);
        }

        $izin->delete();

        return redirect()->route('izin.index')
            ->with('updatesuccess', 'Permohonan Izin Berhasil Dihapus');
    }
}
