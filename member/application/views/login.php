<div class="container">
  <div class="row">
      <div class="col-md-8 offset-md-2 mt-4">
				<h5>Login</h5>
        <form method="post">

          <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon_member" class="form-control" value="<?php echo set_value("nomor_telepon_member") ?>">
            <span class="text-danger"><?php echo form_error("nomor_telepon_member") ?></span>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password_member" class="form-control">
            <span class="text-danger"><?php echo form_error("password_member") ?></span>
          </div>

          <button type="submit" class="btn btn-success">Login</button>

          </form>
      </div>
			
    </div>
</div>