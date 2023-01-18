@extends('frontEnd.layouts/vlFeTemplate')
@section('content')
<input type="hidden" value="{{ $Detek }}" id="Detek" name="Detek">
<input type="hidden" value="{{ $Isi }}" id="Isi" name="Isi">
    <section class="bg-primary py-9 py-lg-10">
        <div class="container my-9 my-lg-10">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="h1">Kelompok Budidaya Perikanan</h2>
                    <p>{{ $ket }}</p>
                    <div class="ms-auto">
                        <div class="col p-0">
                            @if ($title === 'Data')
                                <a class="btn btn-primary text-white" aria-current="page" href="{{ url('/') }}">
                                    <i class="lni lni-exit"></i>BACK
                                </a>
                            @else
                                <a class="btn btn-primary text-white" aria-current="page" href="{{ url('/Data') }}">
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

                    <div class="py-8 py-lg-8 py-xl-10">
                        <div class="container-fluid px-6 px-lg-8 px-xl-10">
                            <div class="row my-n3">


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
                                                    {{ $Datas[0]->updated_at }} </small>
                                                <p>{!! $Datas[0]->excerpt !!}<a href="/Data/{{ $Datas[0]->slug }}"> Read
                                                        More...</a>
                                                </p>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="d-sm-flex my-3">
                                                    <table>
                                                        <td>
                                                            <tr><a href="/Data/Petugas/{{ $Datas[0]->username }}">
                                                                    Petugas : {{ $Datas[0]->nama_petugas}}</a></tr>
                                                        </td>
                                                    </table>
                                                </div>
                                                <div class="d-sm-flex my-3">
                                                    <table>
                                                        <td>
                                                            <tr> Kategori : 
                                                                @foreach ($kategoris as $kategori)
                                                                <span class="badge bg-primary mx-3"><a href="/Data/Kategori/{{ $kategori->slug }}" class="text-white "><b>{{ $kategori->nama }}</b></a></span>
                                                                @endforeach
                                                        </td>
                                                    </table>
                                                </div>
                                                 <div class="d-sm-flex my-3" >
                                                    <table>
                                                        <td>
                                                            <tr>Jenis Ikan : 
                                                                @foreach ($ikans as $ikan)
                                                                <span class="badge bg-primary mx-3"><a href="/Data/Ikan/{{ $ikan->nama }}" class="text-white "><b>{{ $ikan->nama }}</b></a></span>
                                                                @endforeach
                                                            </tr>
                                                        </td>
                                                    </table>
                                                </div>
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
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example m-4">
                                <ul class="pagination">
                                    <li class="page-item" data="prev">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item" data="next">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <li>
                                        <p class="ml-2 mt-2">
                                            <span id="cur_page"></span> page of
                                            <span id="total_page"></span> pages
                                        </p>
                                    </li>
                                </ul>
                            </nav>
                            <script>
                                
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {{-- <script src="{{ asset('/assetsFE/js/dataKelompok.js') }}"></script> --}}
   <script>
    const DetekVar = document.getElementById("Detek").value;
    const IsiVar = document.getElementById("Isi").value;
    var url;
    if ("Data" == DetekVar && "Data" == IsiVar) {
        url = "http://localhost:8000/api/getData";
        console.log(url);
    }
    if ("Kategori" == DetekVar) {
        url = `http://localhost:8000/api/getDataByKategori/${IsiVar}`;
        console.log(url);
    }
    if ("Ikan" == DetekVar) {
        url = `http://localhost:8000/api/getDataByIkan/${IsiVar}`;
        console.log(url);
    }
    if ("Petugas" == DetekVar) {
        url = `http://localhost:8000/api/getDataByPetugas/${IsiVar}`;
        console.log(url);
    }
    function show(row, page) {
        $.ajax({type: "get",url,dataType: "json",
            success: function(data) {
                $("#data").html("");
                let limit = parseInt(row);
                let cur_page = parseInt(page);
                let total_page = Math.ceil(data.length / limit);
                let length = limit * (cur_page + 1);
                let urlPhoto = "http://localhost:8000/storage/";
                let bulan = [
                    "Januari",
                    "Februari",
                    "Maret",
                    "April",
                    "Mei",
                    "Juni",
                    "Juli",
                    "Agustus",
                    "September",
                    "Oktober",
                    "November",
                    "Desember",
                ];
                if (length >= data.length) {
                    length = data.length;
                }
                let offset = cur_page * limit;
                console.log(offset);
                $("#cur_page").text(cur_page + 1);
                $("#total_page").text(total_page);
                for (var i = offset; i < length; i++) {
                    let tanggal = data[i].updated_at.split(/[- :]/);
                    var hari = tanggal[2];
                    var bulans = tanggal[1];
                    var tahun = tanggal[0];
                    let date = moment(
                        "" + tahun + "-" + bulans + "-" + hari + "",
                        "YYYY-MM-DD"
                    );
                    var ket = "";
                    if (bulans == 1) {
                        ket = bulan[0];
                    }
                    if (bulans == 2) {
                        ket = bulan[1];
                    }
                    if (bulans == 3) {
                        ket = bulan[2];
                    }
                    if (bulans == 4) {
                        ket = bulan[3];
                    }
                    if (bulans == 5) {
                        ket = bulan[4];
                    }
                    if (bulans == 6) {
                        ket = bulan[5];
                    }
                    if (bulans == 7) {
                        ket = bulan[6];
                    }
                    if (bulans == 8) {
                        ket = bulan[7];
                    }
                    if (bulans == 9) {
                        ket = bulan[8];
                    }
                    if (bulans == 10) {
                        ket = bulan[9];
                    }
                    if (bulans == 11) {
                        ket = bulan[10];
                    }
                    if (bulans == 12) {
                        ket = bulan[11];
                    }
                    $("#data").append(`<div class="col-md-4 mb-3 data">
                                    <div class="card">
                                        <a href="/Data/${
                                          data[i].slug
                                        }" rel="bookmark">
                                            <img src="${
                                              urlPhoto + data[i].photo
                                            }" class=" card-img" style="width: 100%; height: 250px"
                                                alt="foto tidak ditemukan">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="/Data/${
                                              data[i].slug
                                            }" rel="bookmark"
                                                    class="text-dark">${
                                                      data[i].nama_kelompok
                                                    }</a>
                                            </h5>
                                            <small class="text-muted">By <a href="/Data/Petugas/${
                                              data[i].username
                                            }">
                                                    ${
                                                      data[i].petugas
                                                    }</a> <br>Update Pada ${hari} ${ket} ${tahun} </small>
                                            <p class="card-text">${
                                              data[i].excerpt
                                            } <a href="/Data/${
              data[i].slug
            }"> Read
                                                    More...</a></p>
                                        </div>
                                    </div>
                                </div>`);
                }
            },
            error: function() {
                $(".100_list_container").html("error");
            },
        });
        // console.log(data);
    }
    show("3", "0");
    $(document).on("click", ".page-item", function(e) {
        e.preventDefault();
        var key = $(this).attr("data");
        var total = $("#total_page").text();
        var cur_page = $("#cur_page").text();
        var page = parseInt(cur_page) - 1;
        var length = parseInt(total) - 1;
        if (key == "prev") {
            if (page <= 0) {
                page = 0;
            } else {
                page--;
            }
        } else if (key == "next") {
            if (page >= length) {
                page = length;
            } else {
                page++;
            }
        }
        show("3", page);
    });
</script>
@endsection
