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
        <form method="post" action="<?php echo base_url('pegawai/Laporan/hari');$total_uang = 0; ?>">
        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-header">
             <select id="hari" name="hari" required="required">Pilih Bulan
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
            </select>
            <select id="bulan" name="bulan" required="required">Pilih Bulan
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
            <select id="tahun" name="tahun" required="required">Pilih Tahun
              <?php foreach ($transaksi as $key) {
              ?>
              <option value="<?php echo $key->tgl ?>"><?php echo $key->tgl ?></option>
              <?php } ?>              
              
            </select>
            <button>FILTER</button>           
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
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($laporan as $key) { ?>
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
                      <?php echo $key->subharga; $total_uang = $total_uang + $key->subharga; ?>
                    </td>
                    <td>
                      <?php echo $key->tanggal; ?>
                    </td>
                    
                  </tr>
                  <?php } ?>
                  <tr> <td> Grand Total <?php echo "Rp.". $total_uang; ?> </td> </tr>


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