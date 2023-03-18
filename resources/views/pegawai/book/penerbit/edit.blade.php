@extends('pegawai.app')

@section('pegawaibody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $page }}</h1>

        <form action="{{ route('penerbit.update',$penerbit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Nama Penerbit</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $pengarang->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Email Penerbit</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ $pengarang->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Alamat Penerbit</label>
                            <textarea name="alamat" id="almat" cols="20" rows="2" class="form-control" required>{{ $pengarang->alamat }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('penerbit.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-flat">Edit</button>
                </div>
            </div>
        </form>
</div>
@endsection