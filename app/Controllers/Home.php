<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();

        if (!session()->get('jadwal_sholat_loaded')) {
            $this->getJadwlSholat();
            session()->set('jadwal_sholat_loaded', true);
        }
    }

    public function getJadwlSholat()
    {
        $curl = curl_init();
        $date = date('Y-m-d');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.myquran.com/v2/sholat/jadwal/2622/$date",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $dataJson = json_decode($response, true);

        curl_close($curl);

        $data = [];

        $data['jadwal_sholat'] = [
            'imsak' => $dataJson['data']['jadwal']['imsak'],
            'subuh' => $dataJson['data']['jadwal']['subuh'],
            'terbit' => $dataJson['data']['jadwal']['terbit'],
            'dhuha' => $dataJson['data']['jadwal']['dhuha'],
            'dzuhur' => $dataJson['data']['jadwal']['dzuhur'],
            'ashar' => $dataJson['data']['jadwal']['ashar'],
            'maghrib' => $dataJson['data']['jadwal']['maghrib'],
            'isya' => $dataJson['data']['jadwal']['isya']
        ];

        session()->set('jadwal_sholat', $data['jadwal_sholat']);
    }

    public function index(): string
    {
        $pemasukan = $this->db->table('keuangan')->selectSum('nominal', 'total')->where('jenis', 'pemasukan')->get()->getRow()->total;
        $pengeluaran = $this->db->table('keuangan')->selectSum('nominal', 'total')->where('jenis', 'pengeluaran')->get()->getRow()->total;



        return view('web/index', [
            'dataInformasi' => $this->db->table('blog')->where('category', 'agenda')->orWhere('category', 'tausiyah')->orderBy('id', 'RAND()')->get(3)->getResultArray(),
            'lembaga' => $this->db->table('blog')->where('category', 'lembaga')->orderBy('id', 'RAND()')->get(3)->getResultArray(),
            'corousel' => $this->db->table('corousel')->get()->getResultArray(),
            'infaq' => $this->db->table('keuangan')->where('jenis', 'pemasukan')->orderBy('id', 'DESC')->get(5)->getResultArray(),
            'total' => $pemasukan - $pengeluaran,
        ]);
    }

    public function blog_detail()
    {
        return view('web/blog-detail', [
            'title' => 'Blog Detail'
        ]);
    }

    public function lembaga(): string
    {
        return view('web/blog-list', [
            'title' => 'Lembaga'
        ]);
    }

    public function layanan()
    {
        return view('web/blog-list', [
            'title' => 'Layanan'
        ]);
    }

    public function inventaris()
    {
        return view('web/blog-list', [
            'title' => 'Inventaris'
        ]);
    }

    public function tausiyah()
    {
        return view('web/blog-list', [
            'title' => 'Tausiyah'
        ]);
    }

    public function agenda()
    {
        return view('web/blog-list', [
            'title' => 'Agenda'
        ]);
    }
}
