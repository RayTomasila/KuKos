<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin KuKos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- CSS Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/admin/sidebar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/admin/transaksi.css') ?>">

  </head>
  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <h4 class="text-left mb-3 mx-2">KuKos</h4>

      <ul class="navbar-nav">

      <li class="nav-item">
        <a href="<?php echo base_url("home") ?>" class="nav-link <?php echo (current_url() == base_url("home") ? 'active' : ''); ?>">
          Home
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url("member") ?>" class="nav-link <?php echo (current_url() == base_url("member") ? 'active' : ''); ?>">
          Member
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url("transaksi") ?>" class="nav-link <?php echo (current_url() == base_url("transaksi") ? 'active' : ''); ?>">
          Transaksi
        </a>
      </li>
      
      <li class="nav-item">
        <a href="<?php echo base_url("akun") ?>" class="nav-link <?php echo (current_url() == base_url("akun") ? 'active' : ''); ?>">
          Akun
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url("logout") ?>" class="nav-link <?php echo (current_url() == base_url("logout") ? 'active' : ''); ?>">
          LOGOUT
        </a>
      </li>
      </ul>
    </div>

   