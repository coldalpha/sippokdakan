@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Persetujuan Data</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/tambahDataIkan') }}" type="button"
                class="btn btn-outline-primary rounded-0 px-4 shadow">Tambah Data</a>

        </div>
    </div>
    <!--end breadcrumb-->
@endsection
