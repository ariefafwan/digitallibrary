@extends('pemimpin.app')

@section('pemimpinbody')


<!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="container rounded bg-white mt-3 mb-1">
            <form action="{{ route('editpemimpin.update', $user->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PUT')
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/img/profil/{{ $user->profile_img }}"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span><span> </span></div>
                    <div class="col-md-12">
                        <input type="file" id="profile_img" name="profile_img" class="form-control align-item center" placeholder="first name" required>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Profile</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Nama</label><input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $user->name }}" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">NIPPOS</label><input type="text" name="nippos" id="nippos" class="form-control" value="{{ $user->nippos }}" required></div>
                            <div class="col-md-12"><label class="labels">Kantor</label><input type="text" name="kantor" id="kantor" class="form-control" placeholder="Isi Kantor Anda" value="{{ $user->kantor }}" required></div>\
                            <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="number" name="nmrhp" id="nmrhp" class="form-control" placeholder="enter phone number" value="{{ $user->nmrhp }}" required></div>
                            <div class="col-md-12"><label class="labels">Jabatan</label><input type="text" name="role_id" id="role_id" class="form-control" placeholder="enter jabatan" value="{{ $user->role->name }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Divisi</label>
                                <select class="form-select" name="divisi_id" id="divisi_id" aria-label="Floating label select example" required>
                                    <option selected aria-required="true">{{ $user->divisi->name }}</option>
                                    @foreach($divisi as $div)
                                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="p-3 py-5">
                        <div class="col-md-12"><label class="labels">Status Kawin</label>
                        <select class="form-select" id="floatingSelect" name="status_kawin" id="status_kawin" aria-label="Floating label select example" required>
                            <option selected>-- Pilih --</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                        </select></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" name="alamat" id="alamat" class="form-control" placeholder="Isi Alamat Anda" value="{{ $user->alamat }}" required></div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>

    </div>

@endsection
