<div id="menghilang">
	<?php echo $this->session->flashdata('alert', true); ?>
</div>
<!--**********************************
			Content body start
		***********************************-->
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Form Input User</h4>
	</div>
	<div class="card-body">
		<div class="basic-form">
			<form action="<?= base_url('user/simpan') ?>" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Username</label>
						<input type="text" class="form-control" placeholder="Username" name="username" required>
					</div>
					<div class="form-group col-md-6">
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Nama" name="nama" required>
					</div>
					<div class="form-group col-md-6">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Level</label>
						<select name="level" id="inputState" class="form-control">
							<option selected="">Choose...</option>
							<option value="User">User</option value="">
							<option value="Admin">Admin</option>
						</select>
					</div>
				</div>
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
		</div>
	</div>
</div>
<!--**********************************
			Content body end
		***********************************-->