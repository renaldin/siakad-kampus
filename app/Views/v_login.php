<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Login</b> SIAKAD</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>

    <?php 
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($errors as $key => $value) { ?>
                <li><?= esc($value); ?></li>
            <?php } ?>
          </ul>
        </div>
    <?php  } ?>
    <?php 
    
    if (session()->getFlashdata('pesan')) {
      echo '<div class="alert alert-warning" role="alert">';
      echo session()->getFlashdata('pesan');
      echo '</div>';
    }

    if (session()->getFlashdata('success')) {
      echo '<div class="alert alert-success" role="alert">';
      echo session()->getFlashdata('success');
      echo '</div>';
    }

    ?>
    

    <?= form_open('Auth/cek_login'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="level" id="" class="form-control">
          <option value="">--Hak Akses--</option>
          <option value="1">Admin</option>
          <option value="2">Mahasiswa</option>
          <option value="3">Dosen</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>