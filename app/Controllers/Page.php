<?php 
namespace App\Controllers;

class Page extends BaseController
{
    public function about($nama = '')
    {
        echo "Halo, namaku $nama. Aku mahasiswa semester 4 di PNC, Program Studi D3-Teknik Informatika.";
    }

    public function contact()
    {
        echo "WhatssApp : 0895358061152";
        echo " | ";
        echo "Instagram : @praditaruriarr";
        echo " | ";
        echo "Facebook  : Praditaa";
    }

    public function faqs()
    {
        echo "Faqs page";
    }

    public function tos()
    {
        echo "Halaman Term of Service";
    }
}
