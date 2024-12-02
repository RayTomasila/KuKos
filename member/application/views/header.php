<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Dashboard</title>
    
    <!-- CSS Styles -->
      <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url('../public/styles/general.css') ?>">
      <link rel="stylesheet" type="text/css"      
      href="<?php echo base_url('../public/styles/member/member-navbar.css') ?>">

      <link rel="stylesheet" type="text/css"
      href="<?php echo base_url('../public/styles/member/member-penyewa.css') ?>">
      
      <link rel="stylesheet" type="text/css"
      href="<?php echo base_url('../public/styles/member/member-footer.css') ?>">
      
      <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url('../public/styles/member/member-dashboard.css') ?>">

    <!-- CSS Styles -->

    <!-- fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- fonts -->


    <!-- Bootstrap & JS -->

      <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
      
      <!-- Include select2 CDN -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
      crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
      <!-- Include select2 CDN -->

    <!-- Bootstrap & JS -->

  </head>

  <body>

    <nav class="navbar navbar-expand-lg">
      
      <div class="container">
        <a href="<?php echo base_url("dashboard") ?>" class="navbar-brand">Ku<span>Kos</span></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="naff">

      <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="<?php echo base_url("dashboard") ?>" class="nav-link">Home</a>
        </li>
      </ul>

      <?php if ($this->session->userdata("id_member")): ?>
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