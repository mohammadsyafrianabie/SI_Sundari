
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_partials/header'); ?>

<body>
<div class="container">

    <!-- Outer Row -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="login-panel panel panel-default">
                <div class="panel-body">
                    <!-- Nested Row within Card Body -->
                    
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Sistem Informasi Sundari!</h1>
                    </div>
                    <form class="user" method="POST" action="auth/konfirmasi">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="username" placeholder="Nama">
                            <div class="invalid-feedback">
                                <?php echo form_error('nama');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            <div class="invalid-feedback">
                                <?php echo form_error('password');?>
                            </div>
                        </div>
                        <button type='submit' class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        <!-- <hr> -->
                        <!-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/registration'); ?>">Daftar!</a>
                        </div> -->
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php $this->load->view('_partials/footer'); ?>
</body>
</html>

