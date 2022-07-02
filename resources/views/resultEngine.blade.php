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
                <img src="gambar/pngfind.com-stream-png-2659271.png" alt="logo" class="logo" width="170px" /><span>
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
        
    </nav>
    <br>
    <!-- result json data here with foreach in card -->
    <div id="result">                
        <div class="container">
            <!-- tampilkan nilai numFound-->
            <div class="row">
                <div class="col-md-12">
                    <h3 style="color: black">Hasil Pencarian</h3>
                    <p style="color: black">Ditemukan {{$jumlahData}} <span id="numFound"></span> hasil pencarian untuk kata kunci <span id="keyword"></span></p>
                </div>
            </div>
            @foreach ($hasil1 as $h)
            <!-- tampil data dengan card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ $h['id'] }}" class="text-start max-desc">{{ $h['id'] }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $h ['title_txt_id'] }}</h6>
                    <p class="card-text max-body" style="color:black">{{ $h['body_txt_id']}}</p>
                </div>
            </div>
            <br>
            @endforeach
            <!-- Tampilkan paginate dengan bootstrap -->
            <center>
                @if ($banyakHalaman > 1)
                    @for ($i = 1; $i <= $banyakHalaman; $i++)
                        <!-- style boostrap pagination -->
                        <a href="/search?halaman={{$i}}&search={{$prevSearch}}" class="btn btn-primary">{{$i}}</a>
                    @endfor
                @endif
            </center>
        </div>
    </div>
</body>

</html>