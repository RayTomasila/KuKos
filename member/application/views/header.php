<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Dashboard</title>

    <!-- Styles -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../public/styles/general.css">
      <link rel="stylesheet" type="text/css" href="../public/styles/member/member-navbar.css">
      <link rel="stylesheet" type="text/css" href="../public/styles/member/member-dashboard.css">
      <link rel="stylesheet" type="text/css" href="../public/styles/member/member-footer.css">
    <!-- Styles -->
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