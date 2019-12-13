<!DOCTYPE html>
<html lang="en">

 <div class="all-content-wrapper">
        <?php $this->load->view('_partials/header') ?>

        <div class="content">

            <div class="container-fluid">
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