<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="{{asset('css/result.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
    <nav>
        <div class="left dflex">
            <a href="/">
                <img src="gambar/pngfind.com-stream-png-2659271.png" alt="logo" class="logo" width="100px" /><span>
                </span>
            </a>
        </div>
        <form action="/search" method="get">
        <div class="searchBox dflex">
            <div class="box">
                <div class="dflex">
                    <button class="all" type="button">
                        Search
                    </button>
                    <input type="text" id="q" title="Search" name="search" placeholder="Cari Berita...">
                    <button class="search" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        </form>
        <div class="right dflex">
            <div class="item">
                <i class="fa fa-flag"></i><i class="fa fa-sort-desc"></i>
            </div>
            <div class="item">
                <h5><i class="fa fa-users" aria-hidden="true"></i>Account</h5>
            </div>
            <div class="item">
                <h5><i class="fa fa-moon-o" aria-hidden="true"></i>Atur Mode</h5>
            </div>
        </div>
    </nav>
    <nav class="subnavugation">
        <ul class="submenu">
            <a href="#"></i>
                <li>News</li>
            </a>
            <a href="#"></i>
                <li>Tren</li>
            </a>
            <a href="#">
                <li>Health</li>
            </a>
            <a href="#">
                <li>Food</li>
            </a>
            <a href="#">
                <li>Edukasi</li>
            </a>
            <a href="#">
                <li>Parapuan</li>
            </a>
            <a href="#">
                <li>Money</li>
            </a>
            <a href="#">
                <li>UMKM</li>
            </a>
            <a href="#">
                <li>Teknologi</li>
            </a>
            <a href="#">
                <li>Life Style</li>
            </a>
            <a href="#">
                <li>Homey</li>
            </a>
            <a href="#">
                <li>Properti</li>
            </a>
            <a href="#">
                <li>Bola</li>
            </a>
            <a href="#">
                <li>Travel</li>
            </a>
            <a href="#">
                <li>Otomotif</li>
            </a>
            <a href="#">
                <li>Sains</li>
            </a>
            <a href="#">
                <li>HYPE</li>
            </a>
        </ul>
        <ul>
            <a href="#">
                <li class="li">Kompas.com</li>
            </a>
        </ul>
    </nav>
    <br>
    <!-- result json data here with foreach in card -->
    <div id="result">                
        <div class="container">
            <!-- tampilkan numFound-->
            <h5 style="color:black">Sekitar {{$hasil['response']['numFound']}} Hasil</h5>
            @foreach ($hasil['response']['docs'] as $h)
            <!-- tampil data dengan card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ $h['id'] }}" class="text-start max-desc">{{ $h['id'] }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $h ['title_txt_id'] }}</h6>
                    <p class="card-text" style="color:black">{{ $h['body_txt_id']}}</p>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</body>

</html>