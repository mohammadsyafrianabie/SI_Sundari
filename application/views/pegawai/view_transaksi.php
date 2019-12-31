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
                    <form class="container-fluid" action="<?php echo base_url('pegawai/Transaksi/addRow'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="id_menu">Nama Menu</label>
                                <select class="form-control" id="id_menu" name="id_menu">
                                    <option value="">--Please Select--</option>
                                    <?php foreach ($lookMenu as $lm){ ?>
                                    <option value="<?php echo $lm->id_menu; ?>"><?php echo $lm->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="harga">Harga</label>
                                <input class="form-control" type="text" name="harga" id="harga" value="0" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="jumlah_beli">Jumlah Beli</label>
                                <input class="form-control" type="number" name="jumlah_beli" id="jumlah_beli" value="0">
                            </div>
                            <div class="col-md-3" style="margin-top: 25px;">
                                <button class="btn btn-primary" type="submit" id="tambahkan" name="tambahkan">Tambahkan</button>
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
                                <th>Subharga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total_biaya = 0;
                            $beli = $this->session->userdata('data_beli');
                            if (is_array($beli)){
                            foreach ($beli as $b){
                            ?>
                            <tr>
                                <td><?php echo $b["noBeli"]; ?></td>
                                <td><?php echo $b["namaMenu"]; ?></td>
                                <td><?php echo $b["jumlahBeli"];?></td>
                                <td><?php echo $b["subHarga"]; $total_biaya = $total_biaya + $b["subHarga"]; ?></td>
                                <td>
                                    <?php echo anchor('pegawai/Transaksi/updateRow/'. $b["noBeli"],'Edit'); ?>
                                    <?php echo anchor('pegawai/Transaksi/deleteRow/'. $b["noBeli"],'Hapus'); ?>
                                </td>
                            </tr>
                            <?php 
                            }} ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <form class="col-md-3 col-md-offset-8" method="POST" action="<?php echo base_url('pegawai/Transaksi/save'); ?>">
                        <b>TOTAL BIAYA: </b><input class="form-control" type="text" id="total_biaya" value="<?php echo $total_biaya; ?>" readonly>
                        <b>BAYAR: </b><input class="form-control" type="number" name="bayar" id="bayar" value="0">
                        <b>KEMBALIAN: </b><input class="form-control" type="text" id="kembalian" value="0" readonly>
                        <input class="btn btn-success" type="submit" id="bayarkan" name="bayarkan" value="Bayarkan">
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view("_partials/footer"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            konfirmasiTambahRow();
            konfirmasiBayar();

            $("#id_menu").select2({
                placeholder: "Please Select"
            });
            $("#id_menu").on("select2:select", function(){
                var idmenu = $("#id_menu").val();
                if(idmenu == ""){
                    $("#harga").val(0);
                }else{
                    $.ajax({
                        type : "GET",
                        url : "<?php echo base_url('pegawai/Transaksi/getHargaMenu'); ?>",
                        data: {id: idmenu},
                        success : function(data){
                            $("#harga").val(data);
                        }
                    });
                }
                konfirmasiTambahRow();
            });

            $("#jumlah_beli").change(function(){notNeg("jumlah_beli")});
            $("#jumlah_beli").keyup(function(){notNeg("jumlah_beli")});

            $("#bayar").change(function(){notNeg("bayar")});
            $("#bayar").keyup(function(){notNeg("bayar")});
        });

        function notNeg(selector){
            if($("#"+selector).val() < 0){
                $("#"+selector).val(0);
            }
            switch(selector){
                case "jumlah_beli": konfirmasiTambahRow(); break;
                case "jumlah_ubah": konfirmasiUbahRow(); break;
                case "bayar": konfirmasiBayar(); break;
            }
        }

        function konfirmasiTambahRow(){
            if($("#id_menu").val() != "" && $("#jumlah_beli").val() > 0){
                $("#tambahkan").prop("disabled", false);
            }else{
                $("#tambahkan").prop("disabled", true);
            }
        }

        function konfirmasiUbahRow(){
            if($("#jumlah_ubah").val() > 0 ){
                //TODO enable tombol ubah
            }else{
                //TODO disable tombol ubah
            }
        }

        function konfirmasiBayar(){
            $("#kembalian").val($("#bayar").val() - $("#total_biaya").val());
            if($("#kembalian").val() >= 0 && $("#bayar").val() != 0){
                $("#bayarkan").prop("disabled", false);
            }else{
                $("#bayarkan").prop("disabled", true);
            }
        }
    </script>

</body>

</html>
