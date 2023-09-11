<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function simpan(){
        
    
        // Generate a secure password hash using bcrypt
        $password = $this->input->post('password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
       // If both username and name are unique, proceed to save the data with the hashed password
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $hashedPassword,
            'nama' => $this->input->post('level'),
            'level' => $this->input->post('level')
        );
        $this->db->insert('user', $data);
    

    }
    public function update(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level')
        );
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->update('user',$data,$where);
    }

}
