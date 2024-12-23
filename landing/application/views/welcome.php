<!-- Hero Start -->
  <section id="beranda">
    <div class="hero-container">
      <div class="hero-left-section container">
        <p class="hero-title">Solusi manajemen kos yang praktis dan efisien</p>
        <p class="hero-text ">Tingkatkan pengalaman pengelolaan kos Anda dengan fitur yang dirancang untuk menghemat waktu, mengoptimalkan pendapatan, dan memberikan layanan terbaik bagi penghuni. </p>

        <!-- /* Button From Uiverse.io by cssbuttons-io */  -->
          <div class="hero-button-container">
            <?php if ($this->session->userdata('id_member')) { ?>
                <a href="<?php echo base_url('transaksi'); ?>" class="button" style="--clr: #7808d0">
            <?php } else { ?>
                <a href="<?php echo base_url('register'); ?>" class="button" style="--clr: #7808d0">
            <?php } ?>
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
              Coba Sekarang!
            </a>
          </div>
        <!-- /* Button From Uiverse.io by cssbuttons-io */  -->

      </div>

      <div class="hero-right-section">
        <img src="../public/assets/landing/hero-bg.png" class="">
      </div>
    </div>
  </section>
<!-- Hero end -->

<!-- Fitur Start -->
  <section id="fitur">
    <div class="fitur-container">
      
      <!-- Fitur 1 -->
      <div class="fitur-content fitur-content-1">
        <div class="left-section">
          <p class="fitur-title">Mengelola kamar kini lebih mudah dengan KuKos</p>
          <p class="fitur-description">Dengan KuKos, Anda bisa mengelola kamar kos dengan mudah, 
            kapan saja dan di mana saja. 
            Semua pengaturan dapat dilakukan 
            langsung dari perangkat Anda, tanpa repot.
              Praktis dan efisien!</p>
        </div>
        
        <div class="right-section">
          <img src="../public/assets/landing/fitur-1.png" alt="foto-fitur-1">
        </div>
      </div>
      <!-- Fitur 1 -->

      <!-- Fitur 2 -->
      <div class="fitur-content fitur-content-2">
        <div class="left-section-mid">
          <img src="../public/assets/landing/fitur-2.png" alt="foto-fitur-2">
        </div>
        
        <div class="right-section-mid">
          <p class="fitur-title">Kelola penyewa kamar mudah dengan KuKos</p>
          <p class="fitur-description">KuKos memudahkan Anda mengelola data penyewa kos secara terorganisir.
            Pantau siapa saja penyewa, kapan mereka membayar, atau waktu kontrak berakhir. 
            Semua ada dalam satu sistem!</p>
        </div>        
      </div>
      <!-- Fitur 2 -->

      <!-- Fitur 3 -->
      <div class="fitur-content fitur-content-3">
        <div class="left-section">
          <p class="fitur-title">Mengelola fasilitas lebih mudah dengan KuKos</p>
          <p class="fitur-description">Dengan KuKos, pengelolaan fasilitas kos jadi lebih mudah. 
            Catat fasilitas yang tersedia dan pantau kondisinya dengan cepat. 
            Tingkatkan kenyamanan penghuni tanpa ribet!</p>
        </div>
        
        <div class="right-section">
          <img src="../public/assets/landing/fitur-3.png" alt="foto-fitur-3">
        </div>
      </div>
      <!-- Fitur 3 -->

    </div>
  </section>
<!-- Fitur End -->

<!-- Footer Start -->
  <footer id="footer" class="footer">       
    <div class="container">
      <section class="top">
        <div class="left">
          <a href="#beranda" class="footer-text-logo">Ku<span>Kos</span></a>
          <p>SOLUSI MUDAH MENGELOLA KOS</p>
        </div>
        
        <div class="mid">
          <a href="#fitur">Fitur</a>
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
    </div> 
  </footer>
<!-- Footer End -->

