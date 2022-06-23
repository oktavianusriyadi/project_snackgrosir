          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <a href="<?php echo base_url('Gambar') ?>" class="btn btn-secondary mb-4">Kembali</a>
              <?php
              //Notifikasi Form Kosong
              echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
              //
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
              }
              //Notifikasi Error Upload
              if ($this->session->flashdata('erorr_upload')) {
                echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo $this->session->flashdata('erorr_upload');
                echo '</div>';
              }
              echo form_open_multipart('Gambar/add/' . $produk->id_produk) ?>
              <div class="col-md">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Tambah Gambar : <?php echo $produk->nama_produk ?></h5>
                        <form>
                          <div class="row mt-4 mb-3">
                            <label class="col-sm-3 col-form-label"><strong>Ket. Gambar</strong></label>
                            <div class="col-sm-9">
                              <input class="form-control" name="ketgambar" placeholder="Keterangan Gambar" value="<?php echo set_value('ketgambar') ?>" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"><strong>Gambar</strong></label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="gambar" id="preview" required>
                            </div>
                          </div>
                          <!-- Button Simpan -->
                          <div class="row justify-content-end">
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                          <!-- //Button Simpan -->
                        </form>
                      </div>
                    </div>
                    <!-- ImgPreview -->
                    <div class="col-md-4">
                      <img src="<?php echo base_url('assets/imgcover/not-found.jpg') ?>" class="card-img card-img-right imgpreview" id="gambar" alt="Card image" />
                    </div>
                    <!-- //ImgPreview -->
                  </div>
                </div>
              </div>
              <?php echo form_close() ?>
              <div class="row">
                <!-- List Gambar -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="divider">
                        <div class="divider-text">List Gambar Produk</div>
                      </div>
                      <div class="row">
                        <?php foreach ($gambarP as $key => $value) { ?>
                          <div class="col-sm-3 text-center">
                            <img src="<?php echo base_url('assets/imgproduk/' . $value->gambar) ?>" class="card-img card-img-right imgpreview" id="gambar" width="100%" height="200px" />
                            <p class="text-black mt-2"><?php echo $value->ketgambar ?></p>
                            <div class="d-grid">
                              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value->id_gambar ?>">
                                Hapus
                              </button>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Modal Delete -->
            <?php foreach ($gambarP as $key => $value) { ?>
              <div class="modal fade" id="delete<?php echo $value->id_gambar ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Gambar <?php echo $value->ketgambar ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Gambar ini?</strong></h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo base_url('Gambar/delete/' . $value->id_produk . '/' . $value->id_gambar) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- //Modal Delete -->

            <script>
              function bacaGambar(input) {
                if (input.files && input.files[0]); {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    $("#gambar").attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
                }
              }
              $("#preview").change(function() {
                bacaGambar(this);
              });
            </script>

            <style>
              .imgpreview {
                box-sizing: border-box;
                border-radius: 10px;
              }

              @media (max-width:600px) {
                .imgpreview {
                  margin-top: 1em;

                }
              }
            </style>