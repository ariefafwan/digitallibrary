@extends('pegawai.app')

@section('pegawaibody')

<!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="container rounded bg-white mt-3 mb-1">
            <div class="row">
                <div class="col-md-6 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-right">Member Profile</h4>
                        </div>
                        <img class="rounded-circle" width="150px" src="/storage/profil/{{ $pinjam->member->profile_img }}">
                        <span class="font-weight-bold mt-1">{{ $pinjam->member->name }}</span>
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                            <div class="col-md-12">
                                <label for="">Nomor Handphone</label>
                                <input type="text" name="tb" id="tb" class="form-control" value="{{ $pinjam->member->nmrhp }}" readonly>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="tb" id="tb" class="form-control" value="{{ $pinjam->member->gender }}" readonly>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $pinjam->member->date_of_birth }}" readonly>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" readonly>{{ $pinjam->member->alamat }}</textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Buku Yang Di Pinjam</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" readonly>{{ $pinjam->book->name }}</textarea>
                            </div>
                    </div>
                    <div class="btn-group align-items-center d-flex flex-column">
                        <a href="{{ route('denda') }}" class="btn btn-danger profile-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </div>

@endsection
