<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nota</title>
	<style type="text/css">
		body {
			font-family: "Consolas";
			size: 10pt;
			color: black;
		}
		.wrapper{
			width: 5cm;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h5>Bukti Pembelian Warung Sundari</h5>
		</div>
		<div class="content">
			<table border="0">
				<tr>
					<td>Kasir:</td>
					<td colspan="2"><?php echo $this->session->userdata("nama"); ?></td>
				</tr>
				<tr>
					<td>Tanggal: </td>
					<td colspan="2"><?php echo $tanggal; ?></td>
				</tr>
				<?php
				$dbeli = $this->session->userdata("data_beli");
				$total = 0;
				foreach ($dbeli as $b) {
				?>
				<tr>
					<td><?php echo $b["namaMenu"]; ?></td>
					<td><?php echo "x". $b["jumlahBeli"]; ?></td>
					<td><?php echo $b["harga"]; ?></td>
				</tr>
				<?php 
				$total = $total + $b["subHarga"];
				}
				?>
				<tr>
					<td>Total biaya:</td>
					<td colspan="2">Rp.<?php echo $total; ?></td>
				</tr>
				<tr>
					<td>Bayar:</td>
					<td colspan="2">Rp.<?php echo $bayar; ?></td>
				</tr>
				<tr>
					<td>Kembalian:</td>
					<td colspan="2">Rp.<?php echo $bayar - $total; ?></td>
				</tr>
			</table>
		</div>
		<div class="footer">
			<p>Terima kasih</p>
			<p>dan selamat datang kembali</p>
		</div>
	</div>
	<?php $this->session->set_userdata("data_beli", array()); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
	<script type="text/javascript">

		window.onafterprint = function(e){
			$(window).off('mousemove', window.onafterprint);
			window.location.href = '<?php echo base_url("pegawai/Transaksi"); ?>';
		};

		window.print();

		setTimeout(function(){
			$(window).on('mousemove', window.onafterprint);
		}, 1);

	</script>
</body>
</html>