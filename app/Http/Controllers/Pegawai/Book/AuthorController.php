<?php

namespace App\Http\Controllers\Pegawai\Book;

use App\Models\Author;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Pinjam;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Pengarang";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pengarang = Author::latest()->paginate(10);
        return view('pegawai.book.pengarang.pengarang', compact('user', 'pengarang', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Pengarang";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pengarang = Author::latest()->paginate(10);
        return view('pegawai.book.pengarang.create', compact('user', 'pengarang', 'page', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Author();
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Pengarang Baru Berhasil ditambahkan');
        return redirect()->route('pengarang.index');
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
        $page = "Edit Pengarang";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pengarang = Author::findOrFail($id);
        return view('pegawai.book.pengarang.edit', compact('user', 'pengarang', 'page', 'pegawai'));
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
        $dtUpload = Author::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Pengarang Baru Berhasil ditambahkan');
        return redirect()->route('pengarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        if ($author::doesntHave('book')) {
            $author->delete();
        } else {
            $author->delete();
            $author->book()->delete();
            Pinjam::truncate(); 
        }
        Alert::success('Informasi Pesan!', 'Author Berhasil dihapus!');
        return back();
    }
}
