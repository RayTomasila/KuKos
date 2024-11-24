<div class="container mt-5">
  <h5 class="mb-4">Ubah Akun</h5>

  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <form method="post">
        
        <!-- Username -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value("username", $this->session->userdata("username")) ?>">
          <span class="text-danger small"><?php echo form_error("username") ?></span>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-control">
          <p class="text-muted">Kosongkan jika Password tidak diubah</p>
        </div>

        <!-- Nama Lengkap -->
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" class="form-control" value="<?php echo set_value("nama", $this->session->userdata("nama")) ?>">
          <span class="small text-danger"><?php echo form_error("nama") ?></span>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100" style="background-color: #93d56b; border-color: #93d56b; color: white;">Ubah Akun</button>

      </form>
    </div>
  </div>
</div>
