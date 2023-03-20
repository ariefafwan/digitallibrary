@extends('admin.app')

@section('body')


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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $row)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $row->kode_pinjam }}</td>
                                <td class="text-center">{{ $row->member->name }}</td>
                                <td class="text-center">{{ $row->book->name }}</td>
                                <td class="text-center">{{ $row->tglpinjam }}</td>
                                <td class="text-center">{{ $row->tglkembali }}</td>
                                <td class="text-center">{{ $row->status }}</td>
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
