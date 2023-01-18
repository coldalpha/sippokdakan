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
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->username }}"
                                        readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Email address</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="col">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">UBAH PASSWORD</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" value="">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" value="" id="password_baru">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" value="" id="password_confirm" onkeyup="Konfirmasi()">
                                    <label id="pesan"></label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-start">
                        <button type="button" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-pic">
                        <label class="-label" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>Change Image</span>
                        </label>
                        <input id="file" type="file" onchange="loadFile(event)" />
                        <img src="{{ asset('/assets/images/avatars/avatar-1.png') }}" id="output" width="200" />
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                        <p class="mb-0 text-secondary">
                            @if (auth()->user()->level === 1)
                                <span class="badge rounded-pill bg-primary">Admin</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Petugas</span>
                            @endif
                        </p>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">PETUGAS POKDAKAN</h6>
                        <p class="mb-0 text-secondary">DINAS KELAUTAN PERIKANAN dan PETERNAKAN KABUPATEN BATANG</p>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                        Jumlah Postingan
                        <span class="badge bg-primary rounded-pill">{{ $total_post }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
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
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        function Konfirmasi() {
            var p = document.getElementById("password_baru").value;
            var c = document.getElementById("password_confirm").value;
            var m = document.getElementById("pesan");
            if(c === p){
            document.getElementById("pesan").innerHTML = "Password Sama";
            }else{
            document.getElementById("pesan").innerHTML = "Password Berbeda";
            } 
            
        }
    </script>
@endsection
