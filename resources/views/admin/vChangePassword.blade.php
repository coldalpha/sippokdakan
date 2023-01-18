@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/user') }}">Detail User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href={{ url('/user') }} class="btn btn-danger px-3 rounded-0 text-white"><i
                        class="lni lni-cross-circle"></i> BATAL</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
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
    <div class="container-fluid border p-3" style="background-color: white">
        <div class="row">
            <form action="{{ route('user.password.update') }}" method="POST" class="row align-items-center mx-auto">
                @method('patch')
                @csrf
                <h5 class="mb-3">Ubah Password</h5>
                <hr>
                <div class="row mt-0">
                    {{-- PASSWORD LAMA --------------------PASSWORD LAMA-----------------------PASSWORD LAMA---- --}}
                    <div class="col-12 mb-2">
                        <label class="form-label m-2">Password</label>
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                            required autocomplete="current_password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- PASSWORD BARU ---------------------PASSWORD BARU--------------------PASSWORD BARU----- --}}
                    <div class="col-6">
                        <label class="form-label m-2">Password Baru</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- PASSWORD Konfirmasi ----------------PASSWORD Konfirmasi------------PASSWORD Konfirmasi- --}}
                    <div class="col-6">
                        <label class="form-label m-2">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" onkeyup="Konfirmasi()">
                        <label id="pesan"> </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary px-5 radius-30">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function Konfirmasi() {
            var password = document.getElementById("password_baru").value;
            var confirm = document.getElementById("password_confirm").value;
            var message = document.getElementById("pesan");
            if (confirm === password) {
                document.getElementById("pesan").innerHTML = "Password Sama ";

            } else {
                document.getElementById("pesan").innerHTML = "Password Berbeda";
            }

        }
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
@endsection
