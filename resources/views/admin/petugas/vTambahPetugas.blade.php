@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('/petugas') }}">Petugas</i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Petugas</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/petugas') }}" class="btn btn-warning px-2 rounded-0">
                <i class="lni lni-exit"></i>KEMBALI </a>
        </div>
    </div>
    <!--end breadcrumb-->
    @if (session()->has('suksesInput'))
        <div class="alert border-0 bg-light-success alert-dismissible fade show py-2" id="statusLogin">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-success">{{ session('suksesInput') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Input Data Petugas</h5>
                </div>

                <hr>
                <form class="form-body" action="/petugas" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 ">
                            <label for="inputName" class="form-label">Name
                                @error('name')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>

                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                        class="bi bi-person-circle"></i></div>
                                <input type="text" id="name" name="name"
                                    class="form-control radius-30 ps-5
                                                @error('name') is-invalid @enderror"
                                    id="inputName" placeholder="Enter Name" required value="{{ old('nama') }}">
                            </div>


                        </div>
                        <div class="col-12 ">
                            <label for="inputName" class="form-label">Username
                                @error('username')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                        class="bx bx-user"></i></div>
                                <input type="text" id="username" name="username"
                                    class="form-control radius-30 ps-5
                                                    @error('name') is-invalid @enderror"
                                    id="inputName" placeholder="Enter Username" required value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address
                                @error('email')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                    class="form-control radius-30 ps-5
                                                    @error('name') is-invalid @enderror"
                                    id="inputEmailAddress" placeholder="Email Address" required
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Level Petugas
                                @error('level')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>
                            <div class="ms-auto position-relative">
                                <select name="level" id="level" class="single-select">
                                    <option value="2">petugas</option>
                                    <option value="1">admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter
                                Password
                                @error('password')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="form-control radius-30 ps-5
                                                    @error('password') is-invalid @enderror"
                                    id="inputChoosePassword" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <input type="hidden" id="is_admin" name="is_admin" value="1">
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary radius-30">Daftarkan</button>
                            </div>
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
