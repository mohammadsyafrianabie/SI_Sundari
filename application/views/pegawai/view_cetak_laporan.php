<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/header') ?>

<body>
	<div class="container-fluid">
		<div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Transaksi</th> 
                    <th>NAMA </th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>SUB HARGA</th>
                    <th>TANGGAL</th>
                    <th>JENIS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $total_uang = 0;
                  $total_tunai = 0;
                  $total_tunda = 0;
                  foreach ($laporan as $key) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $key->id_transaksi; ?>
                    </td>
                    <td>
                      <?php echo $key->nama; ?>
                    </td>
                    <td>
                      <?php echo $key->harga; ?>
                    </td>
                    <td>
                      <?php echo $key->jumlah; ?>
                    </td>
                    <td>
                      <?php echo $key->subharga;
                      $total_uang = $total_uang + $key->subharga;
                      if($key->jenis=="tunai"){$total_tunai = $total_tunai + $key->subharga;}
                      else{$total_tunda = $total_tunda + $key->subharga;}
                      ?>
                    </td>
                    <td>
                      <?php echo $key->tanggal; ?>
                    </td>
                    <td>
                      <?php echo $key->jenis; ?>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr> <td> Grand Total <?php echo "Rp.". $total_uang; ?> </td> </tr>
                  <tr> <td> Total Tunai <?php echo "Rp.". $total_tunai; ?> </td> </tr>
                  <tr> <td> Total Tunda <?php echo "Rp.". $total_tunda; ?> </td> </tr>
                </tbody>
              </table>
            </div>
	</div>

	<?php $this->load->view("_partials/footer"); ?>
	<script type="text/javascript">
		window.onafterprint = function(e) {
			$(window).off('mousemove', window.onafterprint);
			window.location.href = '<?php echo base_url("pegawai/laporan"); ?>';
		};

		window.print();

		setTimeout(function() {
			$(window).on('mousemove', window.onafterprint);
		}, 1);
	</script>
</body>
</html>