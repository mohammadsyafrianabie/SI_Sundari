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
                      <h1 class="page-header">Laporan</h1>
                         <div class="card-body">

            <div class="container-fluid">
        <form method="post" action="<?php echo base_url('admin/Laporan'); ?>">
    
            </br> <a href="<?php echo site_url('admin/Laporan/hari') ?>" class="btn btn-primary" value="Laporan Harian" >Laporan Harian
           </a>  </br> 
           </br> <a href="<?php echo site_url('admin/Laporan/hari') ?>" class="btn btn-primary" value="Laporan Harian" >Laporan Harian
           </a>  </br>     
      </form>
          </div>
          </div>
         
          </div>


  <?php $this->load->view("_partials/footer"); ?>

</body>

</html>