<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo base_url('admin/TambahMenu/tambahMenu') ?>" method="POST">
                        <div class="form-group">
                            <label for="id_menu">Id Menu</label>
                            <input class="form-control <?php echo form_error('id_menu') ? 'is-invalid' : '' ?>" type="text" name="id_menu" value="<?php echo $id_baru_menu;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Menu</label>
                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <select class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" name="tipe">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Menu</label>
                            <input class="form-control <?php echo form_error('stok') ? 'is-invalid' : '' ?>" type="int" name="stok">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Menu</label>
                            <input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>" type="int" name="harga">
                        </div>

                        <input class="btn btn-success" type="submit" value="Tambah">
                        <a class="btn btn-secondary" href="<?php echo base_url('admin/Menu'); ?>">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view("_partials/footer"); ?>
</body>

</html>