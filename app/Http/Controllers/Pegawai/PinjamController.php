<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Book;
use App\Models\Member;
use App\Models\Pegawai;
use Carbon\Carbon;
use App\Models\Pinjam;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Peminjaman Berjalan";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pinjam = Pinjam::paginate(10)->where('tglkembali', '>', Carbon::now())->where('status', 'Berjalan');
        return view('pegawai.book.pinjam.pinjam', compact('user', 'pinjam', 'page', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Peminjaman";
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        $pinjam = Pinjam::latest()->paginate(10);
        $member = Member::all();
        $book = Book::all()->where('stock','>', 0);
        return view('pegawai.book.pinjam.create', compact('user', 'pinjam', 'page', 'book', 'member', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $genCode = 'KP' . time() . rand(100, 999);

        $dtUpload = new Pinjam();
        $dtUpload->kode_pinjam = $genCode;
        $dtUpload->member_id = $request->member_id;
        $dtUpload->book_id = $request->book_id;
        $dtUpload->status = $request->status;
        $dtUpload->tglpinjam = $request->tglpinjam;
        $dtUpload->tglkembali = $request->tglkembali;

        $buku = Book::findOrFail($request->book_id);
        Book::where('id', $request->book_id)->update([
            'stock' => $buku->stock - 1
        ]);

        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Peminjaman Baru Berhasil ditambahkan');
        return redirect()->route('pinjam.index');
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

        $dtUpload = Pinjam::findOrFail($id);
        
        $dtUpload->status = $request->status;

        $sum = Book::findOrFail($dtUpload->book_id);
        Book::where('id', $dtUpload->book_id)->update([
            'stock' => $sum->stock + 1
        ]);

        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Peminjaman Baru Berhasil Diupdate');
        return redirect()->route('pinjam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtUpload = Pinjam::findOrFail($id);
        $dtUpload->delete();
        Alert::success('Informasi Pesan!', 'Peminjaman Buku berhasil di Hapus');
        return back();
    }
}
