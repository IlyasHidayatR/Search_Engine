<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController1 extends Controller
{
    //
    public function search(Request $request)
    {
        if(isset($_GET["page"])){
            $page = (int)$_GET["page"];
        }
        else {
            $page = 1;
        }

        $start=$page*10-10;

        // contoh setelah dimasukin query ke solr
        // http://192.168.99.100:8983/solr/tugas/select?indent=true&q.op=OR&q=title_txt_en%3A%20Lagu

        //fungsi untuk mengubah spasi menjadi %20 
        // agar bisa dimasukkan ke query
        function convertSearchKey($key)
        {
            $key = (trim($key));
            $searchKey = '';
            if (Str::contains($key, ' ')) {
                $result = explode(' ', $key);
                foreach ($result as $res) {
                    $searchKey .= $res . "%20";
                }
                $searchKey = substr($searchKey, 0, -3);
                return $searchKey;
            }

            return $key;
        }

        // menggabungkan input user dengan url pada apache solr
        //http://192.168.99.100:8983/solr/tugas/select?indent=true&q.op=OR&q=title_txt_id%3ALagu&rows=800&start=0
        $url = "http://192.168.99.100:8983/solr/tugas/select?indent=true&q.op=OR&q=title_txt_id%3A" . convertSearchKey($request->search) . "&rows=800&start=" . $start;

        // get kontennya
        $result = file_get_contents($url);

        // decode jsonnya jadi array paginate
        $hasil = json_decode($result, true);
        return view('resultEngine', compact('hasil', 'page'));
    }
}
