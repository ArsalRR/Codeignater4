<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\SupplierPembelianModel;

class Supplier extends BaseController
{
    protected SupplierModel $supplierModel;
    protected SupplierPembelianModel $supplierPembelianModel;
    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
        $this->supplierPembelianModel = new SupplierPembelianModel();
    }
    public function index()
    {
        $suppliers = $this->supplierModel->findAll();
        return view('Supplier_views/index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('Supplier_views/create');
    }

    public function store()
    {
        if ($this->request->is('post')) {
            $validate = $this->validate(
                ['kode_supplier' => 'required', 'nama' => 'required', 'no_hp' => 'required', 'alamat' => 'required'],
                ['kode_supplier' => ['required' => 'Kode Supplier harus diisi'], 'nama' => ['required' => 'Nama harus diisi'], 'no_hp' => ["required" => 'Nomer HP harus diisi'], 'alamat' => ["required" => 'Alamat harus diisi'],]
            );
            if (!$validate) {
                session()->setFlashdata($this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                $check = $this->supplierModel->where('kode_supplier', $this->request->getVar('kode_supplier'))->first();
                if ($check != null) {
                    session()->setFlashdata('alert_danger', 'Kode supplier sudah ada');
                    return redirect()->back()->withInput();
                } else {
                    $create = $this->supplierModel->insert([
                        'kode_supplier' => $this->request->getVar('kode_supplier'),
                        'nama' => $this->request->getVar('nama'),
                        'alamat' => $this->request->getVar('alamat'),
                        'no_hp' => $this->request->getVar('no_hp'),
                    ]);
                    if ($create) {
                        session()->setFlashdata('alert_success', 'Berhasil menambah supplier');
                        return redirect()->back();
                    } else {
                        session()->setFlashdata('alert_danger', 'Gagal menambah supplier');
                        return redirect()->back()->withInput();
                    }
                }
            }
        } else {
            return redirect()->back();
        }
    }

    public function edit(string $id)
    {
        $supplier = $this->supplierModel->find($id);
        if ($supplier != null) {
            return view('Supplier_views/edit', ['supplier' => $supplier]);
        } else {
            return redirect()->back();
        }
    }

    public function update(string $id)
    {
        if ($this->request->is('patch')) {
            $validate = $this->validate(
                ['kode_supplier' => 'required', 'nama' => 'required', 'no_hp' => 'required', 'alamat' => 'required'],
                ['kode_supplier' => ['required' => 'Kode Supplier harus diisi'], 'nama' => ['required' => 'Nama harus diisi'], 'no_hp' => ["required" => 'Nomer HP harus diisi'], 'alamat' => ["required" => 'Alamat harus diisi'],]
            );
            if (!$validate) {
                session()->setFlashdata($this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                $check = $this->supplierModel->find($id);
                if ($check == null) {
                    session()->setFlashdata('alert_danger', 'Data supplier tidak ada');
                    return redirect()->back()->withInput();
                } else {
                    $create = $this->supplierModel->update($id, [
                        'kode_supplier' => $this->request->getVar('kode_supplier') != $check['kode_supplier'] ? $this->request->getVar('kode_supplier') : $check['kode_supplier'],
                        'nama' => $this->request->getVar('nama'),
                        'alamat' => $this->request->getVar('alamat'),
                        'no_hp' => $this->request->getVar('no_hp'),
                    ]);
                    if ($create) {
                        session()->setFlashdata('alert_success', 'Berhasil mengupdate supplier');
                        return redirect()->back();
                    } else {
                        session()->setFlashdata('alert_danger', 'Gagal mengupdate supplier');
                        return redirect()->back()->withInput();
                    }
                }
            }
        } else {
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        if ($this->request->is('delete')) {
            $check = $this->supplierModel->find($id);
            if ($check == null) {
                session()->setFlashdata('alert_danger', 'Data supplier tidak ada');
                return redirect()->back()->withInput();
            } else {
                $delete = $this->supplierModel->delete($id);
                if ($delete) {
                    session()->setFlashdata('alert_success', 'Berhasil menghapus supplier');
                    return redirect()->back();
                } else {
                    session()->setFlashdata('alert_danger', 'Gagal menghapus supplier');
                    return redirect()->back()->withInput();
                }
            }
        }
    }
    /**
     * SUPPLIER PEMBELIAN ROUTE CONTROLLER
     */

    public function pembelian($id = null)
    {
        if ($this->request->is('post')) {
            $validate = $this->validate(
                [
                    'id_supplier' => 'required',
                    'nama_bahan' => 'required',
                    'jumlah' => 'required',
                    'tgl_masuk' => 'required',
                    'harga_satuan' => 'required',
                ],
                [
                    'id_supplier' => [
                        'required' => "Supplier tidak boleh kosong"
                    ],
                    'nama_bahan' => [
                        'required' => "Nama barang tidak boleh kosong"
                    ],
                    'jumlah' => [
                        'required' => "Jumlah tidak boleh kosong"
                    ],
                    'tgl_masuk' => [
                        'required' => "Tanggal Masuk tidak boleh kosong"
                    ],
                    'harga_satuan' => [
                        'required' => "Harga satuan tidak boleh kosong"
                    ],
                ]
            );

            if (!$validate) {
                session()->setFlashdata($this->validator->getErrors());
                return redirect()->to('/supplier/create_pembelian_supplier')->withInput();
            } else {
                $create = $this->supplierPembelianModel->insert([
                    'id_supplier' => $this->request->getVar('id_supplier'),
                    'nama_bahan' => $this->request->getVar('nama_bahan'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                    'harga_satuan' => $this->request->getVar('harga_satuan'),
                    'total_harga' => (int) $this->request->getVar('jumlah') * (int) $this->request->getVar('harga_satuan'),
                ]);
                if ($create) {
                    session()->setFlashdata('alert_success', 'Berhasil menambah pembelian');
                    return redirect()->to('/supplier/create_pembelian_supplier');
                } else {
                    session()->setFlashdata('alert_danger', 'Gagal menambah pembelian');
                    return redirect()->to('/supplier/create_pembelian_supplier')->withInput();
                }
            }
        } else if ($this->request->is('delete')) {
            $check = $this->supplierPembelianModel->find($id);
            if ($check == null) {
                session()->setFlashdata('alert_danger', 'Data pembelian tidak ada');
                return redirect()->back()->withInput();
            } else {
                $delete = $this->supplierPembelianModel->delete($id);
                if ($delete) {
                    session()->setFlashdata('alert_success', 'Berhasil menghapus pembelian');
                    return redirect()->back();
                } else {
                    session()->setFlashdata('alert_danger', 'Gagal menghapus pembelian');
                    return redirect()->back()->withInput();
                }
            }
        } else if ($this->request->is('patch')) {
            $validate = $this->validate(
                [
                    'id_supplier' => 'required',
                    'nama_bahan' => 'required',
                    'jumlah' => 'required',
                    'tgl_masuk' => 'required',
                    'harga_satuan' => 'required',
                ],
                [
                    'id_supplier' => [
                        'required' => "Supplier tidak boleh kosong"
                    ],
                    'nama_bahan' => [
                        'required' => "Nama barang tidak boleh kosong"
                    ],
                    'jumlah' => [
                        'required' => "Jumlah tidak boleh kosong"
                    ],
                    'tgl_masuk' => [
                        'required' => "Tanggal Masuk tidak boleh kosong"
                    ],
                    'harga_satuan' => [
                        'required' => "Harga satuan tidak boleh kosong"
                    ],
                ]
            );

            if (!$validate) {
                session()->setFlashdata($this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                $update = $this->supplierPembelianModel->update($id, [
                    'id_supplier' => $this->request->getVar('id_supplier'),
                    'nama_bahan' => $this->request->getVar('nama_bahan'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                    'harga_satuan' => $this->request->getVar('harga_satuan'),
                    'total_harga' => (int) $this->request->getVar('jumlah') * (int) $this->request->getVar('harga_satuan'),
                ]);
                if ($update) {
                    session()->setFlashdata('alert_success', 'Berhasil mengupdate pembelian');
                    return redirect()->back();
                } else {
                    session()->setFlashdata('alert_danger', 'Gagal mengupdate pembelian');
                    return redirect()->back()->withInput();
                }
            }
        } else {
            $pembelians = $this->supplierPembelianModel->join('supplier', 'data_pembelian_supplier.id_supplier=supplier.id')->select('data_pembelian_supplier.*,supplier.nama as nama_supplier')->findAll();
            return view('Supplier_views/pembelian/index', ['pembelians' => $pembelians]);
        }
    }
    public function create_pembelian_supplier()
    {
        $suppliers = $this->supplierModel->findAll();
        return view('Supplier_views/pembelian/create', ['suppliers' => $suppliers]);
    }
    public function edit_pembelian_supplier($id)
    {
        $suppliers = $this->supplierModel->findAll();
        $pembelian = $this->supplierPembelianModel->find($id);
        return view('Supplier_views/pembelian/edit', ['suppliers' => $suppliers, 'pembelian' => $pembelian]);
    }

    public function laporan()
    {
        $tanggal_awal = $this->request->getVar('tanggal_awal') ?? date("Y-m-d");
        $tanggal_akhir = $this->request->getVar('tanggal_akhir') ?? date("Y-m-d");
        if ($tanggal_awal != $tanggal_akhir) {
            $pembelians = $this->supplierPembelianModel->join('supplier', 'data_pembelian_supplier.id_supplier=supplier.id')->select('data_pembelian_supplier.*,supplier.nama as nama_supplier')->where('tgl_masuk BETWEEN "' . date('Y-m-d', strtotime($tanggal_awal)) . '" AND "' . date('Y-m-d', strtotime($tanggal_akhir)) . '"')->findAll();
        } else {
            $pembelians = $this->supplierPembelianModel->join('supplier', 'data_pembelian_supplier.id_supplier=supplier.id')->select('data_pembelian_supplier.*,supplier.nama as nama_supplier')->findAll();
        }
        return view("Supplier_views/laporan", ['pembelians' => $pembelians, 'tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir, 'isFilter' => $tanggal_awal != $tanggal_akhir]);
    }
    public function laporan_print()
    {
        $tanggal_awal = $this->request->getVar('tanggal_awal') ?? date("Y-m-d");
        $tanggal_akhir = $this->request->getVar('tanggal_akhir') ?? date("Y-m-d");
        if ($tanggal_awal != $tanggal_akhir) {
            $pembelians = $this->supplierPembelianModel->join('supplier', 'data_pembelian_supplier.id_supplier=supplier.id')->select('data_pembelian_supplier.*,supplier.nama as nama_supplier')->where('tgl_masuk BETWEEN "' . date('Y-m-d', strtotime($tanggal_awal)) . '" AND "' . date('Y-m-d', strtotime($tanggal_akhir)) . '"')->findAll();
        } else {
            $pembelians = $this->supplierPembelianModel->join('supplier', 'data_pembelian_supplier.id_supplier=supplier.id')->select('data_pembelian_supplier.*,supplier.nama as nama_supplier')->findAll();
        }
        $mpdf = new \Mpdf\Mpdf();
        $html = view("pdf/laporan_supplier/print", ['pembelians' => $pembelians, 'tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir, 'isFilter' => $tanggal_awal != $tanggal_akhir]);
        $stylesheet = file_get_contents('kv-mpdf-bootstrap.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output(date("Y-m-d") . '.' . 'pdf', 'I');
    }
}
