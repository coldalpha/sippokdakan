@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('/pokdakan') }}">Data Kelompok</i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Kelompok</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/pokdakan') }}" class="btn btn-warning px-2 rounded-0">
                <i class="lni lni-exit"></i>KEMBALI </a>
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
                <form method="POST" action="/pokdakan" enctype="multipart/form-data">
                    @csrf
                    {{-- Input Nama Kelompok --}}
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Kelompok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukan Nama Kelompok " value="{{ old('nama') }}" required>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukan slug"
                                readonly {{ old('slug') }} hidden>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Latar Belakang --}}
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Latar
                            Belakang</label>

                        <div class="col-sm-9">
                            <input id="latar_belakang" name="latar_belakang" type="hidden"
                                value="{{ old('latar_belakang') }}" required>
                            <trix-editor input="latar_belakang"></trix-editor>
                            @error('latar_belakang')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    {{-- Input Alamat --}}
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                rows="3" placeholder="Masukan Alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Kecamatan --}}
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="single-select " name="kecamatan_id" id="kecamatan_id">
                                <option value="0">Pilih Kecamatan</option>
                                @foreach ($Kecamatans as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Input Desa --}}
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Desa</label>
                        <div class="col-sm-9">

                            <select class="single-select desa" name="desa_id" id="desa_id">
                                <option value="0" disabled selected>Pilih Desa</option>
                            </select>
                        </div>
                    </div>
                    {{-- Input Jenis Ikan --}}
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Jenis Ikan</label>
                        <div class="col-sm-9">
                            {{-- <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple"  name="ikan_id[]" id="ikan_id"> --}}
                            <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple"  name="ikan_id[]" id="ikan_id">
                                @foreach ($Ikans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                            {{-- <select class="single-select" name="ikan_id" id="ikan_id">
                                <option value="">Pilih Ikan</option>
                                @foreach ($Ikans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>

                    {{-- Input Kategori --}}
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple"  name="category_id[]" id="category_id">
                               @foreach ($Categories as $id => $nama_kategori)
                                    <option value="{{ $id }}">{{ $nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Input Jumlah Anggota --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jumlah Anggota</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('jumlah_anggota') is-invalid @enderror"
                                id="jumlah_anggota" name="jumlah_anggota" placeholder="Masukan Jumlah Anggota"
                                value="{{ old('jumlah_anggota') }}" required>
                            @error('jumlah_anggota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Luas Lahan --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Luas Lahan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('luas_lahan') is-invalid @enderror"
                                id="luas_lahan" name="luas_lahan" placeholder="Masukan Luas Lahan"
                                value="{{ old('luas_lahan') }}" required>
                            @error('luas_lahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Total Omzet --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label ">Total Omzet</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control  @error('total_omzet') is-invalid @enderror"
                                id="total_omzet" name="total_omzet" placeholder="Masukan Total Omzet"
                                value="{{ old('total_omzet') }}" required>
                            @error('total_omzet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Nomor HP --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">No. HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" placeholder="Masukan Nomor HP" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Email --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Prestasi --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Prestasi</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control @error('prestasi') is-invalid @enderror" id="prestasi"
                                name="prestasi" placeholder="Prestasi" value="{{ old('prestasi') }}" required>
                                <trix-editor input="prestasi"></trix-editor>
                            @error('prestasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Input Gambar --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-9">
                            <img class="photo-Preview img-fluid col-sm-5 mb-3">
                            <input type="file" class="form-control  @error('photo') is-invalid @enderror" id="photo"
                                name="photo" required onchange="previewPhoto()">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Lokasi --}}
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Pilih Lokasi</label>
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" class="gmaps"></div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                    id="latitude" name="latitude" placeholder="Latitude" readonly
                                    value="{{ old('latitude') }}" required>

                                <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                    id="longitude" name="longitude" placeholder="Longitude" readonly
                                    value="{{ old('longitude') }}" required>
                                @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <button class="btn btn-primary me-md-2" type="submit">KIRIM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/plugins/gmaps/map-custom-script.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');
        nama.addEventListener('change', function() {
            fetch('/createSlugKelompok?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
        $(document).ready(function() {
            $(document).on('change', '#kecamatan_id', function() {
                var kecamatan_id = $(this).val();
                let pilihdesa = $('#desa_id');
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

        function previewPhoto() {
            const photo = document.querySelector('#photo');
            const viewPhoto = document.querySelector('.photo-Preview');

            viewPhoto.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(photo.files[0]);
            oFReader.onload = function(oFREvent) {
                viewPhoto.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
