<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/2.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-2">
  <a class="navbar-brand" href="#">Artica Restaurant</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
       <li class="nav-item">
        <a class="nav-link mucmonan" href="#">Quản lý món ăn</a>
        <ul>
          <li><a href="<?php echo base_url(); ?>product/showqldanhmucsp">Danh mục món ăn</a></li>
          <li><a href="<?php echo base_url(); ?>product/showqlsanpham">Thông tin món ăn</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>home/showbook">Quản lý đặt bàn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Quản lý tin tức</a>
        <ul>
          <li><a href="<?php echo base_url(); ?>news/showdanhmuc">Danh mục tin tức</a></li>
          <li><a href="<?php echo base_url(); ?>news/showtintuc">Thông tin tin tức</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Quản lý thông tin nhà hàng</a>
        <ul>
          <li><a href="<?php echo base_url(); ?>sline">Thông tin slice</a></li>
          <li><a href="<?php echo base_url(); ?>home/editdulieuheader">Thông tin nhà hàng</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/showadmin">Quản lý tài khoản quản trị</a>
      </li>
    </ul>
  </div>
</nav>
