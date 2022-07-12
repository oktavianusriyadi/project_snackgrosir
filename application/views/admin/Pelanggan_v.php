          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <div class="card-header">
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
                        <th>Nama Pelanggan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($pelanggan as $key => $value) { ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td><?php echo $value->nama ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm">
                              <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value->id_pelanggan ?>">
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

            <!-- Modal Hapus -->
            <?php foreach ($user as $key => $value) { ?>
              <div class="modal fade" id="delete<?php echo $value->id_user ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Data <?php echo $value->nama ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data ini?</strong></h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo base_url('admin/User/delete/' . $value->id_user) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- // Modal Hapus -->