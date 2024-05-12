<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() : string
    {
        return view('welcome_message');
        // echo "Hello World!";
        //akan memanggil file welcome_message di dalam folder view
    }

    public function coba()
    {
        echo $this->nama;
    }
}
