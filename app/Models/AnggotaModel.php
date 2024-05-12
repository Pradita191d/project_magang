<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_induk', 'nama'];
}
