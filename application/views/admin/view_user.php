<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view("_partials/navbar_admin"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar User</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <div class="btn btn-primary active" type="submit" value="tambah">Tambah
                                <div include="view/view_tambahuser.php">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="view_user">
                                        <?php foreach ($user as $u) { ?>
                                            <tr>
                                                <td><?php echo $u->id_user ?></td>
                                                <td><?php echo $u->nama ?></td>
                                                <td><?php echo $u->hak_akses ?></td>
                                                <td>
                                                    <?php echo anchor('admin/UbahUser/ubah/' . $u->id_user, 'Edit'); ?>
                                                    <?php echo anchor('admin/HapusUser/index/' . $u->id_user, 'Hapus'); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("_partials/footer"); ?>

</body>

</html>