<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="container-fluid">
        <div class="card">
          <h5 class="card-header bg-secondary text-white">Upload Bukti Pembayaran</h5>
          <div class="card-body">
            <?php echo form_open_multipart('Pesanan_saya/bayar/' . $bayar->id_transaksi);
            ?>
            <div class="mb-3">
              <label>Atas Nama</label>
              <input name="atas_nama" class="form-control" placeholder="Atas Nama" required />
            </div>
            <div class="mb-3">
              <label>Nama Bank</label>
              <input name="nama_bank" class="form-control" placeholder="Nama Bank" required />
            </div>
            <div class="mb-3">
              <label>No.Rekening Anda</label>
              <input name="no_rek" class="form-control" placeholder="No. Rekening" required />
            </div>
            <div class="mb-3">
              <label>Bukti Bayar</label>
              <input type="file" name="bukti_bayar" class="form-control" required>
            </div>
            <div class="float-end m-1">
              <a href="<?php echo base_url('Pesanan_saya'); ?>" class="btn btn-danger">Back</a>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="container-fluid">
        <div class="card">
          <h5 class="card-header bg-secondary text-white">No. Rekening Toko</h5>
          <div class="card-body">
            <p class="fw-bold">Total Pembayaran Anda :</p>
            <h1><b>Rp <?php echo number_format($bayar->total_bayar, 0) ?>.-</b></h1>
            <div class="dropdown-divider"></div>
            <table class="table">
              <tr>
                <th>Nama</th>
                <th>Bank</th>
                <th>No. Rekening</th>
              </tr>
              <?php foreach ($rekening as $key => $value) { ?>
                <tr>
                  <td><?php echo $value->atas_nama ?></td>
                  <td><?php echo $value->nama_bank ?></td>
                  <td><?php echo $value->no_rek ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>