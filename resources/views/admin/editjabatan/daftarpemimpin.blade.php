@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pemimpin</h1>
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">NIPPOS</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Nomor Handphone</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $index => $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->nippos }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form id="jabatan-update-form-{{$row->id}}" action="{{ route('daftarpemimpin.update',$row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')                                            
                                            <select class="form-select" name="role_id" id="role_id" aria-label="Floating label select example" required>
                                                <option selected>{{$row->role->name}}</option>
                                                <option value="2">Pemimpin</option>
                                                <option value="3">Pegawai</option>
                                            </select>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-success ml-3"
                                            onclick="event.preventDefault();
                                                document.getElementById('jabatan-update-form-{{$row->id}}').submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $row->nmrhp }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="{{ route('daftarpemimpin.show',$row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <hr>
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                document.getElementById('pegawai-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="pegawai-delete-form-{{$row->id}}" action="{{ route('daftarpegawai.destroy',$row->id) }}" method="POST" style="display: none;">
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
