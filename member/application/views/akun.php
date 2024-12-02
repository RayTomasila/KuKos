<div class="container mt-5">
  <h5>Ubah Akun</h5>

  <div class="row">
    <div class="col-md-8 ">
      <form method="post">

        <div class="mb-3">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member",$this->session->userdata("nama_member")) ?>">
          <span class="small text-danger">
                <?php echo form_error("nama_member") ?>
            </span>
        </div>

        <div class="mb-3">
          <label>Nomor Telepon</label>
          <input type="text" name="nomor_telepon_member" class="form-control" value="<?php echo set_value("nomor_telepon_member",$this->session->userdata("nomor_telepon_member")) ?>">
          <span class="small text-danger">
            <?php echo form_error("nomor_telepon_member") ?>
          </span>
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="text" name="password_member" class="form-control">
          <p class="text-muted">Kosongkan jika Password tidak diubah</p>
        </div>

        <div class="mb-3">
          <label>Alamat Lengkap</label>
          <input type="text" name="alamat_member" class="form-control" value="<?php echo set_value("alamat_member",$this->session->userdata("alamat_member")) ?>">
          <span class="small text-danger">
                <?php echo form_error("alamat_member") ?>
            </span>
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



        <button class="btn-primary-bg">Ubah Akun</button>
        
      </form>
      </div>
   </div>
</div>