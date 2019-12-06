<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo base_url('admin/UbahUser/confirm')?>" method="POST">
					<?php foreach($menurow as $mr){?>
					<div class="form-group">
						<label for="id_menu">Id Menu</label>
						<input class="form-control <?php echo form_error('id_menu') ? 'is-invalid':''?>" type="text" name="id_menu" value="<?php echo $mr->id_menu?>" readonly>
						<div class="invalid-feedback">
			                <?php echo form_error('id_menu');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input class="form-control <?php echo form_error('nama') ? 'is-invalid':''?>" type="text" name="nama" value="<?php echo $mr->nama?>">
						<div class="invalid-feedback">
			                <?php echo form_error('nama');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="tipe">Tipe</label>
						<select class="form-control <?php echo form_error('tipe') ? 'is-invalid':''?>" name="tipe">
							<option value="makanan" <?php if($mr->tipe=='makanan') echo 'selected';?>>Makanan</option>
							<option value="minuman" <?php if($mr->tipe=='minuman') echo 'selected';?>>Minuman</option>
						</select>
						<div class="invalid-feedback">
			                <?php echo form_error('tipe');?>
			            </div>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input class="form-control <?php echo form_error('stok') ? 'is-invalid':''?>" type="text" name="stok" value="<?php echo $mr->stok?>">
						<div class="invalid-feedback">
			                <?php echo form_error('stok');?>
			            </div>
					</div>
					
					<input class="btn btn-success" type="submit" value="Ubah">
					<a class="btn btn-default" href="<?php echo base_url('admin/Menu');?>">Batal</a>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view("_partials/footer"); ?>
</body>
</html>