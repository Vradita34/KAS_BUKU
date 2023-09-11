<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
	}
	public function index()
	{
		// Cek apakah sesi username telah diatur
		if (!isset($_SESSION['username'])) {
			// Jika tidak ada sesi username, arahkan pengguna ke halaman lain atau tampilkan pesan
			echo "Anda harus masuk terlebih dahulu untuk mengakses halaman ini.";
			$this->session->set_flashdata('alert', '
				
						<div class="alert alert-warning left-icon-big alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
							</button>
							<div class="media">
								<div class="alert-left-icon-big">
									<span><i class="mdi mdi-check-circle-outline"></i></span>
								</div>
								<div class="media-body">
									<h5 class="mt-1 mb-1">Congratulations!</h5>
									<p>Maaf anda tidak dapat mengakses halaman ini, Silahkan melakukan login terlebih dahulu  ~_^ !</p>
								</div>
							</div>
						</div>
					
					');
			redirect('home'); // Pastikan Anda mengganti dengan alamat URL login yang sesuai
			return;
		}
		$this->db->select('*')->from('transaksi');
		$this->db->where('jenis_transaksi', 'Pemasukan'); // Filter jenis transaksi
		$this->db->order_by('date', 'ASC');
		$ajg = $this->db->get()->result_array();
		$data = array('pemasukan' => $ajg);
		$this->template->load('layout/template', 'pemasukan', $data);
	}

	public function tambah()
	{
		// Cek apakah sesi username telah diatur
		if (!isset($_SESSION['username'])) {
			// Jika tidak ada sesi username, arahkan pengguna ke halaman lain atau tampilkan pesan
			echo "Anda harus masuk terlebih dahulu untuk mengakses halaman ini.";
			$this->session->set_flashdata('alert', '
        
				<div class="alert alert-warning left-icon-big alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
					</button>
					<div class="media">
						<div class="alert-left-icon-big">
							<span><i class="mdi mdi-check-circle-outline"></i></span>
						</div>
						<div class="media-body">
							<h5 class="mt-1 mb-1">Congratulations!</h5>
							<p>Maaf anda tidak dapat mengakses halaman ini, Silahkan melakukan login terlebih dahulu  ~_^ !</p>
						</div>
					</div>
				</div>
			
			');
			redirect('home'); // Pastikan Anda mengganti dengan alamat URL login yang sesuai
			return;
		}
		$this->template->load('layout/template', 'pemasukan_tambah');
	}

	public function simpan()
	{
		// Ambil data dari form input
		$keterangan = $this->input->post('keterangan');
		$nominal = $this->input->post('nominal');
		$username = $this->input->post('username');
		$tanggal = $this->input->post('tanggal');

		// Format tanggal dan jam sesuai dengan basis data MySQL (YYYY-MM-DD HH:MM:SS)
		//  $tanggal = date('Y-m-d H:i:s');

		// Ambil data username dari session user yang sedang login
		$username = $this->session->userdata('username');

		// Menyusun data untuk dimasukkan ke tabel transaksi
		$data = array(
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'username' => $username,
			'jenis_transaksi' => 'Pemasukan',
			'date' => $tanggal
		);

		// Memanggil fungsi model untuk menambahkan data
		$id_transaksi = $this->transaksi_model->tambahTransaksi($data);

		if ($id_transaksi) {
			// Berhasil ditambahkan, lakukan sesuatu (misalnya, tampilkan pesan sukses)
			$this->session->set_flashdata('alert', '
        
			  <div class="alert alert-success left-icon-big alert-dismissible fade show">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
				  </button>
				  <div class="media">
					  <div class="alert-left-icon-big">
						  <span><i class="mdi mdi-check-circle-outline"></i></span>
					  </div>
					  <div class="media-body">
						  <h5 class="mt-1 mb-1">Congratulations!</h5>
						  <p>Berhasil menambah data pemasukan ^_^ !</p>
					  </div>
				  </div>
			  </div>
		  
		  ');
			redirect('pemasukan');
		} else {
			// Gagal menambahkan, tampilkan pesan error
			$this->session->set_flashdata('alert', '
            
			  <div class="alert alert-warning left-icon-big alert-dismissible fade show">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
			  </button>
			  <div class="media">
				  <div class="alert-left-icon-big">
					  <span><i class="mdi mdi-help-circle-outline"></i></span>
				  </div>
				  <div class="media-body">
					  <h5 class="mt-1 mb-1">Pending!</h5>
					  <p class="mb-2">gagal menambah data pemasukan:( </p>
					  
				  </div>
				  </div>
				  </div>
				  
				  ');
			redirect('pengeluaran');
		}
	}

	public function hapus($id)
	{


		// Periksa apakah pengguna memiliki izin untuk menghapus transaksi
		if ($trx_info['username'] == $current_user_username || $current_user_level == 'Admin') {

			$where = array('id_transaksi' => $id);
			$this->db->delete('transaksi', $where);
			$this->session->set_flashdata('alert', '
				
					<div class="alert alert-success left-icon-big alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
						</button>
						<div class="media">
							<div class="alert-left-icon-big">
								<span><i class="mdi mdi-check-circle-outline"></i></span>
							</div>
							<div class="media-body">
								<h5 class="mt-1 mb-1">Congratulations!</h5>
								<p>Berhasil menghapus data pemasukan ^_^ !</p>
							</div>
						</div>
					</div>
				
				');
			redirect('pemasukan');
		} else {
			// Tampilkan pesan bahwa pengguna tidak memiliki izin untuk menghapus transaksi ini
			// ...
			$this->session->set_flashdata('alert', 'maaf anda tidak dapat menghapus data yang bukan milik anda');
		}

	}

	public function modal_print()
	{
		$this->load->view('modal_view');
	}
}