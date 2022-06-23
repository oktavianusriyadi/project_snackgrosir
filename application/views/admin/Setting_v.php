          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header bg-primary text-white"><i class="menu-icon tf-icon fas fa-cog"></i>Setting</h5>
                <div class="card-body">
                  <?php echo form_open_multipart('Admin/setting') ?>
                  <div class="row">
                    <div class="col-xxl">
                      <div class="card-body">
                        <form>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <label class="form-label"><strong>Provinsi</strong></label>
                              <select name="provinsi" class="form-select"></select>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label"><strong>Kota</strong></label>
                              <select name="kota" class="form-select"></select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <label class="form-label"><strong>Nama Toko</strong></label>
                              <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label"><strong>No. Telepon</strong></label>
                              <input type="text" name="no_tlp" class="form-control" placeholder="No Telepon" required>
                            </div>
                          </div>
                          <label class="form-label"><strong>No. Telepon</strong></label>
                          <input type="text" name="alamat_toko" class="form-control" placeholder="Alamat Toko" required>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo base_url('admin/Admin'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
              $(document).ready(function() {
                //Data Provinsi
                $.ajax({
                  type: "POST",
                  url: "<?= base_url('rajaongkir/provinsi') ?>",
                  success: function(hasil_provinsi) {
                    //console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                  }
                });

                //Data Kota
                $("select[name=provinsi]").on("change", function() {
                  var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('rajaongkir/kota') ?>",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota) {
                      // console.log(hasil_kota);
                      $("select[name=kota]").html(hasil_kota);
                    }
                  });
                });
              });
            </script>