          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="card-header bg-primary text-white">Admin</h4>
              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#add">
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
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($user as $key => $value) { ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td class="text-center"><?php echo $value->nama ?></td>
                          <td class="text-center"><?php echo $value->username ?></td>
                          <td class="text-center"><?php echo $value->password ?></td>
                          <td>
                            <!-- <button class="btn btn-secondary btn-sm">
                              <i class="fas fa-search-plus"></i>
                            </button> -->
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $value->id_user ?>">
                              <i class="bx bx-edit"></i>
                            </button>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value->id_user ?>">
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

            <!-- Modal Tambah -->
            <div class="modal fade" id="add">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open('User/add') ?>
                    <div class="mb-2">
                      <label class="form-label"><strong>Nama</strong></label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required />
                      </div>
                    </div>

                    <div class="mb-2">
                      <label class="form-label"><strong>Username</strong></label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required />
                      </div>
                    </div>

                    <div class="form-password-toggle mb-2">
                      <label class="form-label"><strong>Password</strong></label>
                      <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
            <?php foreach ($user as $key => $value) { ?>
              <div class="modal fade" id="update<?php echo $value->id_user ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('User/update/' . $value->id_user) ?>

                      <div class="mb-2">
                        <label class="form-label"><strong>Nama</strong></label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text" class="form-control" name="nama" value="<?php echo $value->nama ?>" placeholder="Nama Lengkap" required />
                        </div>
                      </div>

                      <div class="mb-2">
                        <label class="form-label"><strong>Username</strong></label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text" class="form-control" name="username" value="<?php echo $value->username ?>" placeholder="Username" required />
                        </div>
                      </div>

                      <div class="form-password-toggle mb-2">
                        <label class="form-label"><strong>Password</strong></label>
                        <div class="input-group input-group-merge">
                          <input type="password" class="form-control" name="password" value="<?php echo $value->password ?>" placeholder="Password" required />
                          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
                      <a href="<?php echo base_url('User/delete/' . $value->id_user) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- // Modal Hapus -->