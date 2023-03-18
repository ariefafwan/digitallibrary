@extends('pegawai.app')

@section('pegawaibody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $page }}</h1>

        <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Nama Member</label>
                            <select class="form-select" id="floatingSelect" name="member_id" id="member_id" aria-label="Floating label select example" required>
                                <option selected>--Piih Member--</option>
                                @foreach ($member as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Buku</label>
                            <select class="form-select" id="floatingSelect" name="book_id" id="book_id" aria-label="Floating label select example" required>
                                <option selected>--Piih Buku--</option>
                                @foreach ($book as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Tanggal Pinjam</label>
                            <input type="date" name="tglpinjam" class="form-control" id="tglpinjam" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Tanggal Pengembalian</label>
                            <input type="date" name="tglkembali" class="form-control" id="tglkembali" required>
                        </div>
                        <input type="hidden" name="status" class="form-control" value="Berjalan" id="status" required>
                        <input type="hidden" name="kode_pinjam" class="form-control" id="kode_pinjam" required>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('pinjam.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                </div>
            </div>

        </form>
</div>
@endsection