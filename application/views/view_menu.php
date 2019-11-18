<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view("_partials/navbar"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Menu</h1>
                         <div class="card-body">
                  <table class="table">
                               <tr>
                                 <th>ID</th>
                                 <th>Nama</th>
                                 <th>Tipe</th>
                                 <th>Stock</th>
                                 <th>Harga</th>
                               </tr>
                               <tbody id="view_menu">
                               </tbody>
                               <?php 
    foreach($menu as $u){ 
    ?>
    <tr>
      <td><?php echo $u->id_menu ?></td>
      <td><?php echo $u->nama ?></td>
      <td><?php echo $u->tipe ?></td>
      <td><?php echo $u->stok ?></td>
      <td><?php echo $u->harga ?></td>
      <td>
            <?php echo anchor('crud/edit/'.$u->id_menu,'Edit'); ?>
                              <?php echo anchor('crud/hapus/'.$u->id_menu,'Hapus'); ?>
      </td>
    </tr>
    <?php } ?>
                             </table>
                </div>
              </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("_partials/footer"); ?>

</body>

</html>