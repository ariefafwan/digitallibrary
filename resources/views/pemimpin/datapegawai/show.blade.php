@extends('pemimpin.app')

@section('pemimpinbody')

<!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="container rounded bg-white mt-3 mb-1">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/img/profil/{{ $user->profile_img }}"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">{{ $user->name }} Profile</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Nama</label><input type="text" class="form-control" id="name" name="name"  value="{{ $user->name }}" readonly></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">NIPPOS</label><input type="text" name="nippos" id="nippos" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->nippos }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Kantor</label><input type="text" name="kantor" id="kantor" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->kantor }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Jabatan</label><input type="text" name="role_id" id="role_id" class="form-control" value="{{ $user->role->name }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Divisi</label><input type="text" name="divisi_id" id="divisi_id" class="form-control" value="{{ $user->divisi->name }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="number" name="nmrhp" id="nmrhp" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->nmrhp }}" readonly></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="p-3 py-5">
                        <div class="col-md-12"><label class="labels">Jenis Kelamin</label><input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->jenis_kelamin }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Status Kawin</label><input type="text" name="nippos" id="nippos" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->status_kawin }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" name="alamat" id="alamat" placeholder="Belum Di Isi Pegawai" class="form-control" value="{{ $user->alamat }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Gaji</label><input type="number" name="gaji" id="gaji" placeholder="Belum Di Isi Pegawai" class="form-control" value="{{ $user->gaji }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Mulai Bekerja</label><input type="text" name="mulai_bekerja" id="mulai_bekerja" class="form-control" placeholder="Belum Di Isi Pegawai" value="{{ $user->mulai_bekerja }}" readonly></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </div>

@endsection