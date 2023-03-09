<?php

namespace App\Http\Controllers\Pemimpin\Book;

use App\Models\Peminjaman;
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
        $penerbit = Publiser::latest()->paginate(10);
        return view('pemimpin.book.penerbit.penerbit', compact('user', 'penerbit', 'page'));
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
        $penerbit = Publiser::latest()->paginate(10);
        return view('pemimpin.book.penerbit.create', compact('user', 'penerbit', 'page'));
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
        $publisher = Publiser::findOrFail($id);
        $publisher->delete();
        $publisher->book()->delete();
        Peminjaman::truncate();
        Alert::success('Informasi Pesan!', 'Penerbit Berhasil dihapus!');
        return back();
    }
}
