<!--**********************************
            Content body start
        ***********************************-->

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hai, Selamat Datang ^_^ </h4>
            <p class="mb-0">ini adalah websit kas buku karang taruna</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengeluaran</a></li>
        </ol>
    </div>
</div>
<div id="menghilang">
    <?php echo $this->session->flashdata('alert', true); ?>
</div>
<div class="card">
    <a href="<?= base_url('pengeluaran/tambah'); ?>">
        <button type="button" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i
                    class="fa fa-plus color-info"></i>
            </span>Tambah Pengeluaran</button>
    </a>
    <div class="card-header">
        <h4 class="card-title">Data Pengeluaran</h4>
        <button type="button" id="openModal" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Detail laporan
        </button>
        <!-- Button trigger modal -->
        <div class="modal fade show" id="myModal" class="modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">laporan</h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <h1>×</h1>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <?php echo form_close(); ?>
                            <form action="<?= base_url('PdfController/pengeluaran'); ?>" target="_blank"  method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Tanggal Awal</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" placeholder="col-form-label" name="tanggal_awal">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Tanggal Akhir</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" placeholder="col-form-label" name="tanggal_akhir">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Generate PDF</button>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Jenis Transaksi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    // Ambil informasi pengguna dari sesi atau sistem autentikasi
                    $current_user_username = $_SESSION['username']; 
                    $current_user_level = $_SESSION['level'];
                    foreach ($pengeluaran as $HH): ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $HH['username']; ?>
                            </td>
                            <td>
                                <?= $HH['keterangan']; ?>
                            </td>
                            <td>
                                <?= 'Rp ' . number_format($HH['nominal'], 0, ',', '.'); ?>
                            </td>
                            <td>
                                <?= $HH['jenis_transaksi']; ?>
                            </td>
                            <td>
                                <?= date('d F Y', strtotime($HH['date'])); ?>
                            </td>
                            <td>
                                <?php if ($HH['username'] == $current_user_username || $current_user_level == 'Admin'): ?>
                                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        href="<?= base_url('pemasukan/hapus/' . $HH['id_transaksi']); ?>">
                                        <button type="button" class="btn btn-danger">Remove <span class="btn-icon-right"><i
                                                    class="fa fa-trash"></i></span></button>
                                    </a>
                                <?php else: ?>
                                    <!-- Tampilkan pesan atau aksi lain sesuai kebutuhan jika pengguna bukan pembuat transaksi -->
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>