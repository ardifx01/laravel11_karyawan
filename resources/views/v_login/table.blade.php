@extends('v_login.admin-layout.layout')
@section('content')

<div class="container margin-top" style="overflow-x: auto">
    <table class="table table-bordered table-hover dt-responsive nowrap" id="Tables">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tangga Lahir</th>
            <th>No. HP</th>
            <th>Domisili</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($dataKaryawan as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->hp }}</td>
                    <td>{{ $data->domisili }}</td>
                    <td><img src="{{ asset('storage/karyawan-img/'. $data->foto ) }}" style="height: 20px; width:20px;"></td>
                    <td>
                        <a href="{{ Route('edit',$data->id_karyawan) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                        <form action="{{ Route('delete',$data->id_karyawan) }}" method="POST">
                    @csrf
                        <button class="btn btn-danger btn-sm" type="delete" name="delete" id="show_confirm" data-confirm-delete="true"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>

@endsection
