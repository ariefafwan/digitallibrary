<?php

namespace App\Http\Controllers\Admin;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controller;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Permohonan Izin Cuti Masuk";
        $izin = Izin::latest()->where('status', 'Dikirim')->paginate(10);
        return view('admin.pegawai.permohonan', compact('user', 'izin', 'page'));
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

        $dtUpload = Izin::findOrFail($id);
        $dtUpload->status = $request->status;
        $dtUpload->balasan = $request->balasan;

        $dtUpload->save();


        Alert::success('Informasi Pesan!', 'Permohonan Cuti Baru Berhasil Diedit');
        return redirect()->route('cuti.index');
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

        Alert::success('Informasi Pesan!', 'Permohonan Cuti Baru Berhasil Dihapus');
        return redirect()->route('cuti.index');
    }
}
