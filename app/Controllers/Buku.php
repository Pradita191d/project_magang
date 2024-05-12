<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }
    public function index()
    {
        //sama seperti select * from
        $buku = $this->bukuModel->findAll();

        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->bukuModel->getBuku()
        ];

        // //cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $buku = $db->query("SELECT * FROM buku");
        // //fetching
        // foreach($buku->getResultArray() as $row) {
        //     d($row); 
        // }

        return view('buku/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        //jika buku tidak ada di tabel
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' . $slug . ' tidak ditemukan.');
        }

        return view('buku/detail', $data);
    }

    public function tambah()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('buku/tambah', $data);
    }

    //untuk mengelola data yang dikirim supaya tersimpan pada tabel
    public function save()
    {
        if (!$this->validate([
            'judul' => 'required|is_unique[buku.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'uploaded[sampul]',
                'mime_in[sampul,image/jpg,image/jpeg,image/png]', // tambahkan aturan MIME untuk jenis file gambar yang diterima
                'max_size[sampul,1024]' // aturan untuk ukuran maksimum file dalam kilobita (KB), disini saya menggunakan 1024KB (1MB)
            ]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/buku/tambah')->withInput();
        }

        $file = $this->request->getFile('sampul');

        // Generate a unique name for the file to avoid overwriting existing files
        $namaSampul = $file->getName();

        // Move the uploaded file to the desired location
        $file->move(ROOTPATH . 'public/img', $namaSampul);

        //mengubah string jadi ramah url
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/buku');
    }


    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);
        unlink('img/' . $buku['sampul']);
        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/buku');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Buku',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug) // Menggunakan slug untuk mendapatkan data buku yang akan diedit
        ];

        return view('buku/edit', $data);
    }


    public function update($id)
    {
        // Cek judul
        $bukuLama = $this->bukuModel->find($id);
    
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_jdl = 'required';
        } else {
            $rule_jdl = 'required|is_unique[buku.judul]';
        }
    
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_jdl,
            ],
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'uploaded[sampul]',
                'mime_in[sampul,image/jpg,image/jpeg,image/png]', // tambahkan aturan MIME untuk jenis file gambar yang diterima
                'max_size[sampul,1024]' // aturan untuk ukuran maksimum file dalam kilobita (KB), disini saya menggunakan 1024KB (1MB)
            ]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/buku/edit/' . $this->request->getVar('slug'))->withInput();
        }
    
        $file = $this->request->getFile('sampul');
    
        // Generate a unique name for the file to avoid overwriting existing files
        $namaSampul = $file->getRandomName();
    
        // Move the uploaded file to the desired location
        $file->move(ROOTPATH . 'public/img', $namaSampul);
    
        // Hapus gambar sampul lama jika ada
        if (file_exists(ROOTPATH . 'public/img/' . $bukuLama['sampul'])) {
            unlink(ROOTPATH . 'public/img/' . $bukuLama['sampul']);
        }
    
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul // Simpan nama file sampul baru
        ]);
    
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
    
        return redirect()->to('/buku');
    }
    
}
