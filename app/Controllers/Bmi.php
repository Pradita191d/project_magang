<?php

namespace App\Controllers;

use App\Models\BmiModel;

class Bmi extends BaseController
{
    public function index()
    {
        $data['title'] = 'Kalkulator BMI';
        return view('bmi/index', $data);
    }

    public function calculate()
    {
        $weight = $this->request->getPost('weight');
        $height = $this->request->getPost('height');

        // Load model BMI
        $bmiModel = new BmiModel();

        // Hitung BMI
        $bmi = $bmiModel->calculateBMI($weight, $height);

        if ($bmi === false) {
            return redirect()->back()->withInput()->with('error', 'Input tidak valid. Pastikan berat dan tinggi badan valid.');
        }

        $data['title'] = 'Hasil BMI';

        // Tampilkan hasil
        return view('bmi/bmi_result', ['bmi' => $bmi, 'title' => $data['title']]);
    }
}
