<?php

namespace App\Http\Controllers\Pegawai\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Kategori;
use App\Models\Pegawai;
use Illuminate\Support\Facades\File;
use App\Models\Publiser;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Buku";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $book = Book::latest()->paginate(10);
        return view('pegawai.book.buku.book', compact('user', 'book', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Buku";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $kategori = Kategori::all();
        $author = Author::all();
        $penerbit = Publiser::all();
        $book = Book::latest()->paginate(10);
        return view('pegawai.book.buku.create', compact('user', 'book', 'page', 'kategori', 'author', 'penerbit', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->img;
        $namaFile = $nm->getClientOriginalName();
        $genCode = 'BC' . time() . rand(100, 999);
        
        $dtUpload = new Book();
        $dtUpload->name = $request->name;
        $dtUpload->kodebuku = $genCode;
        $dtUpload->kategori_id = $request->kategori_id;
        $dtUpload->author_id = $request->author_id;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->penerbit_id = $request->penerbit_id;
        $dtUpload->stock = $request->stock;
        $dtUpload->tahunterbit = $request->tahunterbit;
        $dtUpload->author_id = $request->author_id;
        $dtUpload->isbn = $request->isbn;
        $dtUpload->img = $namaFile;
        
        $nm->move(public_path() . '/storage/img', $namaFile);
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Buku Baru Berhasil ditambahkan');
        return redirect()->route('book.index');
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
        $page = "Edit Buku";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $kategori = Kategori::all();
        $author = Author::all();
        $penerbit = Publiser::all();
        $book = Book::findOrFail($id);
        return view('pegawai.book.buku.edit', compact('user', 'book', 'page', 'kategori', 'author', 'penerbit', 'pegawai'));
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
        $nm = $request->img;
        $namaFile = $nm->getClientOriginalName();
        
        $dtUpload = Book::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->kodebuku = $request->kodebuku;
        $dtUpload->kategori_id = $request->kategori_id;
        $dtUpload->author_id = $request->author_id;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->penerbit_id = $request->penerbit_id;
        $dtUpload->stock = $request->stock;
        $dtUpload->tahunterbit = $request->tahunterbit;
        $dtUpload->author_id = $request->author_id;
        $dtUpload->isbn = $request->isbn;
        $dtUpload->img = $namaFile;
        
        $nm->move(public_path() . '/storage/img', $namaFile);
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Buku Berhasil diedit');
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::findOrFail($id);
        $img = public_path('storage/img' . $data->img);
        $data->delete();
        File::delete($img);
        $data->pinjam()->delete();
        Alert::success('Informasi Pesan!', 'Buku Berhasil dihapus!');
        return back();
    }
}
