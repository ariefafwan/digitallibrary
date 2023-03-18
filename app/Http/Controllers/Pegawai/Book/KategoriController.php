<?php

namespace App\Http\Controllers\Pegawai\Book;

use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Pinjam;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Kategori Buku";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $kategori = Kategori::latest()->paginate(10);
        return view('pegawai.book.kategori.kategori', compact('user', 'kategori', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Kategori";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $kategori = Kategori::latest()->paginate(10);
        return view('pegawai.book.kategori.create', compact('user', 'kategori', 'page', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Kategori();
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kategori Baru Berhasil ditambahkan');
        return redirect()->route('kategori.index');
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
        $page = "Edit Kategori Buku";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $kategori = Kategori::findOrFail($id);
        return view('pegawai.book.kategori.edit', compact('user', 'kategori', 'page', 'pegawai'));
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
        $dtUpload = Kategori::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kategori Baru Berhasil ditambahkan');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        if ($category::doesntHave('book')) {
            $category->delete();
        } else {
            $category->delete();
            $category->book()->delete();
            Pinjam::truncate(); 
        }
        Alert::success('Informasi Pesan!', 'Kategori Berhasil dihapus!');
        return back();
    }
}
