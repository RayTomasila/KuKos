<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Dashboard</title>

  <!-- CSS Styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/general.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-navbar.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-penyewa.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-footer.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-dashboard.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-kontrak.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-kamar.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-fasilitas.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('../public/styles/member/member-general.css') ?>">
  <!-- CSS Styles -->

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Fonts -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Load jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- Load Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <!-- Bootstrap & DataTables JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

  
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg">
      
      <div class="container">
        <a href="<?php echo base_url("dashboard") ?>" class="navbar-brand">Ku<span>Kos</span></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="naff">


      <?php if ($this->session->userdata("id_member")): ?>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
              <a href="<?php echo base_url("dashboard") ?>" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url("penyewa") ?>" class="nav-link">Penyewa</a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url("kamar") ?>" class="nav-link">Kamar</a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url("fasilitas") ?>" class="nav-link">Fasilitas</a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url("kontrak") ?>" class="nav-link">Kontrak</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">      

          <li class="nav-item">
            <a href="<?php echo base_url("akun") ?>" class="nav-link">
              <?php 
                $full_name = $this->session->userdata("nama_lengkap_member");
                $first_name = explode(" ", $full_name)[0];
                echo $first_name; 
              ?>
            </a>
          </li>
            
          <li class="nav-item">
            <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
          </li>
        </ul>
      <?php endif ?>

      <?php if (!$this->session->userdata("id_member")): ?>
        <ul class="navbar-nav ms-auto">      
          <li class="nav-item">
            <a href="<?php echo base_url("login") ?>" class="nav-link">Login</a>  
          </li>

        </ul>
      <?php endif ?>

        </div>
      </div>

    </nav>
  </header>