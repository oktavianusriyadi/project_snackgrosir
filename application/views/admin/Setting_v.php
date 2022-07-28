          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header bg-primary text-white"><i class="fas menu-icon tf-icon fa-cog"></i>Setting</h5>
                <div class="card-body">
                  <!-- Content -->
                  <?php
                  if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-dark alert-dismissible mt-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                  }

                  echo form_open('admin/Admin/setting'); ?>
                  <div class="row">
                    <div class="col-xxl">
                      <div class="card-body">
                        <form>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label"><strong>Provinsi</strong></label>
                                <select name="provinsi" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label"><strong>Kota</strong></label>
                                <select name="kota" class="form-select">
                                  <option value="<?php echo $setting->lokasi ?>"><?php echo $setting->lokasi ?></option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label"><strong>Nama Toko</strong></label>
                                <input type="text" name="nama_toko" value="<?php echo $setting->nama_toko ?>" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label"><strong>No. Telepon</strong></label>
                                <input type="text" name="no_tlp" value="<?php echo $setting->no_tlp ?>" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label"><strong>Alamat Toko</strong></label>
                            <input type="text" name="alamat_toko" value="<?php echo $setting->alamat_toko ?>" class="form-control" required>
                          </div>
                          <section>
                            <div class="row">
                              <div class="text-lg-end">
                                <a href="<?php echo base_url('admin/Admin'); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                          </section>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                  <!-- //Content -->
                </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
              $(document).ready(function() {
                //Menampilkan Data Provinsi
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('Rajaongkir/provinsi') ?>",
                  success: function(hasil_provinsi) {
                    //console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                  }
                });

                //Menampilkan Data Kota
                $("select[name=provinsi]").on("change", function() {
                  var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Rajaongkir/kota_toko') ?>",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota) {
                      // console.log(hasil_kota);
                      $("select[name=kota]").html(hasil_kota);
                    }
                  });
                });
              });
            </script>