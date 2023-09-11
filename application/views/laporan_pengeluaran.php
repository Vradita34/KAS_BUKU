<!-- ... Bagian kode sebelumnya ... -->
<center>
    <div>
        <h2>Data laporan Keuangan</h2>
        <p>Karang Taruna Mitra Remaja</p>
    </div>
</center>
<hr/>
<table border="1" width="100%" style="text-align:center;">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jenis Transaksi</th>
        <th>Keterangan</th>
        <th>Nominal</th>
    </tr>
    <?php 
    $no = 1;
    $totalPemasukan = 0;
    $saldo = 0;
    foreach($transaksi as $row) {
        if ($row->jenis_transaksi == 'Pengeluaran') { // Memeriksa jenis transaksi
            $totalPemasukan += $row->nominal; // Menambahkan nominal ke total pemasukan
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d F Y', strtotime($row->date)); ?></td>
                <td><?php echo $row->jenis_transaksi; ?></td>
                <td><?php echo $row->keterangan; ?></td>
                <td><?php echo 'Rp ' . number_format($row->nominal, 0, ',', '.'); ?></td>
            </tr>
            <?php
        }
    }
    ?>
    <tr>
        <td colspan="4">Total</td>
        <td><?php echo 'Rp ' . number_format($totalPemasukan, 0, ',', '.'); ?></td>
    </tr>
</table>

<!-- ... Bagian kode setelahnya ... -->
