<?php
class Transaksi_model extends CI_Model {
    // ...

    public function tambahTransaksi($data) {
        // Masukkan data ke tabel transaksi
        $this->db->insert('transaksi', $data);

        // Ambil ID transaksi yang baru saja dimasukkan
        $id_transaksi = $this->db->insert_id();

        return $id_transaksi;
    }

    public function getTransaksi() {
        $query = $this->db->get('transaksi'); // Ambil semua data dari tabel transaksi
        return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
    }

    public function hitungTotal($jenis, $tanggal = null) {
        $this->db->select_sum('nominal');
        $this->db->where('jenis_transaksi', $jenis);
        if ($tanggal !== null) {
            $this->db->where('DATE(date)', $tanggal);
        }
        $query = $this->db->get('transaksi');
        return $query->row()->nominal;
    }

    function pengeluaran_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pengeluaran');
        $this->db->where("DATE_FORMAT(date,'%Y-%m')",$tanggal);
        return $this->db->get()->row()->total;
    }
    function pemasukan_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
        $this->db->where("DATE_FORMAT(date,'%Y-%m')",$tanggal);
        return $this->db->get()->row()->total;
    }

    public function getTransaksiByDateRange($start_date, $end_date) {
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $query = $this->db->get('transaksi'); // Ganti dengan nama tabel yang sesuai
        return $query->result();
    }


    
}
