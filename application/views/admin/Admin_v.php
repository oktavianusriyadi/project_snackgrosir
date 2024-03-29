        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card cardD shadow text-center">
                  <a href="<?php echo base_url('Pesanan'); ?>">
                    <div class="row">
                      <div class="col-4">
                        <div class="card-body">
                          <i class="fa-solid icon fa-truck-fast mx-2 my-3"></i>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h5 class="card-title">Pesanan</h5>
                          <h3 class="card-text total fw-bold"><?php echo $total_pesanan ?></h3>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card cardD shadow text-center">
                  <a href="<?php echo base_url('Produk') ?>">
                    <div class="row">
                      <div class="col-4">
                        <div class="card-body">
                          <i class="fa-solid icon fa-cube mx-2 my-3"></i>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h5 class="card-title">Produk</h5>
                          <h3 class="card-text total fw-bold"><?php echo $total_produk ?></h3>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <!-- <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card cardD shadow text-center">
                  <a href="<?php echo base_url('admin/Admin'); ?>">
                    <div class="row">
                      <div class="col-3">
                        <div class="card-body">
                          <i class="bx bxs-user bx-lg mx-0 my-2"></i>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="card-body">
                          <h5 class="card-title">Customer</h5>
                          <h3 class="card-text total fw-bold"><?php echo $total_pelanggan ?></h3>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div> -->

              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card cardD shadow text-center">
                  <a href="<?php echo base_url('User'); ?>">
                    <div class="row">
                      <div class="col-4">
                        <div class="card-body">
                          <i class="fa-solid icon fa-user mx-2 my-3"></i>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h5 class="card-title">User</h5>
                          <h3 class="card-text total fw-bold"><?php echo $total_user  ?></h3>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card cardD shadow text-center">
                  <a href="<?php echo base_url('Kategori') ?>">
                    <div class="row">
                      <div class="col-4">
                        <div class="card-body text-decoration-none">
                          <i class="fa-solid icon fa-cubes mx-2 my-3"></i>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h5 class="card-title">Kategori</h5>
                          <h3 class="card-text total fw-bold"><?php echo $total_kategori ?></h3>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

            </div>
          </div>
          <!-- / Content -->