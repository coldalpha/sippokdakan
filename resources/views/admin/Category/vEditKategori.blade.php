@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('/category') }}">Data Kategori</i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Kategori</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/category') }}" class="btn btn-warning px-2 rounded-0">
                <i class="lni lni-exit"></i>KEMBALI </a>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Edit Data Kategori</h5>
                </div>

                <hr>
                <form method="POST" action="/category/{{ $categories->slug }}">
                    @method('PUT')
                    @csrf
                    {{-- Input Nama Kelompok --}}
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Ikan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukan Nama Kelompok "
                                value="{{ old('nama', $categories->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukan slug"
                                value="{{ old('slug', $categories->slug) }}" readonly>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Warna</label>
                        <div class="col-sm-9">
                            <select class="form-select" id=" warna" name="warna">
                                <option value="red" {{ $categories->warna === 'red' ? 'selected' : null }}>Merah</option>
                                <option value="yellow" {{ $categories->warna === 'yellow' ? 'selected' : null }}>Kuning</option>
                                <option value="green" {{ $categories->warna === 'green' ? 'selected' : null }} >Hijau</option>
                                <option value="blue" {{ $categories->warna === 'blue' ? 'selected' : null }} >Biru</option>
                                <option value="purple" {{ $categories->warna === 'purple' ? 'selected' : null }} >Ungu</option>
                                <option value="orange" {{ $categories->warna === 'orange' ? 'selected' : null }} >Oranye</option>
                                <option value="pink" {{ $categories->warna === 'pink' ? 'selected' : null }} >Pink</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');
        nama.addEventListener('change', function() {
            fetch('/createSlugKelompok?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
