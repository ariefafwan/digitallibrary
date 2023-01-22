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
                                <th class="text-center">Divisi</th>
                                <th class="text-center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $index => $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nippos }}</td>
                                <td>{{ $row->kantor }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form id="jabatan-update-form-{{$row->id}}" action="{{ route('editdivisi.update',$row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')                                            
                                            <select class="form-select" name="divisi_id" id="divisi_id" aria-label="Floating label select example" required>
                                                <option selected aria-required="true">{{ $row->divisi->name }}</option>
                                                    @foreach($divisi as $div)
                                                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                                                    @endforeach
                                            </select>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-success ml-3"
                                            onclick="event.preventDefault();
                                                document.getElementById('jabatan-update-form-{{$row->id}}').submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </div>    
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {{-- <a href="" class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a> --}}
                                        <a href="{{ route('editdivisi.show',$row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <hr>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                            onclick="event.preventDefault();
                                                document.getElementById('user-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="user-delete-form-{{$row->id}}" action="{{ route('editdivisi.destroy',$row->id) }}" method="POST" style="display: none;">
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
