<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/header"); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo base_url('admin/tambahstok/confirm') ?>" method="POST">
                    <div class="form-group">
                        <label for="id_stok">Id Stok</label>
                        <input class="form-control <?php echo form_error('id_stok') ? 'is-invalid' : '' ?>" type="text" name="id_stok" value="<?php echo $id_stok; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_stok'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_menu">Id menu</label>
                        <input type="text" name="id_menu" id="id_menu" class="form-control" value="<?php echo $id_menu; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_menu'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="text" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d H:m:s');?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid' : '' ?>" type="number" name="jumlah" id="jumlah" onchange="notNeg()" onkeyup="notNeg()" value="0">
                        <div class="invalid-feedback">
                            <?php echo form_error('jumlah'); ?>
                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" id="tambah" value="Tambah">
                    <a class="btn btn-back" href="<?php echo base_url('admin/Menu'); ?>">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view("_partials/footer"); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tambah").prop("disabled", true);
        });
        function notNeg(){
            var jumlah = $("#jumlah").val();
            if(jumlah > 0){
                $("#tambah").prop("disabled", false);
            }else{
                $("#tambah").prop("disabled", true);
            }
            konfirmasi();
        }
        function konfirmasi(){
            if ($("#jumlah").val() < 0) {
                $("#jumlah").val(0);
            }
        }
    </script>
</body>

</html>