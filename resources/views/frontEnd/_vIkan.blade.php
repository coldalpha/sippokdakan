@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
    <section class="bg-primary py-9 py-lg-10">
        <div class="container my-9 my-lg-10">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="h1">Kelompok Budidaya Perikanan</h2>
                    <p>Kelomopok-Kelompok Budidaya Perikanan (POKDAKAN) di Kabupaten Batang</p>
                    <p>Jenis Ikan : {{ $title }}</p>
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
                <div class="website-content-box-inner py-6 py-lg-8 py-xl-10">
                    <div class="container-fluid px-6 px-lg-8 px-xl-10">
                        <div class="row my-n3">
                            @foreach ($pokdakans as $Data)
                                <article class="col-12 py-3">
                                    <div class="card">
                                        <a href="/Data/{{ $Data->slug }}" rel="bookmark">
                                            <img src="assets/images/blog/image-blog-6.jpg" class="card-img" alt="">
                                        </a>
                                        <div class="card-body">
                                            <h2 class="h5"><a href="/Data/{{ $Data->slug }}" rel="bookmark"
                                                    class="text-dark">{{ $Data->nama_kelompok }}</a></h2>
                                            <p>{{ $Data->excerpt }} </p>
                                        </div>
                                        <div class="card-footer text-gray-700 d-sm-flex justify-content-between">
                                            <span>
                                                <a href="/Data/{{ $Data->slug }}" rel="bookmark"
                                                    class="text-gray-700"><time
                                                        datetime="2015-05-04T15:05:34+00:00">Petugas :
                                                        {{ $Data->user->name }}</time></a>
                                            </span>
                                            {{-- <span>1 minute read</span> --}}
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                        </div>

                        <nav class="mt-8">
                            <ul class="pagination pagination-pill justify-content-center mb-0">
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1 <span
                                            class="sr-only">(current)</span></a></li>
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
@endsection
