@extends('pegawai.app')

@section('pegawaibody')


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Kode Peminjaman</th>
                                <th class="text-center">Nama Member</th>
                                <th class="text-center">Nama Buku</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pinjam as $row)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $row->kode_pinjam }}</td>
                                <td class="text-center">{{ $row->member->name }}</td>
                                <td class="text-center">{{ $row->book->name }}</td>
                                <td class="text-center">{{ $row->tglpinjam }}</td>
                                <td class="text-center">{{ $row->tglkembali }}</td>
                                <td align="center">
                                    <div class="btn-group" >
                                        <form id="pinjam-update-form-{{$row->id}}" action="{{ route('pinjam.update',$row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="status" id="status" aria-label="Floating label select example" required>
                                                <option selected aria-required="true">{{ $row->status }}</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-success ml-3"
                                            onclick="event.preventDefault();
                                                document.getElementById('pinjam-update-form-{{$row->id}}').submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('pinjam.edit',$row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                            onclick="event.preventDefault();
                                                document.getElementById('pinjam-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="pinjam-delete-form-{{$row->id}}" action="{{ route('pinjam.destroy',$row->id) }}" method="POST" style="display: none;">
                                            @csrf 
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
