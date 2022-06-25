<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Content -->
    <div class="row justify-content-center">
      <!-- Register Card -->
      <div class="card shadow" style="max-width: 400px;">
        <div class="card-body">
          <h4 class="mb-4 text-center">Daftar Di Snack Grosir</h4>

          <?php
          echo validation_errors('<div class="alert alert-primary alert-dismissible" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');

          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
          }

          echo form_open('Pelanggan/register') ?>
          <div class="mb-3">
            <label for="username" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo set_value('nama_pelanggan') ?>" placeholder="Nama Lengkap" autofocus />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Enter your email" />
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Konfirmasi Password</label>
            <div class="input-group input-group-merge">
              <input type="password" class="form-control" name="konfirmasi_password" value="<?php echo set_value('konfirmasi_password') ?>" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100">Daftar</button>
          <?php echo form_close() ?>
          <p class="text-center">
            <span>Sudah Punya akun?</span>
            <a href="auth-login-basic.html">
              <span>Login</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
    <!-- / Content -->
  </div>
</div>