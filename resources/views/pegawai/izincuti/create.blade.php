@extends('pegawai.app')

@section('pegawaibody')

<!-- Begin Page Content -->
<div class="container">

    <form action="{{ route('izin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

                <input type="hidden" class="form-control" id="exampleFormControlInput1" name="nmrizin" readonly>

                @foreach ($pegawai as $p)
                <input type="hidden" class="form-control" id="exampleFormControlInput1" value="{{ $p->id }}" name="pegawai_id" readonly>                    
                @endforeach

                <input type="hidden" class="form-control" name="status" value="Dikirim" readonly>
        
        <div class="form-group">
            <label>Jenis Izin</label>
                <select class="form-control" id="jenis" name="jenis" placeholder="Kategori" required>
                    <option selected>-- Pilih --</option>
                    <option value="Cuti Menikah">Cuti Menikah</option>
                    <option value="Cuti Kawin">Cuti Kawin</option>
                    <option value="Cuti Sakit">Cuti Sakit</option>
                    <option value="Cuti Meninggal">Cuti Meninggal</option>
                </select>
        </div>

        <div class="form-group">
            <label for="tglawal">Tanggal Mulai Cuti</label>
                <input type="date" id="tglawal" name="tglawal" min="2018-01-01" max="2030-12-31">
        </div>

        <div class="form-group">
            <label for="tglawal">Tanggal Berakhir Cuti</label>
                <input type="date" id="tglakhir" name="tglakhir" min="2018-01-01" max="2030-12-31">
        </div>

        <div class="form-group">
            <label >Deskipsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label >Lampiran</label>
                <input type="file" class="form-control-file" name="lampiran" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Submit
        </button>
    </form>

</div>

@endsection