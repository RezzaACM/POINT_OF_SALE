<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo base_url('') ?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama')?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span>
    </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
        <a href="<?php echo base_url()?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-database"></i>
        <span>Data Master</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('item')?>"><i class="fa fa-list"></i> Dafter Menu</a></li>
        <li><a href="<?php echo base_url('kategori')?>"><i class="fa fa-chain"></i> Kategori</a></li>
        <li><a href=""><i class="fa fa-users"></i> Customer </a></li>
        <li><a href="<?php echo base_url('staff')?>"><i class="fa fa-user-circle"></i> Staff </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span>Transaksi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-sticky-note-o"></i> Order </a></li>
        <li><a href="pages/UI/general.html"><i class="fa fa-list"></i> Order Detail </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-print"></i>
        <span>Reports</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-sticky-note-o"></i> Order </a></li>
        <li><a href="pages/UI/general.html"><i class="fa fa-list"></i> Order Detail </a></li>
        </ul>
    </li>
    <li class="">
        <a href="<?php echo base_url('Home/index')?>">
        <i class="fa fa-user"></i> <span>User Setting</span>
        </a>
    </li>
    <li class="">
        <a href="<?php echo base_url('login/logout')?>">
        <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
    </li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>