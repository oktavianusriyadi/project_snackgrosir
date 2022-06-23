          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <a href="<?php echo base_url('Produk') ?>" class="btn btn-secondary mb-4">Kembali</a>
              <?php
              //Notifikasi Form Kosong
              echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
              //Notifikasi Error Upload
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo $this->session->flashdata('erorr_upload');
                echo '</div>';
              }
              echo form_open_multipart('Produk/update/' . $produk->id_produk) ?>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Update Produk</h5>
                      <small class="text-muted float-end">Snack Grosir Pontianak</small>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Nama Produk</strong></label>
                          <div class="col-sm-10">
                            <input class="form-control" name="nama_produk" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Kategori</strong></label>
                          <div class="col-sm-10">
                            <select name="id_kategori" class="form-select">
                              <option value="<?php echo $produk->id_kategori ?>"><?php echo $produk->kategori ?></option>
                              <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?php echo $value->id_kategori ?>"><?php echo $value->kategori ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Berat (Gram)</strong></label>
                          <div class="col-sm-10">
                            <input class="form-control" type="number" name="berat" value="<?php echo $produk->berat ?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Harga</strong></label>
                          <div class="col-sm-10">
                            <input class="form-control" name="harga" placeholder="Harga Produk" value="<?php echo $produk->harga ?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Deskripsi</strong></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" rows="2" placeholder="Deskripsi Produk"><?php echo $produk->deskripsi ?></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><strong>Update Gambar</strong></label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="gambar" id="preview">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-sm-12 text-center">
                            <img src="<?php echo base_url('assets/imgcover/' . $produk->gambar) ?>" class="imgpreview" id="gambar">
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php echo form_close() ?>
              </div>
            </div>
          </div>
          <!-- / Content -->

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
              width: 160px;
            }

            @media (max-width:600px) {
              .imgpreview {
                margin-top: 1em;

              }
            }
          </style>