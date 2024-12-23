<section class="text-center" style="background-color: rgb(246, 249, 246); height:95vh; overflow-y:auto">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              
              <img style="width:100%; height:100%; border-radius: 1rem 0 0 1rem;" src="../public/assets/member/dashboard/kukos-login-left.png"              
              alt="login form" class="img-fluid" />

            </div>
            <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                
                <form method="post">
                  <div class="d-flex justify-content-center align-items-center">
                    <h2 class="fw-700" style="font-weight: 600;">Login</h2>
                  </div>

                  <div class="form-outlinem mt-4">
                    <input placeholder="nomor telepon" type="text" name="nomor_telepon_member" class="form-control" value="<?php echo set_value("nomor_telepon_member") ?>">
                    <span class="text-danger"><?php echo form_error("nomor_telepon_member") ?></span>
                    
                  </div>

                  <div class="form-outline mt-4">
                    <input placeholder="password" type="password" name="password_member" class="form-control">
                    <span class="text-danger"><?php echo form_error("password_member") ?></span>
                  </div>

                  <div class=" mt-4">
                    <button type="submit" class="btn btn--green fs-5">Login</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Belum Punya Akun ? <a href="daftar.php"
                    class="fw-500 text-body"><u>Daftar Sekarang</u></a></p>

                </form>
              <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>