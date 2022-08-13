<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0 fw-bold">Check Out</h5>
          <small class="text-muted float-end">Tanggal : <?php echo date('d - m - Y') ?></small>
        </div>
        <div class="card-body">
          <section class="mb-3">
            <div class="container px-4">
              <div class="row align-items-center">
                <?php
                $i = 1;
                $tot_berat = 0;
                foreach ($this->cart->contents() as $items) {
                  $produk = $this->Beranda_m->detail_produk($items['id']);
                  $berat = $items['qty'] * $produk->berat;
                  $tot_berat = $tot_berat + $berat;
                ?>
                  <div class="col-md-2 mb-3"><img class="card-img-top mb-md-0" src="<?php echo base_url('assets/imgcover/' . $produk->gambar); ?>" alt="..." /></div>
                  <div class="col-md-10">
                    <h4 class="fw-bolder"><?php echo $items['name']; ?></h4>
                    <h6 class="text-black"><?php echo $berat ?> Gram</h6>
                    <section class="mb-3">
                      <div class=" row fw-bold">
                        <div class="col-md-5 col-7">
                          <?php echo $items['qty']; ?> x Rp <?php echo number_format($items['price'], 0); ?>
                        </div>
                        <div class="col-md-5 col-5 text-lg-end">
                          Rp <?php echo number_format($items['subtotal'], 0); ?>
                        </div>
                      </div>
                    </section>
                  </div>
                  <hr>
                <?php } ?>
              </div>
            </div>
          </section>
          <?php
          //Notifikasi Form Kosong
          echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
          echo form_open('Belanja/checkout');
          $no_order = date('dmy') . strtoupper(random_string('alnum', 8));
          ?>
          <div class="row">
            <div class="col-md-8">
              <p><strong>Tujuan Pengiriman : </strong></p>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Nama Penerima</strong></label>
                    <input name="nama_penerima" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>No. Telepon</strong></label>
                    <input name="no_tlp_penerima" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label"><strong>Alamat</strong></label>
                    <textarea name="alamat" class="form-control" rows="1" placeholder="Alamat" required></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label"><strong>Kode POS</strong></label>
                    <input name="kode_pos" class="form-control" placeholder="Kode Pos" required>
                  </div>
                </div>
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
            <div class="col-md-4">
              <p><strong>Total :</strong></p>
              <hr>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Grand Total</th>
                    <th>Rp <?php echo number_format($this->cart->total(), 0); ?></th>
                  </tr>
                  <tr>
                    <th>Berat</th>
                    <th><?php echo $tot_berat ?> Gram</th>
                  </tr>
                  <tr>
                    <th>Ongkir</th>
                    <th>Rp <label id="ongkir"></label></th>
                  </tr>
                  <tr>
                    <th>Total Bayar</th>
                    <th>Rp <label id="total_bayar"></label></th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- Simpan Transaksi -->
          <input name="no_order" value="<?php echo $no_order; ?>" hidden>
          <input name="estimasi" hidden>
          <input name="ongkir" hidden> <br>
          <input name="berat" value="<?php echo $tot_berat; ?>" hidden>
          <input name="grand_total" value="<?php echo $this->cart->total() ?>" hidden>
          <input name="total_bayar" hidden>
          <!-- //Simpan Transaksi -->

          <!-- Rinci Transaksi -->
          <?php
          $i = 1;
          foreach ($this->cart->contents() as $items) {
            echo
            form_hidden('qty' . $i++, $items['qty']);
          }
          ?>

          <!-- //Rinci Transaksi -->
          <div class="row float-end">
            <div class="col-md-12">
              <a href="<?php echo base_url('Belanja') ?>" class="btn btn-info">
                <strong>Keranjang</strong>
              </a>
              <button type="submit" class="btn btn-secondary">Check Out</button>
            </div>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      //Menampilkan Data Provinsi
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
          //console.log(hasil_provinsi);
          $("select[name=provinsi]").html(hasil_provinsi);
        }
      });

      //Menampilkan Data Kota
      $("select[name=provinsi]").on("change", function() {
        //Ambil data provinsi terpilih
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Rajaongkir/kota') ?>",
          data: 'id_provinsi=' + id_provinsi_terpilih,
          success: function(hasil_kota) {
            // console.log(hasil_kota);
            $("select[name=kota]").html(hasil_kota);
          }
        });
      });

      //Menampilkan Data Expedisi
      $("select[name=kota]").on("change", function() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Rajaongkir/expedisi') ?>",
          success: function(hasil_expedisi) {
            $("select[name=expedisi]").html(hasil_expedisi);
          }
        });
      });

      //Menampilkan Data Paket
      $("select[name=expedisi]").on("change", function() {
        //Ambil data expedisi terpilih
        var expedisi_terpilih = $("select[name=expedisi]").val()
        //Ambil data Kota terpilih
        var id_kota_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
        //Ambil data berat
        var total_berat = <?php echo $tot_berat ?>;
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Rajaongkir/paket') ?>",
          data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_terpilih + '&berat=' + total_berat,
          success: function(hasil_paket) {
            $("select[name=paket]").html(hasil_paket);
          }
        });
      });

      $("select[name=paket]").on("change", function() {
        //Menampilkan Ongkir
        var data_ongkir = $("option:selected", this).attr('ongkir');
        var reverse = data_ongkir.toString().split('').reverse().join(''),
          ribuan_ongkir = reverse.match(/\d{1,3}/g);
        ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
        $("#ongkir").html(ribuan_ongkir);
        //Hitung total bayar
        var total_bayar = parseInt(data_ongkir) + parseInt(<?php echo $this->cart->total() ?>);
        var reverse = total_bayar.toString().split('').reverse().join(''),
          ribuan_bayar = reverse.match(/\d{1,3}/g);
        ribuan_bayar = ribuan_bayar.join(',').split('').reverse().join('');
        $("#total_bayar").html(ribuan_bayar);

        //estimasi dan ongkir
        var estimasi = $("option:selected", this).attr('estimasi');
        $("input[name = estimasi]").val(estimasi);
        $("input[name = ongkir]").val(data_ongkir);
        $("input[name = total_bayar]").val(total_bayar);
      });


    });
  </script>