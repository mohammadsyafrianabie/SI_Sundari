<!DOCTYPE html>
<html lang="en">
 <?php $this->load->view('_partials/header') ?>

<body>
  <div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view("_partials/navbar_pegawai"); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Laporan Harian</h1>
                  <div class="card-body">
        <form method="post" action="<?php echo base_url('pegawai/Laporan/hari');?>">
        <!-- DataTables -->
            <select id="hari" name="hari" required="required">
              <option value="">Pilih Hari</option>
              <?php
              for ($i = 1; $i <= 30; $i++){
              ?>
              <option value="<?php echo $i;?>" <?php if(isset($hari) && $hari==$i) echo "selected";?> ><?php echo $i;?></option>
              <?php } ?>
            </select>
            <select id="bulan" name="bulan" required="required">
              <option value="">Pilih Bulan</option>
              <?php
              $array_bln = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
              for($j = 1; $j <= 12; $j++){
              ?>
              <option value="<?php echo $j;?>" <?php if(isset($bulan) && $bulan==$j) echo "selected";?> ><?php echo $array_bln[$j];?></option>
              <?php } ?>
            </select>
            <select id="tahun" name="tahun" required="required">
              <option value="">Pilih Tahun</option>
              <?php foreach ($transaksi as $key) {
              ?>
              <option value="<?php echo $key->tgl; ?>" <?php if(isset($tahun) && $tahun==$key->tgl) echo "selected";?> ><?php echo $key->tgl ?></option>
              <?php } ?>
            </select>
            <!-- <select name="jenis" required="required">
              <option value="">Pilih Jenis</option>
              <option value="tunai" <?php if(isset($jenis) && $jenis=="tunai") echo "selected";?> >Tunai</option>
              <option value="tunda" <?php if(isset($jenis) && $jenis=="tunda") echo "selected";?> >Tunda</option>
            </select> -->
            <button class="btn btn-secondary" type="submit" name="filter">Filter</button>
            <button class="btn btn-secondary" type="submit" name="cetak">Cetak</button>
      </form>
          </div>
          <div class="card-body">

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
        </div>
      </div>
    </div>

  </div>


  <?php $this->load->view("_partials/footer"); ?>

</body>

</html>