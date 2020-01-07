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
                        <h1 class="page-header">  SELAMAT DATANG DI SI RUMAH MAKAN SUNDARI </h1>
                        <div class="card-body">
                            <h3>Selamat Bekerja !</h3> 
                            <p>Halaman ini digunakan untuk menambahkan stok, mengelola menu, dan pegawai.</p> 
                            <p>Laporan transaksi disajikan per hari, per bulan dan per tahun.</p>
                        </div>
                    </div>
                </div>
                    <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("_partials/footer"); ?>

</body>

</html>