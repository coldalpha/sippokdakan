@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Ikan</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-outline-primary rounded-0 px-4 shadow" data-bs-toggle="modal"
                data-bs-target="#tambahKategori">Tambah Ikan</a>
            <!-- Modal -->
            <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="/ikan">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ikan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="text"
                                            class="form-control
                                        @error('nama')
                                            is-invalid
                                        @enderror"
                                            id="nama" name="nama" placeholder="Masukan Nama Ikan">
                                        @error('nama')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Isi Slug" readonly>
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <label
                                        class=" form-label
                                    @error('warna')
                                            is-invalid
                                        @enderror">
                                        Pilih Warna Untuk Icon Anda</label>
                                    <div class="px-3">
                                        <select class="form-select" id=" warna" name="warna">
                                            <option value="red">Merah</option>
                                            <option value="yellow">Kuning</option>
                                            <option value="green">Hijau</option>
                                            <option value="blue">Biru</option>
                                            <option value="purple">Ungu</option>
                                            <option value="orange">Oranye</option>
                                            <option value="pink">Pink</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Tambah Ikan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <div class="card radius-10 w-100">
        <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h5 class="mb-0">DATA IKAN</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Ikan</th>
                            <th>Ikon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ikans as $ikan)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $ikan->nama }}</h6>
                                </td>
                                <td>
                                    {{-- <h6 class="product-name mb-1">{{ $ikan->warna }}</h6> --}}
                                    <img src="http://maps.google.com/mapfiles/ms/icons/{{ $ikan->warna }}-dot.png"
                                        alt="Warna Tidak Ada">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="/ikan/{{ $ikan->slug }}/edit" class="text-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <form action="/ikan/{{ $ikan->slug }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="text-danger border-0" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete" onclick="return confirm('Yakin Hapus Data?')"><i
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
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');
        nama.addEventListener('change', function() {
            fetch('/createSlugIkan?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
@endsection
