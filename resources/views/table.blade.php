@extends('index-layout.app')
@section('content')
<div class="container margin-top">
<table class="table table-hover display" id="myTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tangga Lahir</th>
        <th>No. HP</th>
        <th>Domisili</th>
        <th>Foto</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataUser as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->hp }}</td>
                <td>{{ $data->domisili }}</td>
                <td><img src="{{ asset('storage/karyawan-img/'. $data->foto ) }}" style="height: 20px; width:20px;"></td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>


@endsection
