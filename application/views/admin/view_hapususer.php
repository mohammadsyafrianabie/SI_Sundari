<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<?php foreach($hapusrow as $hs){?>
				<h1>Hapus Data</h1>
				<p>Yakin untuk menghapus <font color="red">ID: <?php echo $hs->id_user;?></font> ?</p>
				<a class="btn btn-danger" href="<?php echo base_url('admin/HapusUser/confirm/'). $hs->id_user;?>">Hapus</a>
				<a class="btn btn-default" href="<?php echo base_url('admin/User');?>">Batal</a>
				<?php }?>
			</div>
		</div>
	</div>
	<?php $this->load->view("_partials/footer"); ?>
</body>
</html>