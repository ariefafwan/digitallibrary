@extends('user.app')

@section('userbody')

<!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="container rounded bg-white mt-3 mb-1">
            <form action="{{ route('member.update', $profile->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PUT')
                
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/storage/profil/{{ $profile->profile_img }}"><span class="text-black-50">{{ $profile->email }}</span><span> </span></div>
                    <div class="col-md-12">
                        <input type="file" id="profile_img" name="profile_img" class="form-control align-item center" placeholder="first name" required>
                        *JPG|PNG
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Profile</h4>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}" required>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Nama</label><input type="text" value="{{ $profile->name }}" name="name" id="name" class="form-control" placeholder="enter your name" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input type="date" value="{{ $profile->date_of_birth }}" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="enter phone number" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="number" value="{{ $profile->nmrhp }}" name="nmrhp" id="nmrhp" class="form-control" placeholder="enter phone number" required></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="gender" required>
                                    <option selected value="{{ $profile->gender }}">{{ $profile->gender}}</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Alamat</label> <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" required>{{ $profile->alamat }}</textarea></div>
                        </div>
                        <div class="p-3 py-5">
                            <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="submit">Save Profile</button></div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection
