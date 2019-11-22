<html>
	<head>
		<title>User Test</title>
	</head>
	<body>
		<table>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th></th>
			</tr>
			<?php foreach($user as $u){?>
			<tr>
				<td><?php echo $u->id_user; ?></td>
				<td><?php echo $u->nama; ?></td>
				<td><a href="<?php echo base_url('admin/UbahUser/ubah/'. $u->id_user);?>">Ubah User</a> 
					<a href="<?php echo base_url('admin/UbahPassword/index/'. $u->id_user);?>">Ubah Password</a> 
					<a href="<?php echo base_url('admin/HapusUser/index/'. $u->id_user);?>">Hapus User</a></td>
			</tr>
		<?php } ?>
		</table>
	</body>
</html>