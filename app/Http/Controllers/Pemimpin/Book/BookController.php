<?php

namespace App\Http\Controllers\Pemimpin\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Kategori;
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
        $book = Book::latest()->paginate(10);
        return view('pemimpin.book.buku.book', compact('user', 'book', 'page'));
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
        $kategori = Kategori::all();
        $author = Author::all();
        $penerbit = Publiser::all();
        $book = Book::latest()->paginate(10);
        return view('pemimpin.book.buku.create', compact('user', 'book', 'page', 'kategori', 'author', 'penerbit'));
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
        $dtUpload->description = $request->description;
        $dtUpload->penerbit_id = $request->penerbit_id;
        $dtUpload->stock = $request->stock;
        $dtUpload->tahunterbit = $request->tahunterbit;
        $dtUpload->author_id = $request->author_id;
        $dtUpload->isbn = $request->isbn;
        $dtUpload->img = $namaFile;
        
        $nm->move(public_path() . '/img/buku', $namaFile);
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
        //
    }
}
