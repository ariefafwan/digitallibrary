@extends('pegawai.app')

@section('pegawaibody')


<div class="container-fluid">
    <div class="row">
        <a href="{{ route('kategori.create') }}"
        class="flex items-center justify-between px-7 py-2 mb-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
        style="width: 170px; background-color: rgb(29, 58, 185);">
        <i class="fa fa-plus"></i>
        <span style="font-size: 13px;">Tambah Kategori</span>
        </a>
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $row)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $row->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('kategori.edit',$row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                            onclick="event.preventDefault();
                                                document.getElementById('kategori-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="kategori-delete-form-{{$row->id}}" action="{{ route('kategori.destroy',$row->id) }}" method="POST" style="display: none;">
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
