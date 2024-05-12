<?php

namespace App\Controllers\Admin; //karena di dalam folder Admin

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo "Ini controller Users method index di folder/namespace Admin";
    }
}
