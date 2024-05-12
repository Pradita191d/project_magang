<?php

namespace App\Controllers;

class Halaman extends BaseController
{
    public function index()
    {
        //untuk mengirimkan data supaya bisa berbeda tiap halaman
        $data = [
            'title'   => 'Home | Belajar CI',
        ];

        // return view('layout/header', $data)
        return view('halaman/home', $data);
        // . view('layout/footer');
    }

    public function about()
    {
        //supaya bisa berbeda antar halaman
        $data = [
            'title' => 'About Me | Belajar CI',
            'sedia' => ['Buku Kesehatan', 'Kalkulator BMI'],
        ];
        // return view('layout/header', $data)
        return view('halaman/about', $data);
        // . view('layout/footer');
    }

    public function contact()
    {
        //supaya bisa berbeda antar halaman
        $data = [
            'title' => 'Contact Us | Belajar CI',
            'alamat' =>
            [
                [
                    'tipe' => 'Cabang 1',
                    'alamat' => 'Jl. Malabar No.17',
                    'kota' => 'Cilacap'
                ],
                [
                    'tipe' => 'Cabang 2',
                    'alamat' => 'Jl. Kenangan No.20',
                    'kota' => 'Cilacap'
                ]
            ]
        ];

        return view('halaman/contact', $data);
    }
}
