<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class SearchController1 extends Controller
{
    //
    public function search(Request $request)
    {
        function penghitungPaginate($banyakData, $perPage = 10)
        {
            return (int)(ceil($banyakData / $perPage));
        }

        // contoh setelah dimasukin query ke solr
        // http://192.168.99.100:8983/solr/tugas/select?indent=true&q.op=OR&q=title_txt_en%3A%20Lagu
        //http://192.168.99.100:8983/solr/core_1915101021/select?indent=true&q.op=AND&q=title_txt_id%3A%20Luna%2BMaya%0Abody_txt_id%3A%20Luna%2BMaya
        //fungsi untuk mengubah spasi menjadi %20 
        // agar bisa dimasukkan ke query
        function convertSearchKey($key)
        {
            $key = (trim($key)); //masukkan query yang akan dicari
            $searchKey = ''; //variabel untuk menyimpan query yang sudah diubah
            if (Str::contains($key, ' ')) { //jika query mengandung spasi
                $result = explode(' ', $key); //mengubah query menjadi array
                foreach ($result as $res) { //mengulang array
                    $searchKey .= $res . "%2B"; //menambahkan %2B untuk menandakan bahwa query ini merupakan OR
                }
                $searchKey = substr($searchKey, 0, -3); //menghapus %20 terakhir
                return $searchKey; //mengembalikan query yang sudah diubah
            }

            return $key; //jika query tidak mengandung spasi
        }

        function paginate($items, $perPage = 10, $page = 1)
        {
            // deklarasi variable item yang akan ditampilkan
            // sementara akan diisi seluruh item
            // kemudian nanti akan direplace dengan array_slice
            $itemToShow = $items;
            $currentPage = $page;
            //cek jika pagenya bukan page pertama
            //set posisi startnya
            if ($currentPage > 1) {
                $start = ($currentPage * $perPage) - $perPage;
            } else {
                $start = 0;
            }

            $itemToShow = array_slice($items, $start, $perPage);

            return $itemToShow;
        }

        // menggabungkan input user dengan url pada apache solr
        //http://192.168.99.100:8983/solr/core_1915101021/select?indent=true&q.op=AND&q=title_txt_id%3A%20Luna%2BMaya%0Abody_txt_id%3A%20Luna%2BMaya&rows=800&start=0
        $url = "http://192.168.99.100:8983/solr/core_1915101021/select?indent=true&q.op=AND&q=title_txt_id%3A%20" . convertSearchKey($request->search) . "%0Abody_txt_id%3A%20". convertSearchKey($request->search) . "&rows=800&start=0";

        // get kontennya
        $result = file_get_contents($url);

        // decode jsonnya jadi array paginate
        $hasil = json_decode($result, true);

        $jumlahData = $hasil["response"]["numFound"];
        $hasil1 = $hasil['response']['docs'];
        $banyakHalaman = 1;
        // set hasil yang akan tampil hanya 10
        $perPage = 10;
        // cek jika jumlah ditemukan pada solr > 10
        if ($hasil['response']['numFound'] > 10) {

            // hitung banyak halaman yang akan ditampilkan dari data yang ditemukan
            $banyakHalaman = penghitungPaginate($hasil['response']['numFound'], $perPage);
            // paginate halaman tersebut
            $hasil1 = paginate($hasil1, $perPage, $request->halaman);
        }

        $previousSearch = convertSearchKey($request->search);

        return view('resultEngine', [
            'jumlahData' => $jumlahData,
            'hasil1' => $hasil1,
            'banyakHalaman' => $banyakHalaman,
            'prevSearch' => $previousSearch,
        ]);
    }
}
