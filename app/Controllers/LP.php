<?php
namespace App\Controllers;
use App\Models\LPModel;
use App\Models\HPModel;
use App\Models\JPModel;
use Dompdf\Dompdf;

class LP extends BaseController
{
    protected $LPModel;
    public function __construct()
    {
        $this->LPModel = new LPModel();
    }
    public function index()
    {
        $tampildata = $this->LPModel->joinToLaporanProduksi();
        $data = [
            'tampildata' => $tampildata,
        ];

        return view('LaporanProduksi/laporanproduksi', $data);
    }
    public function create()
    {
        $tampildata = $this->LPModel->joinToLaporanProduksi();
        $jadwalModel = new JPModel();
        $HPModel = new HPModel();
        $data = [
            'tampildata' => $tampildata,
            'jadwals' => $jadwalModel->findAll(),
            'hasil' => $HPModel->findAll(),
        ];
        return view('LaporanProduksi/create',$data);
    }
    public function simpan()
    {
        $this->LPModel->save([
            'bulan'  => $this->request->getVar('bulan'),
            'id_jadwal'  => $this->request->getVar('id_jadwal')
        
    ]);
    session()->setFlashdata('alert_success', 'Berhasil menginput Laporan');

        return redirect()->to('LP');
    }
public function export()
{
    $tampildata = $this->LPModel->joinToLaporanProduksi();
    $data = [
        'tampildata' => $tampildata
    ];
    
    $html = view('LaporanProduksi/export', $data);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream();
}
public function cetak()
{
    $tampildata = $this->LPModel->joinToLaporanProduksi();
    $data = [
        'tampildata' => $tampildata
    ];   
    return view('LaporanProduksi/cetak', $data);
}
}