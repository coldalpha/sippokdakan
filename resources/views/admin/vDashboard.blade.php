@extends('admin.layouts/vlTemplate')
@section('content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xl-4">
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-primary">
                            <p>DATA KELOMPOK</p>
                        </div>
                        <div class="w-50 bg-primary p-3">
                            <div id="chart1"></div>
                            <h4 class="text-white">{{ $JumlahDataKelompok }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-primary">
                            <p>DATA MENUNGGU</p>
                        </div>
                        <div class="w-50 bg-primary p-3">
                            <h4 class="text-white">{{ $JumlahDataMenunggu }}</h4>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-primary">
                            <p>JUMLAH PETUGAS</p>
                        </div>
                        <div class="w-50 bg-primary p-3">
                            <h4 class="text-white">{{ $JumlahPetugas }}</h4>
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-primary">
                            <p>PETUGAS AKTIF</p>
                        </div>
                        <div class="w-50 bg-primary p-3">
                            <h4 class="text-white">{{ $JumlahPetugasAktif }}</h4>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">MAPS</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Filter</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">KATEGORI</label>
                            <select class="form-control" id="kategoriFilter">
                                <option value="">Pilih Salah Jenis Kategori</option>
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
                                <option value="">Pilih Salah Jenis Ikan</option>
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
                                <option value="">Pilih Salah Kecamatan</option>
                                @foreach ($Kecamatans as $Kecamatan)
                                    <option>{{ $Kecamatan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
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
    <script>
    </script>
@endsection
