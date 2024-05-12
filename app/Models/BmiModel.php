<?php

namespace App\Models;

use CodeIgniter\Model;

class BmiModel extends Model
{
    public function calculateBMI($weight, $height)
    {
        // Validasi input
        if (!is_numeric($weight) || !is_numeric($height) || $height == 0) {
            return false;
        }

        // Hitung BMI
        $bmi = $weight / pow($height / 100, 2);

        return $bmi;
    }
}
