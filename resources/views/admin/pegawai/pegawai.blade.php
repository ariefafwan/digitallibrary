@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pegawai</h1>
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Nomor Handphone</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $index => $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->nmrhp }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="{{ route('detailpegawai',$row->id) }}" class="btn btn-warning btn-flat mr-2">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>                                        
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
