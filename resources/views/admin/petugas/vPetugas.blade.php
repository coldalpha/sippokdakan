@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Petugas</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/petugas/create') }}" type="button"
                class="btn btn-outline-primary rounded-0 px-4 shadow">Tambah
                Petugas</a>

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
    <div class="card radius-10 w-100">
        <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h5 class="mb-0">DATA USER</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $user)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $user->name }} </h6>
                                </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $user->email }}</h6>
                                </td>
                                <td>
                                    @if ($user->is_admin === 0)
                                        <h6>Nonaktif</h6>
                                    @endif
                                    @if ($user->is_admin === 1)
                                        <h6>Aktif</h6>
                                    @endif
                                    @if ($user->is_admin === 2)
                                        <h6>Pengajuan</h6>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->level === 2)
                                        <h6><span class="badge rounded-pill bg-danger">Petugas</span></h6>
                                    @endif
                                    @if ($user->level === 1)
                                        <h6><span class="badge rounded-pill bg-primary">Admin</span></h6>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ url('/petugas/' . $user->id . '/edit/') }}" class="text-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <form action="/petugas/{{ $user->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="text-danger border-0" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete" data-bs-target="#exampleDangerModal"
                                                onclick="return confirm('Yakin Hapus Data? {{ $user->id }}')"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
@endsection
