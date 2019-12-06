<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo base_url('admin/UbahUser/confirm')?>" method="POST">
					<?php foreach($userrow as $us){?>
					<div class="form-group">
						<label for="id_user">Id User</label>
						<input class="form-control <?php echo form_error('id_user') ? 'is-invalid':''?>" type="text" name="id_user" value="<?php echo $us->id_user?>" readonly>
						<div class="invalid-feedback">
			                <?php echo form_error('id_user');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input class="form-control <?php echo form_error('nama') ? 'is-invalid':''?>" type="text" name="nama" value="<?php echo $us->nama?>">
						<div class="invalid-feedback">
			                <?php echo form_error('nama');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="hak_akses">Hak Akses</label>
						<select class="form-control <?php echo form_error('hak_akses') ? 'is-invalid':''?>" name="hak_akses">
							<option value="admin" <?php if($us->hak_akses=='admin') echo 'selected';?>>Admin</option>
							<option value="pegawai" <?php if($us->hak_akses=='pegawai') echo 'selected';?>>Pegawai</option>
						</select>
						<div class="invalid-feedback">
			                <?php echo form_error('hak_akses');?>
			            </div>
					</div>
					
					<input class="btn btn-success" type="submit" value="Ubah">
					<a class="btn btn-default" href="<?php echo base_url('admin/User');?>">Batal</a>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>

	<?php $this->load->view("_partials/footer"); ?>
	
</body>
</html>