@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
    <section class="bg-primary py-9 py-lg-10">
        <div class="overlay overlay-advanced">
            <div class="overlay-inner bg-image-holder bg-cover">
                <img src="{{ asset('/assetsFE/images/photos/photo-3.jpg') }}" alt="background" />
            </div>
            <div class="overlay-inner bg-primary opacity-50"></div>
        </div>
        <div class="container my-9 my-lg-10">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="h1">Kelompok Budidaya Perikanan</h2>
                    <p>{{ $ket }}</p>
                    <div class="ms-auto">
                        <div class="col p-0">
                            @if ($title === 'Data')
                                <a class="btn btn-soft-white d-block d-sm-inline-block" aria-current="page"
                                    href="{{ url('/') }}">
                                    <i class="lni lni-exit"></i>BACK
                                </a>
                            @else
                                <a class="btn btn-soft-white d-block d-sm-inline-block" aria-current="page"
                                    href="{{ url('/Data') }}">
                                    <i class="lni lni-exit"></i>BACK
                                </a>
                            @endif
                        </div>
                    </div>
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

                    <div class="py-8 py-lg-8 py-xl-10 shadow">
                        <div class="container-fluid px-6 px-lg-8 px-xl-10 ">
                            <div class="row my-n3">
                                <input type="hidden" value="{{ $Datas[0]->category->slug }}" id="kategori" name="kategori">

                                @if ($Datas->count())
                                    <article class="col-12 py-3">
                                        <div class="card">
                                            <a href="/Data/{{ $Datas[0]->slug }}" rel="bookmark">
                                                <img src="{{ asset('storage/' . $Datas[0]->photo) }}"
                                                    class="card-img" alt="" style="width:100%; height: 500px">
                                            </a>
                                            <div class="card-body text-center">
                                                <h2 class="h5"><a href="/Data/{{ $Datas[0]->slug }}"
                                                        rel="bookmark" class="text-dark">{{ $Datas[0]->nama }}</a>
                                                </h2>
                                                <small class="text-muted">Last Updated
                                                    {{ $Datas[0]->updated_at->diffForHumans() }} </small>
                                                <p>{{ $Datas[0]->excerpt }} <a href="/Data/{{ $Datas[0]->slug }}"> Read
                                                        More...</a>
                                                </p>
                                            </div>
                                            <div class="card-footer d-sm-flex justify-content-between">
                                                <table>
                                                    <td>
                                                        <tr><a href="/Data/Petugas/{{ $Datas[0]->petugas->username }}">
                                                                Petugas : {{ $Datas[0]->petugas->name }}</a></tr>
                                                        <tr><a href="/Data/Kategori/{{ $Datas[0]->category->slug }}">
                                                                Kategori : {{ $Datas[0]->category->nama }}</a></tr>
                                                        <tr><a href="/Data/Ikan/{{ $Datas[0]->ikan->slug }}">
                                                                Ikan : {{ $Datas[0]->ikan->nama }}</a></tr>
                                                    </td>
                                                </table>
                                                {{-- <span>1 minute read</span> --}}
                                            </div>
                                        </div>
                                    </article>
                                @else
                                    <div>
                                        <h1 class="justify-content-center mt-3">No Post Found</h1>
                                    </div>
                                @endif

                                <div class="container">
                                    <div class="row" id="data">
                                        @foreach ($Datas->skip(1) as $Data)
                                            <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="position-absolute p-2 text-white" style="background-color: rgba(0, 0,0, 0.8)">
                                                    <a href="/Data/Kategori/{{ $Data->category->slug }}" class="text-white text-decoration-none">
                                                        {{ $Data->category->nama }}
                                                    </a>
                                                </div>
                                                <a href="/Data/{{ $Data->slug }}" rel="bookmark">
                                                    <img src="{{ asset('storage/' . $Data->photo) }}" class=" card-img" style="width: 100%; height: 250px"
                                                        alt="foto tidak ditemukan">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="/Data/{{ $Data->slug}}" rel="bookmark" class="text-dark">{{ $Data->nama }}</a>
                                                    </h5>
                                                    <small class="text-muted">By <a href="/Data/Petugas/{{ $Data->petugas->username }}">{{ $Data->petugas->name }}</a> <br>Update Pada {{ $Data->updated_at->diffForHumans() }} </small>
                                                    <p class="card-text">{{ $Data->excerpt }} <a href="/Data/{{ $Data->slug }}"> Read
                                                            More...</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <nav class="mt-8">
                                <ul class="pagination pagination-pill justify-content-center mb-0">
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1
                                            <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link px-7" href="#">Next</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>

    {{-- <script src="{{ asset('/assetsFE/js/dataKelompok.js') }}"></script> --}}
    <script src="{{ asset('/assetsFE/js/dataKelompokByKategori.js') }}"></script>
@endsection
