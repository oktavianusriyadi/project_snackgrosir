<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="card-header bg-primary text-white mb-3">Laporan Penjualan</h4>
    <div class="row">
      <!-- Laporan Harian -->
      <div class="col-md-4">
        <div class="card">
          <h4 class="card-header bg-primary text-white">Laporan Harian</h4>
          <div class="card-body">
            <?php echo form_open('admin/Laporan/lap_harian') ?>
            <div class="row mt-3">
              <div class="col-md-6">
                <label>Tanggal</label>
                <select name="tanggal" class="form-select">
                  <?php
                  $mulai = 1;
                  for ($i = $mulai; $i < $mulai + 31; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Bulan</label>
                <select name="bulan" class="form-select">
                  <?php
                  $mulai = 1;
                  for ($i = $mulai; $i < $mulai + 12; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-12 mt-2">
                <label>Tahun</label>
                <select name="tahun" class="form-select">
                  <?php
                  $mulai = date('Y') - 1;
                  for ($i = $mulai; $i < $mulai + 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan</button>
              </div>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
      <!-- End Laporan Harian -->

      <!-- Laporan Bulanan -->
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header bg-secondary text-white">
            Laporan Bulanan
          </h5>
          <div class="card-body">

          </div>
        </div>
      </div>
      <!-- End Laporan Bulanan -->

      <!-- Laporan Tahunan -->
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header bg-info text-white">
            Laporan Tahunan
          </h5>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
    <!-- End Laporan Tahunan -->