          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

              <h4 class="card-header bg-primary text-white">Kategori</h4>

              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah
                  </button>
                </div>
                <div class="card-body">
                  <!-- Content -->
                  <?php
                  if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                  }
                  ?>

                  <table id="example" class="display compact" style="width:100%">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($kategori as $key => $value) { ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td><?php echo $value->kategori ?></td>
                          <td>
                            <!-- <button class="btn btn-secondary btn-sm">
                              <i class="fas fa-search-plus"></i>
                            </button> -->
                            <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#update<?php echo $value->id_kategori ?>">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value->id_kategori ?>">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- / Content -->
              </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="add">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open('Kategori/add') ?>

                    <div class="mb-2">
                      <label class="form-label"><strong>Kategori Produk</strong></label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class='bx bxs-category'></i></span>
                        <input type="text" class="form-control" name="kategori" placeholder="Kategori Produk" required />
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  <?php echo form_close() ?>
                </div>
              </div>
            </div>
            <!-- // Modal Tambah -->

            <!-- Modal Edit -->
            <?php foreach ($kategori as $key => $value) { ?>
              <div class="modal fade" id="update<?php echo $value->id_kategori ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Kategori</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('Kategori/update/' . $value->id_kategori) ?>

                      <div class="mb-2">
                        <label class="form-label"><strong>Kategori Produk</strong></label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class='bx bxs-category'></i></span>
                          <input type="text" class="form-control" name="kategori" value="<?php echo $value->kategori ?>" placeholder="Kategori Produk" required />
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <?php echo form_close() ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- // Modal Edit -->

            <!-- Modal Hapus -->
            <?php foreach ($kategori as $key => $value) { ?>
              <div class="modal fade" id="delete<?php echo $value->id_kategori ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Data <?php echo $value->kategori ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data ini?</strong></h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo base_url('Kategori/delete/' . $value->id_kategori) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- // Modal Hapus -->