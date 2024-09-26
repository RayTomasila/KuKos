<div class="container">
  <div class="row">
      <div class="col-md-8 offset-md-2 mt-4">
				<h5>Registrasi</h5>
				<form method="post">
						<div class="mb-3">
							<label>Email</label>
							<input type="email" name="email_member" class="form-control" value="<?php echo set_value("email_member") ?>">
							<span class="text-muted"><?php echo form_error("email_member") ?></span>
						</div>

						<div class="mb-3">
							<label>Password</label>
							<input type="text" name="password_member" class="form-control" value="<?php echo set_value("password_member") ?>">
							<span class="text-muted"><?php echo form_error("password_member") ?></span>
						</div>

						<div class="mb-3">
							<label>Nama</label>
							<input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member") ?>">
							<span class="text-muted"><?php echo form_error("nama_member") ?></span>
						</div>

						<div class="mb-3">
							<label>Alamat</label>
							<input type="text" name="alamat_member" class="form-control" value="<?php echo set_value("alamat_member") ?>">
							<span class="text-muted"><?php echo form_error("alamat_member") ?></span>
						</div>

						<div class="mb-3">
							<label>Wa</label>
							<input type="text" name="wa_member" class="form-control" value="<?php echo set_value("wa_member") ?>">
							<span class="text-muted"><?php echo form_error("	_member") ?></span>
						</div>

						<div class="mb-3">
							<label>Kota/Kabupaten</label>
								<select name="city_id" class="form-control form-select">
									<option value="">Pilih</option>
									
										<?php foreach ($distrik as $key => $value): ?>

											<option value="<?php echo $value["city_id"] ?>"
											<?php echo $value["city_id"] == set_value("city_id") ? "selected" : ""?> >
												<?php echo $value["type"] ?>
												<?php echo $value["city_name"] ?>
												<?php echo $value["province"] ?>
											</option>

										<?php endforeach ?>
								</select>
							<span class="text-muted"><?php echo form_error("city_id") ?></span>
						</div>
						
						<button class="btn btn-primary">Daftar</button>
					</form>	
      </div>
			
    </div>
</div>