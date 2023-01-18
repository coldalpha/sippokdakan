@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
    <section class="bg-primary py-9 py-lg-10">
        <div class="container my-9 my-lg-10">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="h1">{{ $Datas->nama }}</h2>
                    {{-- <p class="mb-7">Petugas : {{ $Datas->user->name }}</p> --}}
                    <a href="/Data/Petugas/{{ $Datas->petugas->username }}"
                        class="btn btn-sm btn-soft-white m-1 px-4 active"
                        data-filter=".branding">{{ $Datas->petugas->name }}</a>
                        @foreach ($ikans as $ikan)
                            <a href="/Data/Ikan/{{ $ikan->nama }}" class="btn btn-sm btn-soft-white m-1 px-4 active"
                        data-filter=".branding">{{ $ikan->nama }}</a>
                        @endforeach
                    {{-- <a href="/Data/Kategori/{{ $Datas->category->slug }}" class="btn btn-sm btn-soft-white m-1 px-4 active"
                        data-filter=".branding">{{ $Datas->category->nama }}</a> --}}
                    {{-- <a href="/Data/Ikan/{{ $Datas->ikan->slug }}" class="btn btn-sm btn-soft-white m-1 px-4 active"
                        data-filter=".branding">{{ $Datas->ikan->nama }}</a> --}}
                        @foreach ($kategoris as $kategori)
                            <a href="/Data/Kategori/{{ $kategori->slug }}" class="btn btn-sm btn-soft-white m-1 px-4 active"
                        data-filter=".branding">{{ $kategori->nama }}</a>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="shape-advanced shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 20" class="fill-white" preserveAspectRatio="none">
                <path d="M 0 0 C 200 20 400 18 500 18 C 600 18 800 20 1000 0 L 1000 20 L 0 20 L 0 0 Z" />
            </svg>
        </div>
    </section>
    <!-- Website Content -->
    <div class="website-content mt-n8 mt-lg-n10">
        <div class="website-content-inner pb-8 pb-lg-10">
            <div class="website-content-box">
                <div class="website-content-box-inner py-6 py-lg-8 py-xl-10">

                    <div class="container-fluid px-6 px-lg-8 px-xl-10">
                        <div class="row mb-8">
                            <div class="col-lg-10 mx-auto">
                                <h2 class="text-center mb-4">Tentang Kelompok</h2>
                                <div class="text-justify">
                                    {!! $Datas->latar_belakang !!}
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b class="mr-8">Prestasi</b>  {!! $Datas->prestasi !!}
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b>Jenis Ikan</b>
                                    <ul class="mx-6">
                                        @foreach ($ikans as $ikan)
                                                <li>{!! $ikan->nama !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b>Jenis Kategori</b>
                                    <ul>
                                        @foreach ($kategoris as $kategori)
                                                    <li>{!! $kategori->nama !!}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            {{-- <div class="d-flex justify-content-start">
                                <label>Prestasi</label>

                                    {!! $pokdakan->prestasi !!}

                            </div> --}}
                                <figure>
                                    <div style="max-height:400px; overflow:hidden">
                                        <img src="{{ asset('storage/' . $Datas->photo) }}"
                                            class="img-fluid  mx-auto d-block" alt="">
                                    </div>
                                    <figcaption class="text-center">
                                        Dokumentsi Kelompok Budidaya
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <hr class="my-3" />
                        <h2 class="text-center mb-8">Info Umum</h2>
                        <div class="row mb-8">
                            <div class="col">
                                <div class="card radius-10 bg-success">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-1 text-white"><i class="bi bi-person-plus-fill"></i> Anggota
                                                </p>
                                                <h4 class="mb-0 text-white">{{ $Datas->jumlah_anggota }}</h4>
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
                                                <p class="mb-1 text-white"><i class="bi bi-cup"></i> Luas Lahan</p>
                                                <h4 class="mb-0 text-white">
                                                    {{ number_format($Datas->luas_lahan, 0, ',', '.') }} m<sup>2</sup>
                                                </h4>
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
                                                <p class="mb-1 text-white"> <i class="bi bi-wallet"></i> Total Omzet</p>

                                                <h4 class="mb-0 text-white">Rp.
                                                    {{ number_format($Datas->total_omzet, 2, ',', '.') }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3" />
                        <div class="row mb-3">
                            <section id="maps" class="pt-0 pt-lg-0 pt-xl-5 pb-0">
                                <div class="container-fluid px-6 px-lg-8 px-xl-10">
                                    <div class="row mb-3">
                                        <div class="col-lg-10 mx-auto text-center">
                                            <h2 class=" mb-4">Lokasi & Kontak</h2>
                                            <p class="mb-4">Ingin menuju lokasi ? Klik titik yang ada di Maps,
                                                lalu anda akan diarahkan ke Google Masp untuk Rute selanjutnya</p>
                                        </div>
                                        {{-- <div id="map" style='width: 600px; height: 500px;'></div> --}}
                                        <div id="map" class="gmaps" style='width: 500px; height: 300px;'></div>
                                        <div class="col-lg-4 mx-auto">
                                            <div>

                                            </div>
                                            <div class="row mb-4  ">
                                                <h6>Nomor HP :</h6>
                                            </div>
                                            <div class="row mb-4  ">
                                                <div class="icon icon-boxed icon-8x rounded-xl text-primary mb-4 ml-0">
                                                    <i class="ti-mobile">{{ $Datas->no_hp }}</i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-4">
                                                <h6>Alamat :</h6>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="icon icon-boxed icon-8x rounded-lg  text-primary mb-4">
                                                    <i class="ti-location-pin">{{ $Datas->alamat }}</i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-4">
                                                <h6>Email :</h6>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="icon icon-boxed icon-8x rounded-lg  text-primary mb-4">
                                                    <i class="far fa-envelope"><a
                                                            href="mailto:{`{{ $Datas->email }}`}">{{ $Datas->email }}</a></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <hr class="my-3" />
                        <div class="col-12 text-center">
                            <a href="{{ url('Data') }}" class="btn btn-primary mr-md-3">Kembali ke Semua Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    <script src="{{ asset('/assetsFE/plugins/gmaps/map-detail.js') }}"></script>

    <script>
        function initMap() {
            const uluru = {
                lat: Number(<?php echo json_encode($Datas->latitude); ?>),
                lng: Number(<?php echo json_encode($Datas->longitude); ?>)
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: uluru,
            });
            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h3 id="firstHeading" class="firstHeading">{{ $Datas->nama }}</h3>' +
                '<div id="bodyContent">' +
                '</p><p>Oleh : {{ $Datas->petugas->name }}' +
                '</p><p> Kunjungi ? <a href="http://maps.google.com/maps?q={{ $Datas->latitude }},{{ $Datas->longitude }}" target="_blank">' +
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
