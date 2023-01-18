@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('/kelompok') }}">Data Kelompok</i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Kelompok</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Input Data Kelompok</h5>
                </div>
                <hr>
                <form method="POST" action="/kelompok/kelompok">
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Kelompok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Kelompok">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Latar Belakang</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="latar_belakang" rows="3"
                                placeholder="Latar Belakang"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="single-select " name="kecamatan" id="kecamatan">
                                <option value="0">Pilih Kecamatan</option>
                                @foreach ($Kecamatans as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Desa</label>
                        <div class="col-sm-9">

                            <select class="single-select desa" name="desa" id="desa">
                                <option value="0" disabled selected>Pilih Desa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Jenis Ikan</label>
                        <div class="col-sm-9">
                            <select class="single-select" name="ikan" id="ikan">
                                <option value="">Pilih Ikan</option>
                                @foreach ($Ikans as $id => $nama)
                                    <option value="{{ $nama }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="kategori" id="kategori" class="single-select">
                                <option value="">Pilih Kategori</option>
                                @foreach ($Categories as $id => $nama_kategori)
                                    <option value="{{ $nama_kategori }}">{{ $nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jumlah Anggota</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah_anggota"
                                placeholder="Masukan Jumlah Anggota">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Luas Lahan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="luas_lahan" placeholder="Masukan Luas Lahan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Total Omzet</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="total_omzet" placeholder="Masukan Total Omzet">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">No. HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_hp" placeholder="Masukan Nomor HP">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Prestasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="prestasi" placeholder="Prestasi">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="foto_id">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Pilih Lokasi</label>
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" class="gmaps"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="latitude" name="latitude"
                                    placeholder="Latitude" readonly>
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                    placeholder="Longitude" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-warning" type="button">RESET</button>
                            <button class="btn btn-primary me-md-2" type="button">KIRIM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#kecamatan', function() {
                var kecamatan_id = $(this).val();
                let pilihdesa = $('#desa');
                pilihdesa.empty();
                var div = $(this).parent();
                var op = "";
                // console.log(kecamatan_id);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findDesa') !!}',
                    data: {
                        'id': kecamatan_id,
                    },
                    success: function(data) {
                        op += '<option value="0">Silahkan Pilih Desa </option>'
                        for (var index = 0; index < data.length; index++) {
                            op += '<option value="' + data[index].id + '">' + data[index]
                                .nama +
                                '</option>';
                        }
                        pilihdesa.append(op);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>
@endsection
