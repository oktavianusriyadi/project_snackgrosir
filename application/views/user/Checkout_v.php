<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0 fw-bold">Check Out</h5>
          <small class="text-muted float-end">Tanggal</small>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              From :
            </div>
            <div class="col-md-6">
              <div class="float-end">
                Invoice
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>QTY</th>
                    <th>Produk</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $tot_berat = 0;
                  foreach ($this->cart->contents() as $items) {
                    $produk = $this->Beranda_m->detail_produk($items['id']);
                    $berat = $items['qty'] * $produk->berat;
                    $tot_berat = $tot_berat + $berat;
                  ?>
                    <tr>
                      <td style="text-align: left;"><?php echo $items['qty']; ?></td>
                      <td style="text-align: left;"><?php echo $items['name']; ?></td>
                      <td style="text-align: left;"><?php echo $berat ?> Gram</td>
                      <td style="text-align: left;">Rp <?php echo number_format($items['price'], 0); ?></td>
                      <td style="text-align: left;">Rp <?php echo number_format($items['subtotal'], 0); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              Tujuan Pengiriman :
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Provinsi</strong></label>
                    <select name="provinsi" class="form-select"></select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Kota/Kabupaten</strong></label>
                    <select name="kota" class="form-select"></select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Expedisi</strong></label>
                    <select name="expedisi" class="form-select"></select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Paket</strong></label>
                    <select name="paket" class="form-select"></select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Subtotal</th>
                    <td>Rp <?php echo number_format($this->cart->total(), 0); ?></td>
                  </tr>
                  <tr>
                    <th>Berat</th>
                    <td><?php echo $tot_berat ?> Gram</td>
                  </tr>
                  <tr>
                    <th>Ongkir</th>
                    <td><label>0</label></td>
                  </tr>
                  <tr>
                    <th>Total Bayar</th>
                    <td><label>0</label></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="#" class="btn btn-outline-dark">
                <i class="fas fa-print"></i>
              </a>
              <button class="btn btn-info float-end">
                Check Out
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      //Menampilkan Data Provinsi
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
          //console.log(hasil_provinsi);
          $("select[name=provinsi]").html(hasil_provinsi);
        }
      });

      //Menampilkan Data Kota
      $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('rajaongkir/kota') ?>",
          data: 'id_provinsi=' + id_provinsi_terpilih,
          success: function(hasil_kota) {
            // console.log(hasil_kota);
            $("select[name=kota]").html(hasil_kota);
          }
        });
      });

      //Menampilkan Data Expedisi
      ("select[name=kota]").on("change", function() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('rajaongkir/expedisi') ?>",
          success: function(hasil_expedisi) {
            $("select[name=expedisi]").html(hasil_expedisi);
          }
        });
      });
    });
  </script>