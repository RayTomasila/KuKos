<section class="container register-container">
    <div class="wrapper">
        <h2>Daftar Akun KuKos</h2>
        <form method="post">
          <div class="input-box">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap_member" class="form-control"
              value="<?php echo set_value("nama_lengkap_member") ?>" required>
            <span class="text-muted"><?php echo form_error("nama_lengkap_member") ?></span>
          </div>

          <div class="input-box">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon_member" class="form-control"
              value="<?php echo set_value("nomor_telepon_member") ?>" numeric>
            <span class="text-muted"><?php echo form_error("nomor_telepon_member") ?></span>
          </div>

          <div class="input-box">
            <label>Password</label>
            <input type="password" name="password_member" class="form-control"
              value="<?php echo set_value("password_member") ?>">
            <span class="text-muted"><?php echo form_error("password_member") ?></span>
          </div>

          <div class="input-box">
            <label>Alamat</label>
            <input type="text" name="alamat_member" class="form-control"
              value="<?php echo set_value("alamat_member") ?>">
          </div>

          <div class="input-box city-dropdown">
            <label>Kota/Kabupaten</label>
            <select 
                name="city_id" 
                class="form-control form-select searchable-dropdown" 
                placeholder="Cari Kota/Kabupaten..">
                <option value="">Pilih</option>
                <?php foreach ($distrik as $key => $value): ?>
                    <option value="<?php echo $value["city_id"] ?>"
                        <?php echo $value["city_id"] == set_value("city_id") ? "selected" : "" ?>>
                        <?php echo $value["type"] . ' ' . $value["city_name"] . ' ' . $value["province"]; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="button-container">
          <div class="button button-register">
            <input type="Submit" value="daftar Sekarang">
          </div>
        </div>

          <div class="text">
            <h3>Sudah Punya Akun?<a href="#" data-bs-toggle="modal" data-bs-target="#login"> Login Sekarang</a></h3>
          </div>
        </form>

    </div>
    <div>
        <h1>Mudahkan Pengalaman Kelola Kosmu dengan KuKos.</h1>
    </div>
</section>