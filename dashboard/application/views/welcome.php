
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
          <h3>MUDAH MENGELOLA KAMAR</h3>
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

      <section class="article-container">
        <article>
          <h2>Bergabung Bersama Kami</h2>
          <button>
            <p>Coba Sekarang !</p>
            <span class="material-symbols-outlined"> trending_flat </span>
          </button>
        </article>
      </section>
        
      <section class="top">

          <div class="left">
            <a href="#hero" class="footer-text-logo">Ku<span>Kos</span></a>
            <p>SOLUSI MUDAH MENGELOLA KOS</p>
          </div>
          
          <div class="mid">
            <a href="#hero">Fitur</a>
            <a href="#biaya">Biaya</a>
            <a href="#panduan">Panduan</a>
            <a href="#contact">Hubungi Kami</a>
          </div>
        
          <div class="right">
            <a>Whatsapp</a>
            <a href="#">081412412782</a>
          </div>
      </section>

       <section class="footer-bottom">
        <p class="copyright">
          &copy; 2024 <a href="#">KuKos</a>. All Rights Reserved
        </p>
      </section>
     
  </footer>
  <!-- Footer End -->

