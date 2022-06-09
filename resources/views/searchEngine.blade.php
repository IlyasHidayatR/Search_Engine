<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <h1>Search</h1>
        <form action="/search" method="get">
            <label>Query</label>
            <!-- select type -->
            <!-- <select name="type">
                <option value="id:">Link</option>
                <option value="title_txt_id:">Judul</option>
                <option value="body_txt_id:">Isi</option>
            </select> -->
            <!-- get value from option -->
            
            <input type="text" size="30" name="query" value="*:*" /><br><br>
            <input type="submit" />
        </form>
        <p>
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
        </p>
</html>