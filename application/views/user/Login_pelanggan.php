<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Content -->
    <div class="row justify-content-center">
      <!-- Login Card -->
      <div class="card shadow" style="max-width: 400px; height: 430px;">
        <div class="card-body my-4">
          <h4 class="mb-5 text-center fw-bold">Login Snack Grosir</h4>

          <?php
          echo validation_errors('<div class="alert alert-primary alert-dismissible" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');

          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
          }

          //Belum Login Atau Username & Password Salah
          if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo $this->session->flashdata('error');
            echo '</div>';
          }
          //

          echo form_open('Pelanggan/login'); ?>
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
          <button type="submit" class="btn btn-primary d-grid w-100 mt-4">Login</button>
          <?php echo form_close() ?>
          <p class="text-center mt-4">
            <span>Belum Punya Akun?</span>
            <a href="<?php echo base_url('Pelanggan/register') ?>" class="text-decoration-none">
              <span>Daftar</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Login Card -->
    </div>
    <!-- / Content -->
  </div>
</div>