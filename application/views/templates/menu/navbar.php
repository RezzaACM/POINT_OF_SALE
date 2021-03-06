<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url('') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Yu</b>yu</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Dapur Sunda </b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('upload/user/'.$this->session->userdata('foto_user'))?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->session->userdata('nama')?></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
            <img src="<?php echo base_url('upload/user/'.$this->session->userdata('foto_user')) ?>" class="img-circle" alt="User Image">

            <p>
            <?php echo $this->session->userdata('nama')?> - 
            <?php echo $this->session->userdata('jabatan') ?>
                <small>Member since Nov. 2012</small>
            </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="<?php echo base_url('login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
            </div>
            </li>
        </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
    </ul>
    </div>
</nav>
</header>