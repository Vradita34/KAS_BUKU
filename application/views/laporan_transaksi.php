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
		<th>Pemasukan</th>
		<th>Pengeluaran</th>
		<th>Nominal</th>
	</tr>
	<?php 
	$no = 1;
    $totalPemasukan = 0;
    $totalPengeluaran = 0;
    $saldo = 0;
	foreach($transaksi as $row)
	{
        if ($row->jenis_transaksi == 'Pemasukan') {
            $totalPemasukan += $row->nominal;
            $saldo += $row->nominal;
        } elseif ($row->jenis_transaksi == 'Pengeluaran') {
            $totalPengeluaran += $row->nominal;
            $saldo -= $row->nominal;
        }
        ?>
		<tr>
            <td><?php echo $no++; ?></td>
			<td><?php echo date($row->date); ?></td>
			<td><?php echo $row->jenis_transaksi; ?></td>
			<td><?php echo $row->keterangan; ?></td>
			<td><?php echo $row->jenis_transaksi == 'Pemasukan' ? 'Rp ' . number_format($row->nominal, 0, ',', '.') : ''; ?></td>
			<td><?php echo $row->jenis_transaksi == 'Pengeluaran' ? 'Rp ' . number_format($row->nominal, 0, ',', '.') : ''; ?></td>
			<td><?php echo 'Rp ' . number_format($saldo, 0, ',', '.'); ?></td>
		</tr>
		<?php
	}
	?>
    <tr>
        <td colspan="4">Total</td>
        <td><?php echo 'Rp ' . number_format($totalPemasukan, 0, ',', '.'); ?></td>
        <td><?php echo 'Rp ' . number_format($totalPengeluaran, 0, ',', '.'); ?></td>
        <td><?php echo 'Rp ' . number_format($saldo, 0, ',', '.'); ?></td>
    </tr>
</table>
