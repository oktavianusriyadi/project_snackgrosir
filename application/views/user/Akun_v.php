<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Account -->
    <div class="card">
      <h5 class="card-header"> <i class="bx bxs-user"></i> Akun Saya</h5>
      <div class="card-body">
        <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-dark alert-dismissible mt-4" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
        echo form_open('Pelanggan/akun_saya'); ?>
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Nama Lengkap</label>
            <input name="nama_pelanggan" value="<?php echo $akun->nama_pelanggan ?>" class="form-control">
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input name="email" value="<?php echo $akun->email ?>" class="form-control">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">No. Telepon</label>
            <div class="input-group input-group-merge">
              <input name="no_tlp" value="<?php echo $akun->no_tlp ?>" class="form-control">
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="alamat" value="<?php echo $akun->alamat ?> class=" form-control" rows="1"></textarea>
          </div>

          <div class="mb-3 col-md-6">
            <label class="form-label">Provinsi</label>
            <select name="provinsi" value="<?php echo $akun->provinsi ?>" class="form-select"></select>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Kota/Kabupaten</label>
            <select name="kota" value="<?php echo $akun->kota ?> class=" form-select"></select>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Kode POS</label>
            <input name="kode_pos" value="<?php echo $akun->kode_pos ?>" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <div class="input-group">
              <input type="password" value="<?php echo $akun->password ?>" class="form-control">
              <button class="btn btn-danger">Ubah Pasword</button>
            </div>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
          <button type="reset" class="btn btn-outline-secondary">Batal</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <!-- /Account -->
  </div>
</div>

<!-- Edit Akun -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-dark alert-dismissible mt-4" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
        echo form_open('Pelanggan/akun_saya'); ?>
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Nama Lengkap</label>
            <input name="nama_pelanggan" value="<?php echo $akun->nama_pelanggan ?>" class="form-control">
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input name="email" value="<?php echo $akun->email ?>" class="form-control">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">No. Telepon</label>
            <div class="input-group input-group-merge">
              <input name="no_tlp" value="<?php echo $akun->no_tlp ?>" class="form-control">
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="alamat" value="<?php echo $akun->alamat ?> class=" form-control" rows="1"></textarea>
          </div>

          <div class="mb-3 col-md-6">
            <label class="form-label">Provinsi</label>
            <select name="provinsi" value="<?php echo $akun->provinsi ?>" class="form-select"></select>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Kota/Kabupaten</label>
            <select name="kota" value="<?php echo $akun->kota ?> class=" form-select"></select>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Kode POS</label>
            <input name="kode_pos" value="<?php echo $akun->kode_pos ?>" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <div class="input-group">
              <input type="password" value="<?php echo $akun->password ?>" class="form-control">
              <button class="btn btn-danger">Ubah Pasword</button>
            </div>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
          <button type="reset" class="btn btn-outline-secondary">Batal</button>
        </div>
        <?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div> -->