@extends('index-layout.app')
@section('content')
    <div class="hero_area">
        <!-- slider section -->
        <section class="slider_section ">
            <div class="dot_design">
                <img src="images/dots.png" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Fauget <br>
                                            <span>
                                                Digital
                                            </span>
                                        </h1>
                                        <hr>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid deserunt
                                            officia aliquam, distinctio mollitia repellendus? Deserunt pariatur eum
                                            voluptates neque? Officia unde temporibus totam facere rem, dolor deserunt
                                            quidem ut.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="images/slider-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </section>
        <!-- end slider section -->
    </div>

    <!-- team section -->

    <section class="team_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Cek Data <span>Disini</span>
                </h2>
            </div>
            <div class="row">
                <div class="col">

            </div>
            <div class="col">
            <select name="nama" class="form-control wide" style="width: 100%" id="userCari">
                @foreach ($dataUser as $user)
                    <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">

        </div>
    </div>
        </div>
        </div>
        </div>
        </div>
    </section>

    <!-- end team section -->

    <!-- book section -->

    <section class="book_section layout_padding">
        <form action="{{ Route('input') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form>
                            <h4>
                                INPUT <span>DATA</span>
                            </h4>
                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <input type="hidden" name="id_karyawan">
                                    <label for="inputPatientName">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="inputDoctorName">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control wide">
                                        <option selected="select">> Pilih Jenis Kelamin < </option>
                                        <option value="Laki-Laki">Laki-Laki </option>
                                        <option value="Perempuan">Perempuan </option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="inputDomisili">Domisili</label>
                                    <select name="domisili" class="form-control nice-select" data-control="select2"
                                        id="inpDomisili">
                                        @foreach ($dataKota as $dk)
                                            <option value="{{ $dk->name }}">{{ $dk->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <label for="inputPhone">Phone Number</label>
                                    <input type="number" name="hp" class="form-control nice-select"
                                        placeholder="08xx - xxxx - xxxx">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="inputDate">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="inputSymptoms">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="inputFoto">
                                </div>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn ">Submit Now</button>
                            </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
