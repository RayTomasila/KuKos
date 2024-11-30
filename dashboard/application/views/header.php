<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KuKos</title>
    
    <!-- css styles -->
      <link rel="stylesheet" href="../public/styles/general.css">
      <link rel="stylesheet" href="../public/styles/dashboard/navbar.css">
      <link rel="stylesheet" href="../public/styles/dashboard/beli.css">
      <link rel="stylesheet" href="../public/styles/dashboard/fitur.css">
      <link rel="stylesheet" href="../public/styles/dashboard/footer.css">
      <link rel="stylesheet" href="../public/styles/dashboard/register.css">
    <!-- css styles -->
    

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
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg py-3">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <!-- Logo Section -->
    <a href="#hero" class="navbar-brand d-lg-block">Ku<span>Kos</span></a>

    <!-- Navbar Toggler Button for Mobile View -->
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Items (Center Aligned) -->
    <div class="collapse navbar-collapse" id="naff">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="<?php echo base_url("welcome") ?>" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item">
          <a href="#fitur" class="nav-link">Fitur</a>
        </li>
        <li class="nav-item">
          <a href="#biaya" class="nav-link">Biaya</a>
        </li>
        <li class="nav-item">
          <a href="#panduan" class="nav-link">Panduan</a>
        </li>
        <li class="nav-item">
          <a href="#kontak" class="nav-link">Kontak</a>
        </li>
      </ul>

      <!-- Right-side items: Login/Register or User Profile -->
      <?php if ($this->session->userdata("id_member")): ?>
        <ul class="navbar-nav">
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
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("register") ?>" class="nav-link">Register</a>
          </li>
        </ul>
      <?php endif ?>
    </div>
  </div>
</nav>
<!-- Navbar End -->
