<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo base_url('admin/tambahstok/confirm') ?>" method="POST">
                    <?php foreach ($tambahstokrow as $us) { ?>
                        <div class="form-group">
                            <label for="id_stok">Id Stok</label>
                            <input class="form-control <?php echo form_error('id_stok') ? 'is-invalid' : '' ?>" type="text" name="id_stok" value="<?php echo $us->id_stok ?>" readonly>
                            <div class="invalid-feedback">
                                <?php echo form_error('id_stok'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_menu">Id menu</label>
                            <select class="form-control <?php echo form_error('id_menu') ? 'is-invalid' : '' ?>" name="id_menu">
                                <option value="ayam a" <?php if ($us->menu == 'ayam a') echo 'selected'; ?>>ayam a</option>
                                <option value="ayam b" <?php if ($us->menu == 'ayam b') echo 'selected'; ?>>ayam b</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('id_menu'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="text" name="tanggal" value="<?php echo $us->tanggal ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('tanggal'); ?>
                            </div>

                             <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid' : '' ?>" type="text" name="jumlah" value="<?php echo $us->jumlah ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('jumlah'); ?>
                            </div>


                        </div>

                        <input class="btn btn-success" type="submit" value="tambah">
                        <a class="btn btn-back" href="<?php echo base_url('admin/tambahstok'); ?>">Batal</a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view("_partials/footer"); ?>
</body>

</html>