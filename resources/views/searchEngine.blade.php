<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Box Loading</title>
        <link rel="stylesheet" href="{{ asset('css/input.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
            }

            body {
                background: #000;
            }

            .logo {
                text-align: center;
                margin: 1px;
                margin-bottom: 30px;
                padding: 8px 8px 0 0;
                height: 90px;
            }

            .searchBox {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .search {
                padding: 0px 10px;
                border: 3px solid #000;
                height: 40px;
                width: 50px;
                background: rgb(0, 87, 209);
                color: #fff;
                border-radius: 50px;
            }

            input {
                border: 3px solid #fff;
                height: 40px;
                width: 300px;
                border-radius: 50px;
                padding: 0px 10px;
            }
        </style>

    </head>
    <body>
        <!-- <h1>Search</h1> -->
        <div class="searchBox">
            <a href="#">
                <img src="{{asset('gambar/pngfind.com-stream-png-2659271.png')}}" alt="logo" class="logo" /><span>
                </span>
            </a>
                <form action="/search" method="get">
                <label>Query</label>
                <!-- select type -->
                <!-- <select name="query">
                    <option value="id:">Link</option>
                    <option value="title_txt_id:">Judul</option>
                    <option value="body_txt_id:">Isi</option>
                </select> -->
                <!-- get value from option -->
                <div class="box">
                    <div class="dflex">
                        <input type="text" name="query" value="*:*" placeholder="Cari Berita...">
                        <button class="search" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- <input type="text" size="30" name="query" value="*:*" /><br><br> -->
                <!-- <input type="submit" /> -->
                
            </form>
        </div>
        
        <!-- <p>
            Notes:<br>
            Solr Query syntax is<br>
            <b>attribute:value</b><br>
            Example 1: if you want to search by "name" for "fast" you type:<br>
            <b>name:fast</b><br>
            Example 2: if you want to display all results you type:<br>
            <b>*:*</b>
        </p>
        <p>
            As a help from me i created the form for you, <br>
            your part is to add options to the form to handle search by attributes<br>
            instead of writing the search query in solr syntax
        </p> -->
    </body>
</html>