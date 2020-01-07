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
                        <tbody id="bodyTabelBeli">
                            <?php 
                            $total_biaya = 0;
                            $no = 1;
                            $beli = $this->session->userdata("data_beli");
                            if (is_array($beli)){
                            foreach ($beli as $b){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $b["namaMenu"]; ?></td>
                                <td><?php echo $b["jumlahBeli"];?></td>
                                <td><?php echo $b["subHarga"]; $total_biaya = $total_biaya + $b["subHarga"]; ?></td>
                                <td>
                                    <a href="javascript:;" class="linkUbahBeli" data="<?php echo $b['noBeli']; ?>">Ubah Jumlah</a>
                                    <?php echo anchor('pegawai/Transaksi/deleteRow/'. $b["noBeli"],'Hapus'); ?>
                                </td>
                            </tr>
                            <?php $no++;} } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <form class="col-md-3 col-md-offset-8" method="POST" action="<?php echo base_url('pegawai/Transaksi/save'); ?>">
                        <b>TOTAL BIAYA: </b><input class="form-control" type="text" id="total_biaya" value="<?php echo $total_biaya; ?>" readonly>
                        <b>BAYAR: </b><input class="form-control" type="number" name="bayar" id="bayar" value="0">
                        <b>KEMBALIAN: </b><input class="form-control" type="text" id="kembalian" value="0" readonly>
                        <input class="btn btn-success" style="width: 100%; margin-top: 10px;" type="submit" id="bayarkan" name="bayarkan" value="Bayarkan">
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modalUbahJumlah" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="<?php echo base_url('pegawai/Transaksi/updateRow')?>" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title">Ubah Jumlah</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no_beli" id="no_beli">
                    
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu</label>
                        <input class="form-control" type="text" name="nama_menu" id="nama_menu" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_ubah">Jumlah Beli</label>
                        <input class="form-control" type="number" name="jumlah_ubah" id="jumlah_ubah" value=0>
                    </div>
                    <!-- <input type="hidden" name="harga_menu" id="harga_menu"> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" id="tombol_ubahBeli" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                </div>
            </form>
        </div>
    </div>

    <?php $this->load->view("_partials/footer"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            konfirmasiTambahRow();
            konfirmasiUbahRow();
            konfirmasiBayar();

            $("#id_menu").select2({
                placeholder: "Please Select"
            });
            // Untuk menampilkan harga menu
            $("#id_menu").on("select2:select", function(){
                var idmenu = $("#id_menu").val();

                // jika tidak ada/pilih null yg dipilih harga = 0
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

            // Untuk event ubah jumlah pembelian
            $("#bodyTabelBeli").on("click", ".linkUbahBeli", function(){
                var this_id = $(this).attr("data");

                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('pegawai/Transaksi/getJumlahBeli'); ?>",
                    dataType: "JSON",
                    data: {id:this_id},
                    success: function(data){
                        $.each(data, function(namaMenu, jumlahBeli, harga){
                            $("#modalUbahJumlah").modal('show');
                            $("#no_beli").val(this_id);
                            $("#nama_menu").val(data.namaMenu);
                            $("#jumlah_ubah").val(data.jumlahBeli);
                            $("#harga_menu").val(data.harga);
                            konfirmasiUbahRow();
                        });
                    }
                });
            });

            $("#jumlah_beli").change(function(){notNeg("jumlah_beli")});
            $("#jumlah_beli").keyup(function(){notNeg("jumlah_beli")});

            $("#bayar").change(function(){notNeg("bayar")});
            $("#bayar").keyup(function(){notNeg("bayar")});

            $("#jumlah_ubah").change(function(){notNeg("jumlah_ubah")});
            $("#jumlah_ubah").keyup(function(){notNeg("jumlah_ubah")});
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
                $("#tombol_ubahBeli").prop("disabled", false);
            }else{
                $("#tombol_ubahBeli").prop("disabled", true);
            }
        }

        function konfirmasiBayar(){
            $("#kembalian").val( $("#bayar").val() - $("#total_biaya").val() );
            if($("#kembalian").val() >= 0 && $("#total_biaya").val() != 0){
                $("#bayarkan").prop("disabled", false);
            }else{
                $("#bayarkan").prop("disabled", true);
            }
        }
    </script>

</body>

</html>
