@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail User</li>
                </ol>
            </nav>
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
    @if (session()->has('gagalUpdate'))
        <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2" id="statusLogin">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger">{{ session('gagalUpdate') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card border p-3 bg-light" style="background-color: white">
        <div class="row card-body bg-light">
            <form action="/user/{{ auth()->user()->username }}" method="POST" class="row align-items-center mx-auto"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <h4>My Account</h4>
                <hr>
                <div class="row mx-auto card-body bg-light">
                    <div class="col-3">
                        <div class="profile-pic mt-2">
                            <label class="-label" for="avatar">
                                <span class="glyphicon glyphicon-camera"></span>
                                <span>Change Image</span>
                            </label>
                            <input type="hidden" name="oldAvatar" value="{{ auth()->user()->avatar }}">
                            <input type="hidden" name="compressed" id="compressed">
                            <input type="file" class="form-control  @error('avatar') is-invalid @enderror" id="avatar"
                                name="avatar" value="{{ old('avatar', auth()->user()->avatar) }}" accept="image/*"
                                onchange="handleImageUpload(event);">
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if (auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" id="output" width="200" />
                            @else
                                <img id="output" width="200" />
                            @endif
                        </div>
                        <div class="text-center my-2">
                            <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                            <p class="mb-0 text-secondary">
                                @if (auth()->user()->level === 1)
                                    <span class="badge rounded-pill bg-primary">Admin</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Petugas</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="mt-3">
                            <h6 class="mb-1">
                                @if (auth()->user()->level === 1)
                                    ADMINISTRATOR
                                @else
                                    PETUGAS
                                @endif
                                POKDAKAN
                            </h6>
                            <p class="mb-0 text-secondary">DINAS KELAUTAN PERIKANAN dan PETERNAKAN KABUPATEN BATANG</p>
                        </div>
                        <ul class="list-group list-group-flush mt-2">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                Jumlah Postingan
                                <span class="badge bg-primary rounded-pill">{{ $total_post }}</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                Menunggu
                                <span class="badge bg-warning rounded-pill">{{ $Pengajuan }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                Disetujui
                                <span class="badge bg-success rounded-pill">{{ $Disetujui }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                Ditolak
                                <span class="badge bg-danger rounded-pill">{{ $Ditolak }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label m-2">Username</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->username }}" readonly
                                required name="username" id="username">
                        </div>
                        <div class="col-6">
                            <label class="form-label m-2">Email address</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->email }}" name="email"
                                id="email">
                        </div>
                        <div class="col">
                            <label class="form-label m-2">Nama</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name"
                                id="name">
                        </div>
                    </div>

                    <br>
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                            </div>
                            <div class="col-sm">
                                <h6>Ingin Ubah Password?<span class="badge bg-primary rounded-pill"><a
                                            class="text-white"
                                            href={{ url('/user/changepassword') }}>KlikMe</a></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/browser-image-compression@1.0.17/dist/browser-image-compression.js"></script>
    <script>
        async function handleImageUpload(event) {
            var avatar = document.getElementById("output");
            var avatar1 = document.getElementById("output1");
            avatar.src = URL.createObjectURL(event.target.files[0]);
            avatar1.src = URL.createObjectURL(event.target.files[0]);
        }
        var loadFile = function(event) {

        };

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
@endsection
