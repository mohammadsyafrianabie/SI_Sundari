<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo base_url('admin/UbahPassword/confirm')?>" method="POST">
					<?php foreach($datapass as $us){?>
					<div class="form-group">
						<label for="id_user">Id User</label>
						<input class="form-control <?php echo form_error('id_user') ? 'is-invalid':''?>" type="text" name="id_user" value="<?php echo $us->id_user?>" readonly>
						<div class="invalid-feedback">
			                <?php echo form_error('id_user');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="password">Password Baru</label>
						<input class="form-control <?php echo form_error('password') ? 'is-invalid':''?>" type="password" name="password">
						<div class="invalid-feedback">
							<?php echo form_error('password');?>
						</div>
					</div>
					<div class="form-group">
						<label for="passconf">Konfirmasi Password</label>
						<input class="form-control <?php echo form_error('password') ? 'is-invalid':''?>" type="password" name="passconf">
						<div class="invalid-feedback">
							<?php echo form_error('passconf');?>
						</div>
					</div>
					
					<input class="btn btn-success" type="submit" value="Ubah">
					<a class="btn btn-default" href="<?php echo base_url('admin/UbahUser');?>">Batal</a>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view("_partials/footer"); ?>
</body>
</html>