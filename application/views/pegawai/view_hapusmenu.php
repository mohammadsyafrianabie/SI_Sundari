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
				<p>Yakin untuk menghapus <font color="red">ID: <?php echo $hs->id_menu;?></font> ?</p>
				<a class="btn btn-danger" href="<?php echo base_url('admin/HapusMenu/confirm/'). $hs->id_menu;?>">Hapus</a>
				<a class="btn btn-default" href="<?php echo base_url('admin/UbahMenu');?>">Batal</a>
				<?php }?>
			</div>
		</div>
	</div>
	<?php $this->load->view("_partials/footer"); ?>
</body>
</html>