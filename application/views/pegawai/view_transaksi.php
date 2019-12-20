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
                        <h1 class="page-header">Transaksi</h1>
                    </div>
                </div>
                <div class="row">
                    <form class="container-fluid" action="" method="POST">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="id_menu">Nama Menu</label>
                                <select class="form-control" id="id_menu" name="id_menu">
                                    <?php foreach ($lookMenu as $lm){ ?>
                                    <option value="<?php echo $lm->id_menu; ?>"><?php echo $lm->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="jumlah_beli">Jumlah Beli</label>
                                <input class="form-control" type="number" name="jumlah" id="jumlah_beli" value="1" onchange="notNeg()" onkeyup="notNeg()">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="harga">Harga</label>
                                <input class="form-control" type="text" name="harga" id="harga" value="0" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit" name="tambahkan">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $
                            ?>
                            <tr>
                                <td>1</td>
                                <td>Ayam Goreng</td>
                                <td>2</td>
                                <td>30000</td>
                                <td>
                                    <?php echo anchor('admin/UbahMenu/ubah/','Edit'); ?>
                                    <?php echo anchor('admin/HapusMenu/index/','Hapus'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view("_partials/footer"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#nama_menu").select2({
                placeholder: "Please Select"
            });
        });

        function notNeg(){
            if($("#jumlah_beli").val() <= 0){
                $("#jumlah_beli").val(1);
            }
        }
    </script>

</body>

</html>
