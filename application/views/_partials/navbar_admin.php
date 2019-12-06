<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sundari</a>
                <div class="navbar-text">Admin</div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('Auth/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="<?php if($formname == 'home') echo 'active';?>">
                            <a href="<?php echo base_url('admin/home_admin');?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li class="<?php if($formname == 'laporan') echo 'active';?>">
                            <a href="#"><i class="fa fa-book fa-fw"></i> Laporan Transaksi</a>
                        </li>
                        <li class="<?php if($formname == 'menu') echo 'active';?>">
                            <a href="#"><i class="fa fa-table fa-fw"></i> Menu</a>
                        </li>
                        <li class="<?php if($formname == 'user') echo 'active';?>">
                            <a href="<?php echo base_url('admin/user');?>"><i class="fa fa-users fa-fw"></i> User</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>