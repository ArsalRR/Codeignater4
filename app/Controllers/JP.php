<?php
namespace App\Controllers;

use App\Models\JPModel;

class JP extends BaseController
{
    private $JPModel;
    public function __construct()
    {
        $this->JPModel = new JPModel();
    }
    public function index()
    {
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            redirect()->to('/JP/index');
        } else {
            $cari = session()->get('cari_judul');
        }

        $dataproduksi = $cari ? $this->JPModel->cariData($cari)->paginate(5, 'jadwal_produksi') : $this->JPModel->paginate(5, 'jadwal_produksi');
        $nohalaman = nomor($this->request->getVar('page_jadwal_produksi'), 5);


        $data = [
            'tampildata' => $dataproduksi,
            'pager' => $this->JPModel->pager,
            'nohalaman' => $nohalaman,
        ];
        return view('JadwalProduksi/jadwal', $data);
    }
    public function create()
    {

        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('JadwalProduksi/create', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required|is_unique[jadwal_produksi.nama_produk]',
                'errors' => [
                    'required' => 'Nama Produk nama harus di isi.',
                    'is_unique' => 'Nama Produk nama sudah terdaftar'
                ]
            ],
            'tgl_ml_pd' => [
                'rules' => 'required|is_unique[jadwal_produksi.tgl_ml_pd]',
                'errors' => [
                    'required' => 'Tanggal Mulai  harus di isi.',
                ]
                
                ],
                'tgl_sl_pd' => [
                    'rules' => 'required|is_unique[jadwal_produksi.tgl_sl_pd]',
                    'errors' => [
                        'required' => 'Tanggal Selesai  harus di isi.',
                    ]
                    
                    ],
    

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/JP/create')->withInput()->with('validation', $validation->getErrors());
        }
    
        $slug = url_title($this->request->getVar('nama_produk'), '-', true);

        $this->JPModel->save([
            'nama_produk'     => $this->request->getVar('nama_produk'),
            'slug'      => $slug,
            'tgl_ml_pd'   => $this->request->getVar('tgl_ml_pd'),
            'tgl_sl_pd'  => $this->request->getVar('tgl_sl_pd')
        ]);
        session()->setFlashdata('berhasil', 'Berhasil menambah Produk');

        return redirect()->to('/JP');
    }
    public function delete($id)
    {
        $this->JPModel->delete($id);
        return redirect()->back();
    }
    public function update($id)
    {
        
        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->JPModel->save([
            'id'        => $id,
            'nama_produk'     => $this->request->getVar('nama_produk'),
            'slug'      => $slug,
            'tgl_ml_pd'   => $this->request->getVar('tgl_ml_pd'),
            'tgl_sl_pd'  => $this->request->getVar('tgl_sl_pd')
        ]);

        session()->setFlashdata('berhasil', 'Berhasil Mengupdate');
        return redirect()->to('/JP');
    }
    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'produksi' => $this->JPModel->getProduksi($slug)
        ];

        return view('JadwalProduksi/edit', $data);
    }
    public function Dasbor()
    {
       return view('pager/dasbor');
    }
}
