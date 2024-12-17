<section class="container register-container">
  <h2 class="text-uppercase text-center">Register</h2>

  <div class="register-form container">
    <form method="post">
      <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap_member" class="form-control"
          value="<?php echo set_value("nama_lengkap_member") ?>">
        <span class="text-muted"><?php echo form_error("nama_lengkap_member") ?></span>
      </div>

      <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon_member" class="form-control"
          value="<?php echo set_value("nomor_telepon_member") ?>">
        <span class="text-muted"><?php echo form_error("nomor_telepon_member") ?></span>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password_member" class="form-control"
          value="<?php echo set_value("password_member") ?>">
        <span class="text-muted"><?php echo form_error("password_member") ?></span>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat_member" class="form-control"
          value="<?php echo set_value("alamat_member") ?>">
        <span class="text-muted"><?php echo form_error("alamat_member") ?></span>
      </div>

      <div class="mb-3 city-dropdown">
        <label>Kota/Kabupaten</label>
        <select name="city_id" class="form-control form-select searchable-dropdown">

          <option value="">Pilih</option>
          <?php foreach ($distrik as $key => $value): ?>
            <option value="<?php echo $value["city_id"] ?>"
              <?php echo $value["city_id"] == set_value("city_id") ? "selected" : "" ?>>
              <?php echo $value["type"] . ' ' . $value["city_name"] . ' ' . $value["province"]; ?>
            </option>
          <?php endforeach ?>

        </select>
        <span class="text-muted"><?php echo form_error("city_id") ?></span>
      </div>

      <div class="btn--green">
        <button>Register</button>
      </div>
    </form>
  </div>

</section>