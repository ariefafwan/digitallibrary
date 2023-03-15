@extends('pemimpin.app')

@section('pemimpinbody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $page }}</h1>

        <form action="{{ route('pinjam.update',$pinjam->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Nama Member</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $pengarang->name }}" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('pinjam.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-flat">Edit</button>
                </div>
            </div>
        </form>
</div>
@endsection