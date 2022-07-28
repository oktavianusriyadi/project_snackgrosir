<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Account -->
    <div class="card">
      <h5 class="card-header"> <i class="bx bxs-user"></i> Akun Saya</h5>
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">Nama Lengkap</label>
              <input class="form-control" name="nama_pelanggan">
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" name="email">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">No. Telepon</label>
              <div class="input-group input-group-merge">
                <input name="no_hp" class="form-control">
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="1"></textarea>
            </div>
            
            <div class="mb-3 col-md-6">
              <label class="form-label">Provinsi</label>
              <select name="provinsi" class="form-select"></select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Kota/Kabupaten</label>
              <select name="kota" class="form-select"></select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="state" class="form-label">Kode POS</label>
              <input class="form-control" name="kode_pos">
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <button type="reset" class="btn btn-outline-secondary">Batal</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /Account -->
  </div>
</div>