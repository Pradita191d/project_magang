<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;
    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }
    public function index()
    {
        //sama seperti select * from
        $anggota = $this->anggotaModel->findAll();

        $data = [
            'title' => 'Daftar Anggota',
            'anggota' => $anggota
        ];

        return view('anggota/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Anggota',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('anggota/tambah', $data);
    }

    public function save()
    {
        $no_induk = $this->request->getVar('no_induk');

        // Check if no_induk already exists
        if ($this->anggotaModel->where('no_induk', $no_induk)->countAllResults() > 0) {
            session()->setFlashdata('pesan', 'No Induk sudah ada.');
            return redirect()->to('/anggota/tambah')->withInput();
        }

        // If not, continue with saving the data
        if (!$this->validate([
            'no_induk' => 'required|is_unique[anggota.no_induk]',
            'nama' => 'required'
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/anggota/tambah')->withInput();
        }

        $this->anggotaModel->save([
            'no_induk' => $no_induk,
            'nama' => $this->request->getVar('nama'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/anggota');
    }


    public function delete($id)
    {
        $this->anggotaModel->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/anggota');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Anggota',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'anggota' => $this->anggotaModel->find($id) // Menggunakan find untuk mendapatkan data anggota berdasarkan ID
        ];

        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        $anggotaLama = $this->anggotaModel->find($id);
        $no_induk_lama = $anggotaLama['no_induk'];

        // Validasi nomor induk baru
        if ($no_induk_lama != $this->request->getVar('no_induk')) {
            $rule_no = 'required|is_unique[anggota.no_induk]';
        } else {
            $rule_no = 'required';
        }

        if (!$this->validate([
            'no_induk' => [
                'rules' => $rule_no,
            ],
            'nama' => 'required'
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->back()->withInput();
        }

        $this->anggotaModel->update($id, [
            'no_induk' => $this->request->getVar('no_induk'),
            'nama' => $this->request->getVar('nama'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/anggota');
    }
}
