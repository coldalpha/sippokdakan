async function getDataByKategori() {
    var Kategori = document.getElementById("kategori").value;
    // console.log(Kategori);
    let url = `http://localhost:8000/getDataByKategori/${Kategori}`;
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}
async function renderDataByKategori() {
    let datas = await getDataByKategori();
    let urlPhoto = "http://localhost:8000/storage/";
    let html = "";
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

    datas.slice(1).forEach((data) => {
        // datas.forEach(data => {
        let tanggal = data.updated_at.split(/[- :]/);
        var hari = tanggal[2];
        var bulans = tanggal[1];
        var tahun = tanggal[0];
        let date = moment(
            "" + tahun + "-" + bulans + "-" + hari + "",
            "YYYY-MM-DD"
        );
        // console.log(date.fromNow());
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

        let htmlSegment = ` <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="position-absolute p-2 text-white" style="background-color: rgba(0, 0,0, 0.8)">
                                            <a href="/Data/Kategori/${
                                                data.slug_category
                                            }" class="text-white text-decoration-none">
                                                ${data.category_nama}
                                            </a>
                                        </div>
                                        <a href="/Data/${
                                            data.slug
                                        }" rel="bookmark">
                                            <img src="${
                                                urlPhoto + data.photo
                                            }" class=" card-img" style="width: 100%; height: 250px"
                                                alt="foto tidak ditemukan">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="/Data/${
                                                data.slug
                                            }" rel="bookmark"
                                                    class="text-dark">${
                                                        data.nama_kelompok
                                                    }</a>
                                            </h5>
                                            <small class="text-muted">By <a href="/Data/Petugas/${
                                                data.username
                                            }">
                                                    ${
                                                        data.petugas
                                                    }</a> <br>Update Pada ${hari} ${ket} ${tahun} </small>
                                            <p class="card-text">${
                                                data.excerpt
                                            } <a href="/Data/${data.slug}"> Read
                                                    More...</a></p>
                                        </div>
                                    </div>
                                </div>`;

        html += htmlSegment;
    });

    let container = document.querySelector("#data");
    container.innerHTML = html;
}

renderDataByKategori();
