<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <!-- Invoice  -->
        <div class="row">
          <div class="col-md-12">
            <div class="callout callout-info">
              <h4><i class="fas fa-file-invoice"></i> Snack Grosir Pontianak</h4>
            </div>
          </div>
          <div class="invoice p-3 mb-3">
            <div class="row">
              <div class="col-12">
                <h4 class="text-black">
                  Laporan Penjualan Tahunan
                  <small class="float-end">Tahun : <?php echo $tahun ?></small>
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nomor Order</th>
                      <th>Tanggal</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach ($laporan as $key => $value) {
                      $total = $total + $value->grand_total;
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>Rp <?php echo number_format($value->grand_total, 0) ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="row mt-3 float-end">
                  <div class="col-md-12">
                    <table class="table">
                      <tr>
                        <td><b>Total</b></td>
                        <td><b>:</b></td>
                        <td><b>Rp <?php echo number_format($total, 0); ?></b></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row no-print mt-3 float-start">
              <div class="col-md-12">
                <button class="btn btn-success" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
          <!-- End Invoice -->
        </div>
      </div>
    </div>