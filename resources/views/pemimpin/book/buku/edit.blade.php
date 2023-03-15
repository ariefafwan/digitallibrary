@extends('pemimpin.app')

@section('pemimpinbody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $page }}</h1>

        <form action="{{ route('book.update', $book->id) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Gambar Buku</label>
                            <input type="file" name="img" id="img" class="form-control align-item center" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nama Buku</label>
                            <input type="text" name="name" value="{{ $book->name }}" class="form-control" id="name" required>
                            <input type="hidden" name="kodebuku" value="{{ $book->kodebuku }}" class="form-control" id="kodebuku" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Kategori Buku</label>
                            <select class="form-select" id="floatingSelect" name="kategori_id" id="kategori_id" aria-label="Floating label select example" required>
                                <option selected value="{{ $book->kategori_id }}">{{ $book->kategori->name }}</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">ISBN</label>
                            <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" id="isbn" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Penulis</label>
                            <select class="form-select" id="floatingSelect" name="author_id" id="author_id" aria-label="Floating label select example" required>
                                <option selected value="{{ $book->author_id }}">{{ $book->author->name}}</option>
                                @foreach ($author as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Penerbit</label>
                            <select class="form-select" id="floatingSelect" name="penerbit_id" id="penerbit_id" aria-label="Floating label select example" required>
                                <option selected value="{{ $book->penerbit_id }}">{{ $book->penerbit->name }}</option>
                                @foreach ($penerbit as $penerbit)
                                <option value="{{ $penerbit->id }}">{{ $penerbit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Deskripsi Buku</label>
                            <textarea name="deskripsi" id="deskripsi" cols="20" rows="2" class="form-control" required>{{ $book->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Tahun Terbit</label>
                            <input type="number" name="tahunterbit" value="{{ $book->tahunterbit }}" class="form-control" id="tahunterbit" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Stok</label>
                            <input type="number" name="stock" value="{{ $book->stock }}" class="form-control" id="stock" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('book.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-warning btn-flat">Edit</button>
                </div>
            </div>

        </form>
</div>
@endsection