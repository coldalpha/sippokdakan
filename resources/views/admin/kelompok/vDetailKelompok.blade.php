@extends('admin.layouts/vlTemplate')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/pokdakan') }}">Data
                            Kelompok</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Kelompok </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ url('/pokdakan') }}" class="btn btn-warning px-2 rounded-0">
                <i class="lni lni-exit"></i>KEMBALI </a>

        </div>
    </div>
    <div class="card radius-10 w-100">
        <div class="ms-auto">
            <div class="col">
                @if ($pokdakan->status === 'Ditolak')
                    <button type="button" class="btn btn-danger rounded-0 ">DITOLAK</button>
                @endif
                @if ($pokdakan->status === 'Disetujui')
                    <button type="button" class="btn btn-success rounded-0">DISETUJUI</button>
                @endif
                @if ($pokdakan->status === 'Pengajuan')
                    <button type="button" class="btn btn-warning rounded-0">PENGAJUAN</button>
                @endif


            </div>
        </div>
        <div class="card-header bg-transparent">
            <div class="d-flex align-items-center">
                <div class="card-body">

                    <div class="card-title">
                        <h5 class="text-center">{{ $pokdakan->nama }} </h5>
                        <p class="text-center">Oleh :{{ $pokdakan->petugas->name }} </p>

                    </div>
                    <hr>
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Latar Belakang</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#dangerprofile" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Photo</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#dangercontact" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='fadeIn animated bx bx-phone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Kontak</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#dangerlokasi" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bi bi-pin-map-fill font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Lokasi</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="dangerhome" role="tabpanel">
                            {{-- <div class="row mb-3 justify-content-center">
                                <div class="col-md-10 text-center">
                                    {{ $pokdakan->category->nama }} / {{ $pokdakan->ikan->nama }}
                                </div>
                            </div> --}}
                            <div class="row mb-3 justify-content-center ">
                                <div class="col-md-10">
                                    {!! $pokdakan->latar_belakang !!}
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <label class="ml-1">Ikan</label>
                                <ul class="mx-4">
                                    @foreach ($ikans as $ikan)
                                            <li>{!! $ikan->nama !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="d-flex justify-content-start">
                                <label>Kategori</label>
                                <ul>
                                    @foreach ($kategoris as $kategori)
                                                <li>{!! $kategori->nama !!}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="d-flex justify-content-start">
                                <label>Prestasi</label>

                                    {!! $pokdakan->prestasi !!}

                            </div>
                        </div>
                        <div class="tab-pane fade" id="dangerprofile" role="tabpanel">
                            <div class="row mb-3">
                                @if ($pokdakan->photo)
                                    <div style="max-height:600px; overflow:hidden">
                                        <img src="{{ asset('storage/' . $pokdakan->photo) }}"
                                            class="img-fluid mx-auto d-block" alt="source {{ $pokdakan->photo }}">
                                    </div>
                                @else
                                    <img src="https://cms-assets.tutsplus.com/cdn-cgi/image/width=850/uploads/users/108/posts/30561/final_image/how-to-draw-pokemon-final.png"
                                        class="img-fluid" alt="Ini Gambar Pokdakan">
                                @endif

                            </div>
                        </div>
                        <div class="tab-pane fade" id="dangercontact" role="tabpanel">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                    class="rounded-circle p-1 border" width="90" height="90" alt="...">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0">Petugas</h5>
                                    <p class="mb-0">{{ $pokdakan->petugas->name }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="http://cdn.onlinewebfonts.com/svg/img_358140.png"
                                    class="rounded-circle p-1 border" width="90" height="90" alt="...">

                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0">Email</h5>
                                    <a href="mailto:{{ $pokdakan->email }}">{{ $pokdakan->email }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="https://w7.pngwing.com/pngs/672/164/png-transparent-whatsapp-icon-whatsapp-logo-computer-icons-zubees-halal-foods-whatsapp-text-circle-unified-payments-interface-thumbnail.png"
                                    class="rounded-circle p-1 border" width="90" height="90" alt="...">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0">Nomor Handphone</h5>
                                    <p class="mb-0"><a
                                            href="https://api.whatsapp.com/send?phone={{ $pokdakan->no_hp }}">{{ $pokdakan->no_hp }}</a>
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="dangerlokasi" role="tabpanel">
                            <div class="row mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="map" class="gmaps"></div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                        id="latitude" name="latitude" placeholder="Latitude" readonly
                                        value="{{ $pokdakan->latitude }}" required>

                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                        id="longitude" name="longitude" placeholder="Longitude" readonly
                                        value="{{ $pokdakan->longitude }}" required>
                                    @error('latitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('longitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-3 row-cols-xxl-3">

        <div class="col">
            <div class="card radius-10 bg-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Anggota</p>
                            <h4 class="mb-0 text-white">{{ $pokdakan->jumlah_anggota }}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Luas Lahan</p>
                            <h4 class="mb-0 text-white">
                                {{ number_format($pokdakan->luas_lahan, 0, ',', '.') }} m<sup>2</sup></h4>
                        </div>
                        <div class="ms-auto fs-2 text-white">
                            <i class="bi bi-cup"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Total Omzet</p>

                            <h4 class="mb-0 text-white">Rp. {{ number_format($pokdakan->total_omzet, 2, ',', '.') }}
                            </h4>
                        </div>
                        <div class="ms-auto fs-2 text-white">
                            <i class="bi bi-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <script src="{{ asset('/assets/plugins/gmaps/map-detail.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function initMap() {
            const uluru = {
                lat: Number(<?php echo json_encode($pokdakan->latitude); ?>),
                lng: Number(<?php echo json_encode($pokdakan->longitude); ?>)
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: uluru,
            });
            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h3 id="firstHeading" class="firstHeading">{{ $pokdakan->nama }}</h3>' +
                '<div id="bodyContent">' +
                '</p><p>Oleh : {{ $pokdakan->petugas->name }}' +
                '</p><p> Kunjungi ? <a href="http://maps.google.com/maps?q={{ $pokdakan->latitude }},{{ $pokdakan->longitude }}" target="_blank">' +
                "Klik Disini</a></p>" +
                "</div>" +
                "</div>";
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            const marker = new google.maps.Marker({
                position: uluru,
                map,
                title: "Uluru (Ayers Rock)",
            });

            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }
    </script>
@endsection
