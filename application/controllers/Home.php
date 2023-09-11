<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('transaksi'); // Memanggil helper yang dibuat
        $this->load->model('transaksi_model');
    }
	public function index()
	{
       // Hitung total pemasukan dan pengeluaran hari ini
	   $data = hitungTransaksi($this->transaksi_model);

		$this->template->load('layout/template','dashboard',$data);
	}
}
