@extends('v_login.admin-layout.layout')
@section('content')
    <section class="book_section layout_padding">
        <form action="{{ Route('update', $edit->id_karyawan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form>
                            <h4>
                                EDIT<span>DATA</span>
                            </h4>
                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <label for="inputSymptoms">Foto</label>
                                    @if($edit->foto)
                                    <img src="{{ asset('storage/karyawan-img/'.$edit->foto) }}" alt="" width="100%">
                                    @else
                                    <img src="{{ asset('images/img-default.jpg') }}" class="foto-preview"width="100%">
                                    @endif
                                    <input type="file" class="form-control" name="foto" id="inputFoto">
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="hidden" name="id_karyawan">
                                    <label for="inputPatientName">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukan Nama Lengkap" value="{{ old('nama', $edit->nama) }}">
                                    <br>
                                    <label for="inputDoctorName">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control wide">
                                        <option selected=""{{ old('jenis_kelamin', $edit->jenis_kelamin) == '' ? 'selected' : '' }}>> Pilih Jenis Kelamin < </option>
                                        <option value="Laki-Laki"{{ old('jenis_kelamin', $edit->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki </option>
                                        <option value="Perempuan"{{ old('jenis_kelamin', $edit->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan </option>
                                    </select>
                                    <br>
                                    <label for="inputDomisili">Domisili</label>
                                    <select name="domisili" class="form-control nice-select" data-control="select2"
                                        id="inpDomisili">
                                        @foreach ($dk as $kota)
                                            <option value="{{ $kota->name }}"{{ old('domisili', $kota->name) == $kota->name ? 'selected' : '' }}>{{ $kota->name }}</option>
                                        @endforeach
                                    </select>
                                    <br><label for="inputPhone">Phone Number</label>
                                    <input type="text" name="hp" class="form-control"
                                        placeholder="08xx - xxxx - xxxx" value="{{ old('hp', $edit->hp) }}">
                                    <br>
                                    <label for="inputDate">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir',$edit->tanggal_lahir) }}">
                                <br>
                                <div class="btn-box">
                                    <button type="submit" class="btn btn-primary">Submit Now</button>
                                </div>
                                </div>
                                <div class="form-group col-lg-4">

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
