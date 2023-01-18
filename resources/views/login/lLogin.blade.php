@extends('login.layouts/template')
@section('content')
    <main class="authentication-content">
        <div class="container-fluid">
            <div class="authentication-card">
                <div class="card shadow rounded-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                            <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                @if (session()->has('statusRegister'))
                                    <div class="alert border-0 bg-light-success alert-dismissible fade show py-2"
                                        id="statusLogin">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="text-success">{{ session('statusRegister') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session()->has('statusLoginFailed'))
                                    <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="text-danger">{{ session('statusLoginFailed') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session()->has('statusLoginPending'))
                                    <div class="alert border-0 bg-light-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-3 text-warning"><i class="bi bi-x-circle-fill"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="text-warning">{{ session('statusLoginPending') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <h5 class="card-title">Login Admin</h5>
                                <p class="card-text mb-5">SIP - Kelompok Budidaya Perikanan Kabupaten
                                    Batang</p>
                                <form class="form-body" action="/login" method="POST">
                                    @csrf
                                    <div class="d-grid">
                                        <a class="btn btn-white radius-30" href="javascript:;"><span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16"
                                                    alt="">
                                                <span>Sign in with Google</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH
                                            EMAIL</span>
                                        <hr>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email
                                                Address
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
                                                    @error('email') is-invalid @enderror"
                                                    id="inputEmailAddress" placeholder="Email Address" autofocus required>
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
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                    checked="">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end"> <a href="{{ url('/forgot') }}">Forgot
                                                Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary radius-30">Sign
                                                    In</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0">Belum mempunyai akun? <a
                                                    href="{{ url('/register') }}">Daftar disini</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
@endsection
