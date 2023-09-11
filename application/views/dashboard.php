<!--**********************************
            Content body start
        ***********************************-->
<div id="menghilang">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?php echo $this->session->flashdata('alert', true); ?>
</div>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hai, Selamat Datang ^_^</h4>
            <p class="mb-0">ini adalah websit kas buku</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
        </ol>
    </div>
</div>

<!-- <div class="col-lg-12"> -->

<div class="card">
    <div class="card-header">
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
                            <form action="<?= base_url('PdfController'); ?>" target="_blank"  method="post">
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
        <h4 class="card-title ">Total Semua Pemasukan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">HARI INI</th>
                        <th scope="col">BULAN INI</th>
                        <th scope="col">TOTAL PEMASUKAN</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <?= 'Rp ' . number_format($today_pemasukan, 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= 'Rp ' . number_format($this->transaksi_model->pemasukan_bulan_ini(), 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= 'Rp ' . number_format($total_pemasukan, 0, ',', '.') ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- </div> -->
<div class="card">
    <div class="card-header">
        <h4 class="card-title ">Total Semua Pengeluaran</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">HARI INI</th>
                        <th scope="col">BULAN INI</th>
                        <th scope="col">TOTAL PENGELUARAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <?= 'Rp ' . number_format($today_pengeluaran, 0, ',', '.') ?>
                        </th>
                        <td>
                            <?= 'Rp ' . number_format($this->transaksi_model->pengeluaran_bulan_ini(), 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= 'Rp ' . number_format($total_pengeluaran, 0, ',', '.') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title ">Total Saldo Yang Tersisa</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col" class="text-center">SALDO AKHIR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                        <?= 'Rp ' . number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.') ?> <!-- Hitung saldo akhir -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
***********************************-->