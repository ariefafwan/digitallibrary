@extends('pemimpin.app')

@section('pemimpinbody')

<!-- Begin Page Content -->
<div class="container">

    <form action="{{ route('izinpemimpin.update',$izin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">

                <input type="hidden" class="form-control" id="exampleFormControlInput1" name="nmrizin"  value="{{ $izin->nmrizin }}" readonly>

                <input type="hidden" class="form-control" id="exampleFormControlInput1" value="{{ $izin->user_id }}" name="user_id" readonly>
        
        <div class="form-group">
            <label>Username</label>
                <input type="text" id="username" value="{{ $izin->user->name }}" readonly>
        </div>

        <div class="form-group">
            <label>Kantor</label>
                <input type="text" id="kantor" value="{{ $izin->user->kantor }}" readonly>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
                <input type="text" id="jabatan" value="{{ $izin->user->jabatan }}" readonly>
        </div>

        <div class="form-group">
            <label>Jenis Izin</label>
                <input type="text" id="jenis" name="jenis"  value="{{ $izin->jenis }}" readonly>
        </div>

        <div class="form-group">
            <label for="tglawal">Tanggal Mulai Cuti</label>
                <input type="date" id="tglawal" name="tglawal" min="2018-01-01" max="2030-12-31" value="{{ $izin->tglawal }}" readonly>
        </div>

        <div class="form-group">
            <label for="tglawal">Tanggal Berakhir Cuti</label>
                <input type="date" id="tglakhir" name="tglakhir" min="2018-01-01" max="2030-12-31" value="{{ $izin->tglakhir }}" readonly>
        </div>

        <div class="form-group">
            <label >Deskipsi</label>
            <input type="text" id="deskripsi" name="deskripsi" value="{{ $izin->deskripsi }}" readonly>
        </div>

        <div class="form-group">
            <label >Lampiran</label>
            <input type="text" id="lampiran" name="lampiran" value="{{ $izin->lampiran }}" readonly>
        </div>

        <div class="form-group">
            <label >Status (Silahkan Diedit)</label>
            <select class="form-control" id="status" name="status" placeholder="Status" required>
                <option selected>Dikirim</option>
                <option value="Diterima">Diterima</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        <div class="form-group">
            <label >Balasan Anda</label>
                <textarea class="form-control" id="balasan" name="balasan" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Submit
        </button>
    </form>

</div>

@endsection