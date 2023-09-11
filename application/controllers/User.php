<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('transaksi'); // Memanggil helper yang dibuat
        $this->load->model('transaksi_model');
    }
    public function index()
    {
        $this->db->select('*')->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('layout/template', 'user_index', $data);
    }

    public function tambah()
    {
        $this->template->load('layout/template', 'user_tambah');
    }
    
    public function hapus($id){
        $where = array('id_user' => $id);
        $this->db->delete('user',$where);
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
                        <p>Berhasil menghapus akun ^_^ !</p>
                    </div>
                </div>
            </div>
        
        ');
            redirect('user');
    }

    public function edit($id){
        $this->db->select('*')->from('user');
        $this->db->where('id_user',$id);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('layout/template', 'user_edit', $data);
    }

    public function update(){
        $this->User_model->update();
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
                    <p>Berhasil melakukan edit akun ^_^ !</p>
                </div>
            </div>
        </div>
    
    ');
    redirect('user');
    }

    public function simpan()
    {
        $username = $this->input->post('username');

        // Check if the username or name already exists in the database
        $existingUser = $this->db->get_where('user', array('username' => $username))->row();

        if ($existingUser) {
            // Username already exists, handle the error (e.g., show an error message)
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
                    <p class="mb-2">Username Sudah digunakan :( </p>
                    
                </div>
                </div>
                </div>
                
                ');
                redirect('user/tambah');
            return;
        }

        $this->User_model->simpan();
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
                        <p>Berhasil menambahkan akun ^_^ !</p>
                    </div>
                </div>
            </div>
        
        ');
        redirect('user');
    }

    public function dashboard()
    {
        
        $data = hitungTransaksi($this->transaksi_model);
        $this->template->load('layout/template','dashboard',$data);
    }


}