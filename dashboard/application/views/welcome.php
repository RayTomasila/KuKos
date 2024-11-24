<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KuKos</title>
    
    <link rel="stylesheet" href="../public/styles/general.css">
    <link rel="stylesheet" href="../public/styles/dashboard/navbar.css">
    <link rel="stylesheet" href="../public/styles/dashboard/beli.css">
    <link rel="stylesheet" href="../public/styles/dashboard/fitur.css">
    <link rel="stylesheet" href="../public/styles/dashboard/footer.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->

</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg py-3">

    <div class="container-fluid">
      <a href="#hero" class="navbar-brand d-lg-block">Ku<span>Kos</span></a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
          <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="naff">

    <ul class="navbar-nav mx-auto text-white">
        <li class="nav-item">
            <a href="#hero" class="nav-link">Beranda</a>
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

    <?php if ($this->session->userdata("id_member")): ?>
      <ul>
        <li>
          <a href="<?php echo base_url("akun") ?>" class="nav-link">
            <?php echo $this->session->userdata("nama_member") ?>
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
        <li>
            <a href="<?php echo base_url("register") ?>" class="nav-link">Register</a>  
        </li>

      </ul>
    <?php endif ?>
    
  </nav>
  <!-- Navbar End -->
    
  <!-- Hero Start -->
  <section id="hero">
    <div id="carouselExampleInterval" class="carousel slider" data-bs-ride="carousel" >
      <div class="carousel-inner">

          <?php foreach ($slider as $key => $value): ?>
              <div class="carousel-item <?php echo $key == 0 ? "active" : ""; ?>" data-bs-interval="3000">
                  <img src="<?php echo $this->config->item("url_slider").$value["foto_slider"]; ?>" class="d-flex justify-content-center" style="object-fit:contain; height:95vh;">
                  <div class="carousel-caption d-none d-md-block">
                      <h2><?php echo $value['caption_slider']; ?></h2>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>



    </div>
  </section>
  <!-- Hero End -->

 <!-- beli Start -->
  <section id="beli" class="container">
    <div class="beli-container" >

      <div class="word">KELOLA KOS TANPA REPOT</div>

      <!-- /* From Uiverse.io by cssbuttons-io */  -->
      <button href="#" class="button" style="--clr: #7808d0">
        <span class="button__icon-wrapper">
          <svg
            viewBox="0 0 14 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="button__icon-svg"
            width="10"
          >
            <path
              d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"
              fill="currentColor"
            ></path>
          </svg>

          <svg
            viewBox="0 0 14 15"
            fill="none"
            width="10"
            xmlns="http://www.w3.org/2000/svg"
            class="button__icon-svg button__icon-svg--copy"
          >
            <path
              d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"
              fill="currentColor"
            ></path>
          </svg>
        </span>
        Coba Sekarang !
      </button>

    </div>
  </section>
<!-- beli End -->

  <!-- Fitur Start -->
   <section id="fitur">
    <h2>SOLUSI MUDAH MENGELOLA KOS</h2>
    <hr class="title-underline">

    <div class="fitur-container">
      
      <!-- Fitur 1 -->
      <div class="fitur-content">
        <div class="left-section">
          <h3>MUDAH MENGLOLA KAMAR</h3>
          <p>Dengan KuKos, Anda bisa mengelola kamar kos dengan mudah, kapan saja dan di mana saja. Semua pengaturan dapat dilakukan langsung dari perangkat Anda, tanpa repot. Praktis dan efisien!</p>
        </div>
        
        <div class="right-section">
          <img src="../public/assets/dashboard/fitur-1.png" alt="foto-fitur-1">
        </div>
      </div>
      <!-- Fitur 1 -->

      <!-- Fitur 2 -->
      <div class="fitur-content">
        <div class="left-section-mid">
          <img src="../public/assets/dashboard/fitur-2.png" alt="foto-fitur-2">
        </div>
        
        <div class="right-section-mid">
          <h3>MUDAH MENGELOLA PENGHUNI KAMAR</h3>
          <p>KuKos memudahkan Anda mengelola data penyewa kos secara terorganisir. Pantau siapa saja penyewa, kapan mereka membayar, atau waktu kontrak berakhir. Semua ada dalam satu sistem!</p>
        </div>        
      </div>
      <!-- Fitur 2 -->

      <!-- Fitur 3 -->
      <div class="fitur-content">
        <div class="left-section">
          <h3>MUDAH MENGLOLA FASILITAS KAMAR</h3>
          <p>Dengan KuKos, pengelolaan fasilitas kos jadi lebih mudah. Catat fasilitas yang tersedia dan pantau kondisinya dengan cepat. Tingkatkan kenyamanan penghuni tanpa ribet!</p>
        </div>
        
        <div class="right-section">
          <img src="../public/assets/dashboard/fitur-3.png" alt="foto-fitur-3">
        </div>
      </div>
      <!-- Fitur 3 -->

    </div>
   </section>
  <!-- Fitur End -->

  <!-- Footer Start -->
  <footer id="footer" class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">
          <a href="#home">Ku<span>Kos</span></a>
        </a>

        </div>
          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Company</p>
            </li>

            <li>
              <a href="#home" class="footer-link">Home</a>
            </li>

            <li>
              <a href="#order" class="footer-link">About Us</a>
            </li>

            <li>
              <a href="#blog" class="footer-link">Our Product</a>
            </li>
          </ul>

      </div>

      <div class="footer-bottom">

        <p class="copyright">
          &copy; 2024 <a href="#">KuKos</a>. All Rights Reserved
        </p>

      </div>

    </div>
  </footer>
  <!-- Footer End -->


</body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
      </script>

      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
      <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

      <script>new DataTable("#tabelku")</script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
      <?php endif ?>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php if ($this->session->flashdata('pesan_gagal')): ?>
        <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
      <?php endif ?>    
</html>