
<!--**********************************
Content body start
***********************************-->
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, Monnggo Silakan!</h4>
            <span class="ml-1">Data User</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data User</a></li>
        </ol>
    </div>
</div>
<div id="menghilang">
    <?php echo $this->session->flashdata('alert',true); ?>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <a href="<?= base_url('user/tambah'); ?>">
                <button type="button" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i
                            class="fa fa-plus color-info"></i>
                    </span>Tambah User</button>
            </a>
            <div class="card-header">
                <h4 class="card-title">Data User</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div class="dataTables_length" id="example_length"><label>Show <select name="example_length"
                                    aria-controls="example" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                        <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class=""
                                    placeholder="" aria-controls="example"></label></div>
                        <table id="example" class="display dataTable" style="min-width: 845px" role="grid"
                            aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 5px;">#No</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 157.094px;">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending"
                                        style="width: 157.094px;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending"
                                        style="width: 119.172px;">Level</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Salary: activate to sort column ascending" style="width: 157.094px">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $aa) { ?>
                                    <tr class="odd" role="row">
                                        <td>
                                            <?= $no; ?>
                                        </td>
                                        <td class="sorting_1">
                                            <?= $aa['username'] ?>
                                        </td>
                                        <td>
                                            <?= $aa['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $aa['level'] ?>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('apakah kanu ingin menghapus data ini')" 
                                            href="<?= base_url('user/hapus/'.$aa['id_user']); ?>">
                                                <button type="button" class="btn btn-danger">Remove <span
                                                        class="btn-icon-right"><i class="fa fa-trash"></i></span>
                                                </button>
                                            </a>
                                            <br>
                                            <br>
                                            <a  href="<?= base_url('user/edit/'.$aa['id_user']); ?>">
                                                <button type="button" class="btn btn-warning">Edit<span
                                                        class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->