@extends('pemimpin.app')

@section('pemimpinbody')


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">NIPPOS</th>
                                <th class="text-center">Kantor</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Nomor Handphone</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Status Kawin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nippos }}</td>
                                <td>{{ $row->kantor }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->nmrhp }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->status_kawin }}</td>
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
