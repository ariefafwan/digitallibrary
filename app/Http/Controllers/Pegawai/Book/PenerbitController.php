<?php

namespace App\Http\Controllers\Pegawai\Book;

use App\Models\Pegawai;
use App\Models\Pinjam;
use App\Models\Publiser;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Penerbit";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $penerbit = Publiser::latest()->paginate(10);
        return view('pegawai.book.penerbit.penerbit', compact('user', 'penerbit', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Penerbit";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $penerbit = Publiser::latest()->paginate(10);
        return view('pegawai.book.penerbit.create', compact('user', 'penerbit', 'page', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Publiser();
        $dtUpload->name = $request->name;
        $dtUpload->email = $request->email;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Penerbit Baru Berhasil ditambahkan');
        return redirect()->route('penerbit.index');
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
        $page = "Edit Penerbit";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $penerbit = Publiser::findOrFail($id);
        return view('pegawai.book.penerbit.create', compact('user', 'penerbit', 'page', 'pegawai'));
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
        $dtUpload = Publiser::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->email = $request->email;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Penerbit Baru Berhasil Diedit');
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publiser = Publiser::findOrFail($id);
        if ($publiser::doesntHave('book')) {
            $publiser->delete();
        } else {
            $publiser->delete();
            $publiser->book()->delete();
            Pinjam::truncate(); 
        }
        Alert::success('Informasi Pesan!', 'Penerbit Berhasil dihapus!');
        return back();
    }
}
