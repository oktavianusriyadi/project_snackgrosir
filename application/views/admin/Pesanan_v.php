          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header bg-primary text-white"><i class="fa fa-shopping-bag tf-icon menu-icon"></i>Pesanan</h5>
                <div class="card-body">
                  <!-- Content -->
                  <!-- Tabs -->
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-blmbayar" aria-controls="navs-top-home" aria-selected="true">
                              Belum Bayar
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-sdhbayar" aria-controls="navs-top-profile" aria-selected="false">
                              Dikemas
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-kirim" aria-controls="navs-top-messages" aria-selected="false">
                              Dikirim
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-selesai" aria-controls="navs-top-messages" aria-selected="false">
                              Selesai
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="navs-top-blmbayar" role="tabpanel">
                            <table class="table">
                              <tr>
                                <th>No. Order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                              </tr>
                              <?php foreach ($pesanan_masuk as $key => $value) { ?>
                                <tr>
                                  <td><?php echo $value->no_order ?></td>
                                  <td><?php echo $value->tgl_order ?></td>
                                  <td>
                                    <b class="text-uppercase">
                                      <?php echo $value->expedisi ?>
                                    </b>
                                    (<?php echo $value->paket ?>) <br>
                                    <b>Rp <?php echo number_format($value->ongkir, 0) ?></b>
                                  </td>
                                  <td>
                                    <b>Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                                      <?php if ($value->status_bayar == 1) { ?>
                                        <span class="badge bg-warning text-black">Menunggu Konfirmasi</span>
                                      <?php } ?>
                                    </b>
                                  </td>
                                  <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                      <Button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#cek<?php echo $value->id_transaksi ?>">Bukti Bayar</Button>
                                      <a href="<?php echo base_url('Pesanan/konfirmasi/' . $value->id_transaksi) ?>" class="btn btn-sm btn-danger">Konfirmasi</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </table>
                          </div>
                          <div class="tab-pane fade" id="navs-top-sdhbayar" role="tabpanel">
                            <p>
                              Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                              cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                              cheesecake fruitcake.
                              Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                              cotton candy liquorice caramels.
                            </p>
                          </div>
                          <div class="tab-pane fade" id="navs-top-kirim" role="tabpanel">
                            <p>
                              Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                              cupcake gummi bears cake chocolate.
                            </p>
                            <p class="mb-0">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                              Blanditiis impedit ea eum porro aliquam itaque autem quas iste, <br>
                              animi accusamus ad numquam atque culpa corporis explicabo nostrum corrupti nam illum.
                            </p>
                          </div>
                          <div class="tab-pane fade" id="navs-top-selesai" role="tabpanel">
                            <p>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                              Blanditiis impedit ea eum porro aliquam itaque autem quas iste, <br>
                              animi accusamus ad numquam atque culpa corporis explicabo nostrum corrupti nam illum.
                              <br>
                              Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                              cupcake gummi bears cake chocolate.
                              <br>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                              Blanditiis impedit ea eum porro aliquam itaque autem quas iste, <br>
                              animi accusamus ad numquam atque culpa corporis explicabo nostrum corrupti nam illum.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Tabs -->
                  <!-- //Content -->
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php foreach ($pesanan_masuk as $key => $value) { ?>
              <!-- Modal Bukti Bayar -->
              <div class="modal fade" id="cek<?php echo $value->id_transaksi ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel1"><?php echo $value->no_order ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card mb-3">
                        <div class="card-body">
                          <table class="table">
                            <tr>
                              <th>Nama</th>
                              <th>:</th>
                              <th><?php echo $value->atas_nama ?></th>
                            </tr>
                            <tr>
                              <th>Bank</th>
                              <th>:</th>
                              <th><?php echo $value->nama_bank ?></th>
                            </tr>
                            <tr>
                              <th>No. Rek</th>
                              <th>:</th>
                              <th><?php echo $value->no_rek ?></th>
                            </tr>
                            <tr>
                              <th>Total Bayar</th>
                              <th>:</th>
                              <th><?php echo number_format($value->total_bayar, 0) ?></th>
                            </tr>
                          </table>
                        </div>
                        <img class="card-img-bottom" src="<?php echo base_url('assets/bukti_bayar/' . $value->bukti_bayar); ?>" alt="Card image cap" />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Modal Bukti Bayar -->
            <?php } ?>