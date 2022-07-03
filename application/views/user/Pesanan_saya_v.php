<div class="container-fluid mt-4">
  <div class="container-fluid">
    <div class="card">
      <h5 class="card-header bg-secondary text-white">Pesanan Saya</h5>
      <div class="card-body">
        <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
        ?>
        <!-- Tabs -->
        <div class="row">
          <div class="col-sm-12">
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
                    <?php foreach ($belum_bayar as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>
                          <b class="text-uppercase">
                            <?php echo $value->expedisi ?>
                          </b>
                          (<?php echo $value->paket ?>) <br>
                          <b>
                            Rp <?php echo number_format($value->ongkir, 0) ?>
                          </b>
                        </td>
                        <td>
                          <b>
                            Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                            <?php if ($value->status_bayar == 1) { ?>
                              <span class="badge bg-warning text-uppercase">Menunggu Konfirmasi</span>
                            <?php } ?>
                          </b>
                        </td>
                        <td>
                          <?php if ($value->status_bayar == 0) { ?>
                            <a href="<?php echo base_url('Pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-danger">Bayar</a>
                          <?php } else { ?>
                            <span class="badge bg-info text-uppercase">Sudah Bayar</span>
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
      </div>
    </div>
  </div>
</div>