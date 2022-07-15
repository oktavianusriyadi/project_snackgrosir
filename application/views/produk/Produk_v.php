          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="card-header bg-primary text-white">Produk</h4>
              <div class="card">
                <div class="card-header">
                  <a href="<?php echo base_url('Produk/add') ?>" type="button" class="btn btn-primary mb-4">
                    Tambah
                  </a>
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
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Berat</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($produk as $key => $value) { ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td class="text-center"><?php echo $value->nama_produk ?></td>
                          <td class="text-center"><?php echo $value->kategori ?></td>
                          <td class="text-center"><?php echo $value->berat ?> Gr</td>
                          <td class="text-center">Rp. <?php echo number_format($value->harga, 0) ?></td>
                          <td class="text-center">
                            <img src="<?php echo base_url('assets/imgcover/' . $value->gambar) ?>" width="100px">
                          </td>
                          <td>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $value->id_produk ?>">
                              <i class="fas fa-search-plus"></i>
                            </button>
                            <a href="<?php echo base_url('produk/update/' . $value->id_produk) ?>" class="btn btn-primary btn-sm">
                              <i class="bx bx-edit"></i>
                            </a>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value->id_produk ?>">
                              <i class="bx bx-trash"></i>
                            </button>
                          </td>
                        </tr>
                      <?php }  ?>
                    </tbody>
                  </table>
                </div>
                <!-- / Content -->
              </div>
            </div>

            <!-- Modal Delete -->
            <?php foreach ($produk as $key => $value) { ?>
              <div class="modal fade" id="delete<?php echo $value->id_produk ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Data <?php echo $value->nama_produk ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data ini?</strong></h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo base_url('Produk/delete/' . $value->id_produk) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- //Modal Delete -->

            <!-- Modal Detail -->
            <?php foreach ($produk as $key => $value) { ?>
              <div class="modal fade" id="detail<?php echo $value->id_produk ?>">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><?php echo $value->nama_produk ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="<?php echo base_url('assets/imgcover/' . $value->gambar) ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <table class="table">
                              <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><?php echo $value->kategori ?></td>
                              </tr>
                              <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td><?php echo $value->berat ?> Gram</td>
                              </tr>
                              <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>Rp <?php echo number_format($value->harga, 0) ?></td>
                              </tr>
                            </table>
                            <p>
                              <b>Deskripsi :</b><br>
                              <?php echo $value->deskripsi ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo base_url('produk/update/' . $value->id_produk) ?>" class="btn btn-primary">
                        Update
                      </a>
                      <a href="<?php echo base_url('Produk/delete/' . $value->id_produk) ?>" class="btn btn-danger">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- //Modal Detail -->