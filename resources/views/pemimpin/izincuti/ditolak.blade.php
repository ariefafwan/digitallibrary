@extends('pemimpin.app')

@section('pemimpinbody')


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">No. Izin</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Kantor</th>
                                <th class="text-center">NIPPOS</th>
                                <th class="text-center">Jenis Izin</th>
                                <th class="text-center">Tanggal Mulai Izin</th>
                                <th class="text-center">Tanggal Berakhir Izin</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Lampiran</th>
                                <th class="text-center">Balasan Anda</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($izin as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $row->nmrizin }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->user->kantor }}</td>
                                <td>{{ $row->user->nippos }}</td>
                                <td>{{ $row->jenis }}</td>
                                <td>{{ $row->tglawal }}</td>
                                <td>{{ $row->tglakhir }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/lampiran/{{ $row->lampiran }}" class="btn btn-primary"><i class="fas fa-arrow-down"></i></a>
                                    </div>
                                </td>
                                <td>{{ $row->balasan }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                document.getElementById('news-delete-form-{{$row->id}}').submit();">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                        </a>
                                        <form id="news-delete-form-{{$row->id}}" action="{{ route('izinpemimpin.destroy',$row->id) }}" method="POST" style="display: none;">
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
