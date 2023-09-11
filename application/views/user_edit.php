<div id="menghilang">
	<?php echo $this->session->flashdata('alert', true); ?>
</div>
<!--**********************************
Content body start
***********************************-->
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Edit User</h4>
	</div>
	<div class="card-body">
        <div class="basic-form">
            <?php foreach($user as $hehe ) { ?>
			<form action="<?= base_url('user/update') ?>" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Username</label>
						<input type="text" class="form-control" placeholder="Username" name="username" value="<?= $hehe['username'] ?>"  required readonly>
					</div>
					<div class="form-group col-md-6">
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $hehe['nama'] ?>"  required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Level</label>
						<select name="level" id="inputState" class="form-control">
							<option selected="">Choose...</option>
							<option value="User" <?php if($hehe['level'] == 'User'){ echo "selected"; } ?> >User</option value="">
							<option value="Admin"  <?php if($hehe['level'] == 'Admin'){ echo "selected"; } ?>  >Admin</option>
						</select>
					</div>
				</div>
                <input type="hidden" name="id_user"  value="<?= $hehe['id_user'] ?>" >
				<div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
						<label class="form-check-label">
                            Check me out
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
            <?php } ?>
		</div>
	</div>
</div>
<!--**********************************
			Content body end
		***********************************-->