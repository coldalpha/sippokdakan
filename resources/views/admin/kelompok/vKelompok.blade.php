@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kelompok</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/pokdakan/create') }}" type="button"
                class="btn btn-outline-primary rounded-0 px-4 shadow">Tambah Data</a>
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
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Data Kelompok</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-bordered" id="example" style="width: 100%">
                    <thead class="table-light mt-3">
                        <tr class="mt-3">
                            <th>No</th>
                            <th>Nama Kelompok</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="mt-3">
                        @foreach ($pokdakans as $pokdakan)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $pokdakan->nama }}</h6>
                                </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $pokdakan->petugas->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $pokdakan->updated_at->diffForHumans() }}</h6>
                                    {{-- <h6 class="product-name mb-1">{{ $pokdakan->ikan->nama }}</h6> --}}
                                </td>
                                <td>
                                    @if ($pokdakan->status === 'Disetujui')
                                        <span class="badge rounded-pill alert-success">{{ $pokdakan->status }}</span>
                                    @elseif ($pokdakan->status === 'Ditolak')
                                        <span class="badge rounded-pill alert-danger">{{ $pokdakan->status }}</span>
                                    @else
                                        <span class="badge rounded-pill alert-warning">{{ $pokdakan->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @if (auth()->user()->level === 1)
                                            @if ($pokdakan->status === 'Pengajuan')
                                                <a href="/pokdakan/setujui/{{ $pokdakan->slug }}" class="text-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Setujui" aria-label="setujui"><i
                                                        class="fadeIn animated bx bx-check-circle text-success"></i></a>
                                                <a href="/pokdakan/tolak/{{ $pokdakan->slug }}" class="text-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Tolak" aria-label="tolak"><i
                                                        class="fadeIn animated bx bx-x-circle text-danger"></i></a>
                                                <a href="/pokdakan/{{ $pokdakan->slug }}" class="text-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="/pokdakan/{{ $pokdakan->slug }}/edit" class="text-warning"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @elseif ($pokdakan->status === 'Ditolak')
                                                <form action="/pokdakan/{{ $pokdakan->slug }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="text-danger border-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                        aria-label="Delete" data-bs-target="#exampleDangerModal"
                                                        onclick="return confirm('Yakin Hapus Data?')"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                                <a href="/pokdakan/{{ $pokdakan->slug }}" class="text-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                            @else
                                                <a href="/pokdakan/{{ $pokdakan->slug }}" class="text-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="/pokdakan/{{ $pokdakan->slug }}/edit" class="text-warning"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <form action="/pokdakan/{{ $pokdakan->slug }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="text-danger border-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                        aria-label="Delete" data-bs-target="#exampleDangerModal"
                                                        onclick="return confirm('Yakin Hapus Data?')"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="/pokdakan/{{ $pokdakan->slug }}" class="text-primary"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a href="/pokdakan/{{ $pokdakan->slug }}/edit" class="text-warning"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Edit info" aria-label="Edit"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            <form action="/pokdakan/{{ $pokdakan->slug }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="text-danger border-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete" data-bs-target="#exampleDangerModal"
                                                    onclick="return confirm('Yakin Hapus Data?')"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card radius-10 w-100">
        <div class="card-header bg-transparent">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Import Data Kelompok POKDAKAN</h5>
                <form class="ms-auto position-relative" action="/kelompok">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-bordered" id="example2" style="width: 100%">
                    <thead class="table-light mt-3">
                        <tr class="mt-3">
                            <th>No</th>
                            <th>Nama Kelompok</th>
                            <th>Petugas</th>
                            {{-- <th>Desa / Kecamatan</th> --}}
                            <th>Tanggal</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="mt-3">
                        <?php
                        $no = 0;
                        ?>
                        @foreach ($pokdakanss as $kelompok)
                            <tr>
                                <?php
                                $no++;
                                ?>
                                <td>{{ $no }} </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $kelompok->nama }}</h6>
                                </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $kelompok->petugas->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="product-name mb-1">{{ $kelompok->created_at->diffForHumans() }}</h6>
                                </td>
                                <td>
                                    @if ($kelompok->status === 'Disetujui')
                                        <span class="badge rounded-pill alert-success">{{ $kelompok->status }}</span>
                                    @elseif ($kelompok->status === 'Ditolak')
                                        <span class="badge rounded-pill alert-danger">{{ $kelompok->status }}</span>
                                    @else
                                        <span class="badge rounded-pill alert-warning">{{ $kelompok->status }}</span>
                                    @endif
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
        }, 4000);
    </script>
@endsection
