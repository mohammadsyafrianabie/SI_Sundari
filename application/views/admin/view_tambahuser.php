<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo base_url('admin/TambahUser/tambahUser') ?>" method="POST">
                        <div class="form-group">
                            <label for="id_user">Id User</label>
                            <input class="form-control <?php echo form_error('id_user') ? 'is-invalid' : '' ?>" type="text" name="id_user" value="<?php echo $id_baru_user;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="hak_akses">Hak Akses</label>
                            <select class="form-control <?php echo form_error('hak_akses') ? 'is-invalid' : '' ?>" name="hak_akses">
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                        </div>

                        <input class="btn btn-success" type="submit" value="Tambah">
                        <a class="btn btn-back" href="<?php echo base_url('admin/TambahUser'); ?>">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view("_partials/footer"); ?>
</body>

</html>