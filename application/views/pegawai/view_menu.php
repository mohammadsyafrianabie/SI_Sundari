<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view("_partials/navbar_pegawai"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Menu</h1>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Stock</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody id="view_menu">
                            <?php foreach($menu as $u){ ?>
                            <tr>
                                <td><?php echo $u->id_menu ?></td>
                                <td><?php echo $u->nama ?></td>
                                <td><?php echo $u->tipe ?></td>
                                <td><?php echo $u->stok ?></td>
                                <td><?php echo $u->harga ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("_partials/footer"); ?>

</body>

</html>