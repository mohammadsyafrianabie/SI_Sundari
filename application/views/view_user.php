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
                        <h1 class="page-header">Daftar User</h1>
                         <div class="card-body">
                  <table class="table">
                               <tr>
                                 <th>ID</th>
                                 <th>Nama</th>
                                 <th>Status</th>
                               </tr>
                               <tbody id="view_user">
                               </tbody>
                               <?php 
    foreach($user as $u){ 
    ?>
    <tr>
      <td><?php echo $u->id_user ?></td>
      <td><?php echo $u->nama ?></td>
      <td><?php echo $u->hak_akses ?></td>
      <td>
            <?php echo anchor('crud/edit/'.$u->id_user,'Edit'); ?>
                              <?php echo anchor('crud/hapus/'.$u->id_user,'Hapus'); ?>
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