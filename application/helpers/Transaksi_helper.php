
<?php
function hitungTransaksi($transaksi_model)
{

    $today_pemasukan = $transaksi_model->hitungTotal('Pemasukan', date('Y-m-d'));
    $today_pengeluaran = $transaksi_model->hitungTotal('Pengeluaran', date('Y-m-d'));

    $month_pemasukan = $transaksi_model->hitungTotal('Pemasukan', date('Y-m'));
    $month_pengeluaran = $transaksi_model->hitungTotal('Pengeluaran', date('Y-m'));

    $total_pemasukan = $transaksi_model->hitungTotal('Pemasukan');
    $total_pengeluaran = $transaksi_model->hitungTotal('Pengeluaran');

    $data = array(
        'today_pemasukan' => $today_pemasukan,
        'today_pengeluaran' => $today_pengeluaran,
        'month_pemasukan' => $month_pemasukan,
        'month_pengeluaran' => $month_pengeluaran,
        'total_pemasukan' => $total_pemasukan,
        'total_pengeluaran' => $total_pengeluaran
    );

    return $data;
}


?>