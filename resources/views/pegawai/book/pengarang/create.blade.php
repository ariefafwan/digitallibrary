@extends('pegawai.app')

@section('pegawaibody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $page }}</h1>

        <form action="{{ route('pengarang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Nama Pengarang</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('pengarang.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                </div>
            </div>

        </form>
</div>
@endsection