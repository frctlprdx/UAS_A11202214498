<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    function __construct()
    {
        helper('number');
        helper('form');
    }
    
    public function index()
    {
        $transaksimodel = new TransaksiModel(); 
        $transaksi = $transaksimodel->findAll();
        $data['transaksi'] = $transaksi;
        
        return view('pages/Transaksi_view', $data);
    } 
		
		public function create($id){
			$transaksimodel = new TransaksiModel();

			$dataForm = [
				'username' => $this->request->getPost('username'),
				'total_harga' => $this->request->getPost('harga'),
				'ongkir' => $this->request->getPost('ongkir'),
				'status' => $this->request->getPost('status'),
				'created_date' => $this->request->getPost('tanggal'),
			];
			
			$transaksi = $transaksimodel->update($id, $dataForm);
			
			return redirect('transaksi')->with('success','Data Berhasil Diubah');
		}
		
		public function delete($id){
			$transaksimodel = new TransaksiModel();
			$transaksi = $transaksimodel->delete($id);
			return redirect('transaksi')->with('success','Data Berhasil Dihapus');
			
		}
}