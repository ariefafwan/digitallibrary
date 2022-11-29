@extends('user.app')

@section('userbody')

<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Permohonan Diterima</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Permohonan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-success">
                            <th>No.Izin</th>
                            <th>Jenis Izin</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Deskripsi</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th>Balasan Pemimpin</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="table-success">
                            <th>No.Izin</th>
                            <th>Jenis Izin</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Deskripsi</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th>Balasan Pemimpin</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($izin as $row)
                        <tr>
                            <td>{{ $row->nmrizin }}</td>
                            <td>{{ $row->jenis }}</td>
                            <td>{{ $row->tglawal }}</td>
                            <td>{{ $row->tglakhir }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>{{ $row->lampiran }}</td>
                            <th>{{ $row->status }}</th>
                            <th>{{ $row->balasan }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection