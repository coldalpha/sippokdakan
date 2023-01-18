@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
    <section class="bg-primary py-9 py-lg-10">
        <div class="container my-9 my-lg-10">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">

                    <h2 class="h1 mb-3">Portfolio</h2>
                    <p class="mb-6">Trust the professionals. Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem accusantium doloremque laudantium.</p>
                    <nav class="masonry-filter">
                        <a href="#" class="btn btn-sm btn-soft-white m-1 px-4 active" data-filter="*">All</a>
                        @foreach ($Categories as $Category)
                            <a href="#" class="btn btn-sm btn-soft-white m-1 px-4"
                                data-filter=".{{ $Category->slug }}">{{ $Category->nama }}</a>
                        @endforeach
                    </nav>

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
            <div class="website-content-box" id="services">
                <div class="website-content-box-inner py-6 py-lg-8 py-xl-10">
                    <div class="container-fluid px-6 px-lg-8 px-xl-10">

                        <div class="masonry-container row m-n4">
                            @foreach ($Datas as $Data)
                                <div class="col-sm-6 col-md-4 p-4 masonry-item {{ $Data->Category->slug }}">
                                    <a class="card border-0" href="portfolio-single-1.html">
                                        <div class="card-zoom">
                                            <img class="card-img" src="{{ asset('storage/' . $Data->photo) }}"
                                                alt="">
                                        </div>
                                        <div class="card-footer px-0 pb-0">
                                            <p class="small text-uppercase mb-1 text-muted">{{ $Data->Category->nama }}"
                                            </p>
                                            <h4 class="h5 text-dark mb-0">{{ $Data->nama }}"</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
