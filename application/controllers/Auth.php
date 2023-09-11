<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->load->view('user_login');
	}

    public function login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Retrieve user data from the database based on the provided username
    $user = $this->db->get_where('user', array('username' => $username))->row();

    if ($user) {
        // Verify the provided password with the hashed password from the database
        if (password_verify($password, $user->password)) {
            // Password is correct, set user data in session or authenticate the user
            $this->session->set_userdata('id_user', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('nama', $user->nama);
            $this->session->set_userdata('level', $user->level);
            $this->session->set_userdata('Logged', true);

            // Redirect to the appropriate dashboard based on the user level
            if ($user->level == 'Admin') {
                $this->session->set_flashdata('success', 'Login successful.');
                redirect('user/dashboard');
            } elseif ($user->level == 'User') {
                $this->session->set_flashdata('success', 'Login successful.');
                redirect('user/dashboard');
            } else {
                // Handle unrecognized user level, redirect to a default page or show an error message
                $this->session->set_flashdata('error', 'Unrecognized user level.');
                redirect('dashboard');
            }
        } else {
            // Password is incorrect, handle the error (e.g., show an error message)
            $this->session->set_flashdata('error', 'User not found or incorrect password.');
            redirect('auth');
        }
    } else {
        // User not found, handle the error (e.g., show an error message)
         $this->session->set_flashdata('error', 'User not found or incorrect password.');;
        redirect('auth');
    }
}
public function logout()
{
    // Hapus semua data sesi pengguna
    
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('level');
    $this->session->unset_userdata('Logged');

    // Hapus semua data sesi (opsional, tergantung pada kebutuhan aplikasi Anda)
    $this->session->sess_destroy();
    // Redirect ke halaman login atau halaman utama setelah logout
    redirect('home');
    $this->session->set_flashdata('success', 'Logout successful.');
}



}
