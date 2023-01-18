@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
    <section id="home" class="bg-primary py-8 py-lg-10">
        <!-- Overlay -->
        <div class="overlay overlay-advanced">
            <div class="overlay-inner bg-image-holder bg-cover">
                <img src="{{ asset('/assetsFE/images/photos/photo-3.jpg') }}" alt="background" />
            </div>
            <div class="overlay-inner bg-primary opacity-50"></div>
        </div>
        <div class="container my-8 my-lg-13">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <p class="h5 mb-5">Selamat Datang</p>
                    <h1 class="mb-5">
                        <span class="font-weight-bold" data-toggle="typed"
                            data-options='{"strings": ["SIP", "POKDAKAN", "SIP-POKDAKAN"]}'></span>
                    </h1>
                    <p class="mb-7">
                        SIP-POKDAKAN atau Sistem Informasi Publik Kelompok Budidaya
                        Perikanan adalah sistem yang mendapatkan data terbaru dari Dinas
                        Kelautan Perikanan dan Peternakan Kabupaten Batang, terkait
                        informasi seputar kelompok budidaya perikanan yang ada di
                        Kabupaten Batang
                    </p>
                    <a href="#maps" class="btn btn-soft-white d-block d-sm-inline-block scrollto">Cek Persebaran</a>

                </div>
            </div>
        </div>
        <div class="shape-advanced shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 20" class="fill-white" preserveAspectRatio="none">
                <path d="M 0 0 C 200 20 400 18 500 18 C 600 18 800 20 1000 0 L 1000 20 L 0 20 L 0 0 Z" />
            </svg>
        </div>
    </section>
    <div class="website-content mt-n8 mt-lg-n10">
        <div class="website-content-inner pb-8 pb-lg-10">
            <div class="website-content-box">
                <div class="website-content-box-inner">
                    <div class="konten shadow">
                        <!-- Maps-->
                        <section id="maps" class="pt-6 pt-lg-8 pt-xl-10 pb-0">
                            <div class="container-fluid px-6 px-lg-8 px-xl-10">
                                <div class="row mb-8">
                                    <div class="col-lg-10 mx-auto">
                                        <h2 class="text-center mb-8">MAPS</h2>
                                    </div>
                                    {{-- <div id="map" style='width: 600px; height: 500px;'></div> --}}
                                    <div id="map" class="gmaps" style='width: 600px; height: 500px;'></div>
                                    <div class="col-lg-4 mx-auto">
                                        <div class="row mb-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">KATEGORI</label>
                                                <select class="form-control" id="kategoriFilter">
                                                    <option value="">Pilih Jenis Kategori</option>
                                                    @foreach ($Categories as $Category)
                                                        <option>{{ $Category->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Ikan</label>
                                                <select class="form-control" id="ikanFilter">
                                                    <option value="">Pilih Jenis Ikan</option>
                                                    @foreach ($Ikans as $Ikan)
                                                        <option>{{ $Ikan->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Kecamatan</label>
                                                <select class="form-control" id="kecamatanFilter">
                                                    <option value="">Pilih Kecamatan</option>
                                                    @foreach ($Kecamatans as $Kecamatan)
                                                        <option>{{ $Kecamatan->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- DATA-->
                        <section id="data" class="pt-6 pt-lg-8 pt-xl-10 pb-0">
                            <div class="container-fluid px-6 px-lg-8 px-xl-10">
                                <div class="row mb-8">
                                    <div class="col-lg-10 mx-auto">
                                        <h2 class="text-center mb-4">DATA</h2>
                                        @foreach ($Datas as $Data)
                                            <article class="col-12 py-3 w-200">
                                                <div class="card mb-3" style="">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <a href="/Data/{{ $Data->slug }}">
                                                                <img src="{{ asset('storage/' . $Data->photo) }}"
                                                                    class="img-fluid rounded-start row-sm-12 " alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <a href="/Data/{{ $Data->slug }}" class="text-dark">
                                                                    <h5 class="card-title">{{ $Data->nama }}
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {{ substr($Data->excerpt, 0, 125) }}</p>
                                                                    <span>
                                                                        <a href="/Data/{{ $Data->slug }}" rel="bookmark"
                                                                            class="text-gray-700"><time
                                                                                datetime="2015-05-04T15:05:34+00:00">Petugas
                                                                                :
                                                                                {{ $Data->petugas->name }}</time></a>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach

                                        <a href="{{ url('/Data') }}"
                                            class="btn btn-soft-info position-absolute right-0 left-0" type="button">
                                            Lihat Semua</a>
                                    </div>

                                </div>

                                <div class="row mb-10"></div>

                            </div>
                        </section>

                        <!-- Foto -->
                        <section id="foto" class="pt-8 pt-xl-10 pb-0">
                            <div class="container-fluid px-6 px-lg-8 px-xl-10">
                                <div class="row mb-8">
                                    <div class="col-lg-10 mx-auto text-center">
                                        <h2 class="mb-4">FOTO</h2>
                                        <p class="mb-6">Dokumentasi kegiatan Kelompok Budidaya Perikanan di
                                            Kabupaten
                                            Batang</p>
                                        <nav class="masonry-filter">
                                            <a href="#" class="btn btn-sm btn-soft-secondary m-1 px-4 active"
                                                data-filter="*">All</a>
                                            @foreach ($users as $user)
                                                <a href="#" class="btn btn-sm btn-soft-secondary m-1 px-4"
                                                    data-filter=".{{ $user->username }}">{{ $user->name }}</a>
                                            @endforeach
                                        </nav>

                                    </div>
                                </div>
                                <div class="masonry-container row m-n4 ">
                                    @foreach ($Foto as $Data)
                                        <div class="col-sm-6 col-md-4 p-4 masonry-item {{ $Data->petugas->username }}">
                                            <a class="card border-0" href="portfolio-single-1.html">
                                                <div class="card-zoom">
                                                    <a href="/Data/{{ $Data->slug }}">
                                                        <img src="{{ asset('storage/' . $Data->photo) }}"
                                                            class="img-fluid rounded-start row-sm-12 " alt="">
                                                    </a>
                                                </div>
                                                <div class="card-footer px-0 pb-0">
                                                    <small class="text-muted">{{ $Data->petugas->name }} </small>
                                                    <h4 class="h5 text-dark mb-0">{{ $Data->nama }}</h4>
                                                </div>
                                            </a>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </section>

                        <!-- Contact -->
                        <section id="contact" class="pt-8 pt-xl-10 pb-6 pb-lg-8 pb-xl-10">
                            <div class="container-fluid px-6 px-lg-8 px-xl-10">
                                <div class="row mb-8">
                                    <div class="col-lg-10 mx-auto text-center">
                                        <h2 class="mb-4">KONTAK</h2>
                                        <p>Hubungi kami jika ada masalah atau pertanyaan terakait SIP-POKDAKAN, Sangat
                                            senang
                                            dapat membantu dan
                                            memberikan informasi kepada anda</p>
                                    </div>
                                </div>

                                <div class="row mb-5">

                                    <div class="col-md-4 mb-5 mb-md-0">
                                        <div class="icon icon-boxed icon-4x rounded-lg bg-soft-primary text-primary mb-4">
                                            <i class="ti-mobile"></i>
                                        </div>
                                        <p>(0285) 391749 <br> 0895 3771 17145</p>
                                    </div>

                                    <div class="col-md-4 mb-5 mb-md-0">
                                        <div class="icon icon-boxed icon-4x rounded-lg bg-soft-primary text-primary mb-4">
                                            <i class="ti-location-pin"></i>
                                        </div>
                                        <p>JL RA Kartini No. 12<br />
                                            DISLUTKANNAK KAB BATANG</p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="icon icon-boxed icon-4x rounded-lg bg-soft-primary text-primary mb-4">
                                            <i class="ti-email"></i>
                                        </div>
                                        <p>
                                            <a href="mailto: dislutkanak@batangkab.go.id"
                                                class="text-dark">dislutkanak@batangkab.go.id</a><br />
                                            <a href="mailto:ti18fataa.0010@gmail.com"
                                                class="text-dark">ti18fataa.0010@gmail.com</a>
                                        </p>
                                    </div>

                                </div>

                                <hr class="my-8" />
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <blockquote class="blockquote text-center">
                    <h4 class="modal-title mb-0" id="title_nama"> </h4>
                    <footer class="blockquote-footer" id="User_nama">Someone famous in</footer>
                    </blockquote>
                    <u></u>
                </div>
                <div class="modal-body">
                    <div class="px-2 rounded">
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                <img src="{{ asset('/assetsFE/images/blog/image-blog-6.jpg') }}" class="img-fluid rounded"
                                    alt="Ini Photo" style="max-height:300px; overflow:hidden" width="500" height="300" id="photo">
                            </div>
                            <div class="col d-flex justify-content-center">
                                <table class="table rounded">
                                <tbody>
                                    
                                    <tr>
                                        <th scope="row" colspan="2">
                                            <div class="d-flex align-items-center">
                                                <img src="https://toppng.com//public/uploads/preview/banner-freeuse-geldtasche-icon-free-and-money-icon-115534432646uveksxxli.png"
                                                    class="rounded p-1 mr-3" width="50" height="50" alt="...">
                                                <div class="flex-grow-1 ms-3">
                                                     <label id="nama_kelompok" hidden>Mark</label>
                                                    <h6 id="total_omzet"> Mark</h6>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="2">
                                            <div class="d-flex align-items-center">
                                                <img src="https://www.pngkey.com/png/detail/726-7263774_land-icon-png-clipart-computer-icons-real-property.png" class="rounded-circle p-1 mr-3"  width="50" height="50" alt="...">
                                                <div class="flex-grow-1 ms-3">
                                                    <li class="list-inline-item"><h6 id="luas_lahan"> Mark</h6></li>
                                                    <li class="list-inline-item"> m<sup>2</sup></li>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="https://e7.pngegg.com/pngimages/406/844/png-clipart-computer-icons-person-user-spark-icon-people-share-icon-thumbnail.png" class="rounded-circle p-1 mr-3" width="50" height="50" alt="...">
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 id="jumlah_anggota"> Mark</h6>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                        <hr>
                        
                    </div>
                </div>
                
                <div class="modal-footer d-flex justify-content-center">
                    <a id="linkSlug" class="btn btn-primary text-white">View Detail</a>
                    <button type="button" class="btn btn-secondary" id="btnCloseModal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assetsFE/plugins/gmaps/map-custom-script-v2.js') }}"></script>
    {{-- <script src="{{ asset('/assetsFE/plugins/gmaps/map-custom-script.js') }}"></script> --}}
@endsection
