<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo base_url('admin/tambahstok/save') ?>" method="POST">
                    <?php foreach ($tambahstokrow as $us) { ?>
                        <div class="form-group">
                            <label for="id_menu">Id Menu</label>
                            <input class="form-control <?php echo form_error('id_menu') ? 'is-invalid' : '' ?>" type="text" name="id_menu" value="<?php echo $us->id_menu ?>" readonly>
                            <div class="invalid-feedback">
                                <?php echo form_error('id_menu'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_menu">Id menu</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $us->nama ?>" readonly>
                            <!-- <select class="form-control <?php echo form_error('id_menu') ? 'is-invalid' : '' ?>" name="id_menu"> -->
                                <!-- <option><?php echo $us->nama ?></option> -->
                                <!-- <option value="ayam a" <?php if ($us->menu == 'ayam a') echo 'selected'; ?>>ayam a</option>
                                <option value="ayam b" <?php if ($us->menu == 'ayam b') echo 'selected'; ?>>ayam b</option> -->
                            <!-- </select> -->
                            <div class="invalid-feedback">
                                <?php echo form_error('id_menu'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" type="text" name="tipe" value="<?php echo $us->tipe ?>" readonly>
                            <div class="invalid-feedback">
                                <?php echo form_error('tipe'); ?>
                            </div>

                             <div class="form-group">
                            <label for="stok">Jumlah</label>
                            <input class="form-control <?php echo form_error('stok') ? 'is-invalid' : '' ?>" type="number" name="stok" id="stok" min="0">
                            <div class="invalid-feedback">
                                <?php echo form_error('stok'); ?>
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