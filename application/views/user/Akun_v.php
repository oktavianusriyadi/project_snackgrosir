<div class="container-fluid mt-4">
  <div class="container-fluid">
    <!-- Account -->
    <div class="card">
      <h5 class="card-header"> <i class="bx bxs-user"></i> Akun Saya</h5>
      <div class="card-body">
        <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-dark alert-dismissible mt-4" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
        echo form_open('Belanja/checkout'); ?>
        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>Nama Lengkap</strong></label>
            <input name="nama_penerima" class="form-control" required>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>No. Telepon</strong></label>
            <input name="no_tlp_penerima" class="form-control" required>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>Alamat</strong></label>
            <textarea name="alamat" class="form-control" rows="1" placeholder="Alamat" required></textarea>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>Kode POS</strong></label>
            <input name="kode_pos" class="form-control" placeholder="Kode Pos" required>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>Provinsi</strong></label>
            <select name="provinsi" class="form-select"></select>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"><strong>Kota/Kabupaten</strong></label>
            <select name="kota" class="form-select"></select>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
          <button type="reset" class="btn btn-outline-secondary">Batal</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <!-- /Account -->
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
  });
</script>