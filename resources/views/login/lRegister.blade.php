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
                                <h5 class="card-title">Daftar Admin</h5>
                                <p class="card-text mb-3">SIP - Kelompok Budidaya Perikanan Kabupaten Batang</p>
                                <form class="form-body" action="/register" method="POST">
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
                                                    id="inputName" placeholder="Enter Name" required
                                                    value="{{ old('nama') }}">
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
                                                    id="inputName" placeholder="Enter Username" required
                                                    value="{{ old('username') }}">
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
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to
                                                    the
                                                    Trems & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary radius-30">Sign in</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0">Sudah mempunyai akun? <a
                                                    href="{{ url('/login') }}">Masuk Disini</a></p>
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

@endsection
