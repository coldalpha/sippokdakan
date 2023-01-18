<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>

<body>
    <h1 class="text-center mt-3"> <u> <b>Belajar Use API</b></u></h1>
    <div class="container">
        <div class="row mt-4">
            <div class="data">

            </div>
            <div class="col-4">
                <div class="card shadow-lg" style="width: 18rem;">
                    <img src="https://asset-a.grid.id/crop/0x0:0x0/360x240/photo/2020/04/09/663219154.png"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // async function fetchText() {
    //     let response = await fetch('getData');

    //     console.log(response.status); // 200
    //     console.log(response.statusText); // OK

    //     if (response.status === 200) {
    //         let data = await response.text();
    //         console.log(data);
    //     }

    // }
    // fetchText();
    async function getData() {
        let url = 'getData';
        try {
            let res = await fetch(url);
            return await res.json();
        } catch (error) {
            console.log(error);
        }
    }
    async function renderData() {
        let datas = await getData();
        let urlPhoto = 'http://localhost:8000/storage/'
        let html = '';
        datas.slice(1).forEach(data => {
            // datas.forEach(data => {
            let tanggal = data.updated_at;

            let htmlSegment = ` <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="position-absolute p-2 text-white" style="background-color: rgba(0, 0,0, 0.8)">
                                            <a href="/Data/Kategori/${data.slug_category}" class="text-white text-decoration-none">
                                                ${data.category_nama}
                                            </a>
                                        </div>
                                        <a href="/Data/${data.slug}" rel="bookmark">
                                            <img src="${ urlPhoto + data.photo}" class=" card-img" style="width: 100%; height: 250px"
                                                alt="foto tidak ditemukan">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="/Data/${data.slug}" rel="bookmark"
                                                    class="text-dark">${data.nama_kelompok}</a>
                                            </h5>
                                            <small class="text-muted">By <a href="/Data/Petugas/${data.username}">
                                                    ${data.petugas}</a>${tanggal} </small>
                                            <p class="card-text">${data.excerpt} <a href="/Data/${data.slug}"> Read
                                                    More...</a></p>
                                        </div>
                                    </div>
                                </div>`;

            html += htmlSegment;
        });

        let container = document.querySelector('.row');
        container.innerHTML = html;
    }

    renderData();
</script>

</html>
