<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->model('transaksi_model');
  }

	public function index()
	{
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->getTransaksiByDateRange($tanggal_awal, $tanggal_akhir);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "lapora-transaksi.pdf";
		$this->pdf->load_view('laporan_transaksi', $data);
	}

	public function pemasukan() {
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->getTransaksiByDateRange($tanggal_awal, $tanggal_akhir);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-pemasukan.pdf";
		$this->pdf->load_view('laporan_pemasukan', $data);
	
	}
	public function pengeluaran() {
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->getTransaksiByDateRange($tanggal_awal, $tanggal_akhir);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-pengeluaran.pdf";
		$this->pdf->load_view('laporan_pengeluaran', $data);
	
	}
}
