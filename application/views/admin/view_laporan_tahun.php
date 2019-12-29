<!DOCTYPE html>
<html lang="en">
 <?php $this->load->view('_partials/header') ?>

<body>
  <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view("_partials/navbar_admin"); ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">Laporan Tahunan</h1>
                         <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/Laporan/tahun'); $total_uang = 0; ?>">
        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-header">
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


  <?php $this->load->view("_partials/footer"); ?>

</body>

</html>