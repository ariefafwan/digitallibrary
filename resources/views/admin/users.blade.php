@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Roles</h1>
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form id="roles-update-form-{{$row->id}}" action="{{ route('updateroles',$row->id) }}" method="POST">
                                            @csrf
                                            <select class="form-select" name="role_id" id="role_id" aria-label="Floating label select example" required>
                                                <option selected value="{{ $row->role->id }}">{{$row->role->name}}</option>
                                                @foreach ($role as $r)
                                                <option value="{{ $r->id }}">{{$r->name}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-success ml-3"
                                            onclick="event.preventDefault();
                                                document.getElementById('roles-update-form-{{$row->id}}').submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <hr>
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                document.getElementById('user-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="user-delete-form-{{$row->id}}" action="{{ route('destroyroles',$row->id) }}" method="POST" style="display: none;">
                                            @csrf
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
