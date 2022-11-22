@extends('user.app')

@section('userbody')

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
                            <h4 class="text-right">Your Profile</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Nama</label><input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $user->name }}" readonly></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">NIPPOS</label><input type="text" name="nippos" id="nippos" class="form-control" value="{{ $user->nippos }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Kantor</label><input type="text" name="kantor" id="kantor" class="form-control" placeholder="Isi Kantor Anda" value="{{ $user->kantor }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Jabatan</label><input type="text" name="jabatan_id" id="jabatan_id" class="form-control" placeholder="enter jabatan" value="{{ $user->jabatan }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="number" name="nmrhp" id="nmrhp" class="form-control" placeholder="enter phone number" value="{{ $user->nmrhp }}" readonly></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="p-3 py-5">
                        <div class="col-md-12"><label class="labels">Status Kawin</label><input type="text" name="nippos" id="nippos" class="form-control" value="{{ $user->status_kawin }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" name="alamat" id="alamat" class="form-control" placeholder="Isi Alamat Anda" value="{{ $user->alamat }}" readonly></div>
                        <div class="btn-group mt-5 ml-3 align-items-center">
                            <a href="{{ route('edituser.edit',$user->id) }}" class="btn btn-success profile-button">Edit</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </div>

@endsection
