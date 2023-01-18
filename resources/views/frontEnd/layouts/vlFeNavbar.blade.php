<nav id="siteNavbar"
    class="
        site-navbar site-navbar-transparent
        navbar navbar-expand-lg navbar-dark
        bg-white
        shadow-light
        fixed-top
        py-2
      "
    data-navbar-base="navbar-dark" data-navbar-toggled="navbar-light" data-navbar-scrolled="navbar-light">
    <a class="navbar-brand py-1 scrollto" href="{{ url('/') }}">
        <img src="{{ asset('/assetsFE/images/logo-hitam2.png') }} " alt=""
            class="navbar-brand-img navbar-brand-img-light" />
        <img src="{{ asset('/assetsFE/images/logo-putih2.png') }} " alt=""
            class="navbar-brand-img navbar-brand-img-dark" />
    </a>

    <button class="navbar-toggler-alternative" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="siteNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-alternative-icon">
            <span></span>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            {{-- <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a> --}}
            {{-- <li class="nav-item">
                <a class="nav-link scrollto" href="#home">Home</a>
            </li> --}}
            @if ($title === 'Data' || $title === 'Data Detail' || $title === 'Data by Kategori' || $title === 'Data by Ikan' || $title === 'Data by Petugas')
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
            @else
                <li class="nav-item">
                    <a class="nav-link scrollto" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="#maps">Maps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto {{ $title === 'Data' ? 'active' : '' }}" href="#data">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="#foto">Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="#contact">Kontak</a>
                </li>
            @endif

        </div>
        @auth
            <a class="btn btn-white d-block d-lg-inline-block ml-lg-3" href="{{ url('/dashboard', []) }}" target="_blank"
                rel="noopener nofollow" data-on-navbar-light="btn-primary" data-on-navbar-dark="btn-white">Dashboard</a>
        @else
            <a class="btn btn-white d-block d-lg-inline-block ml-lg-3" href="{{ url('/login', []) }}" target="_blank"
                rel="noopener nofollow" data-on-navbar-light="btn-primary" data-on-navbar-dark="btn-white">SignIn</a>
        @endauth
    </div>
</nav>
