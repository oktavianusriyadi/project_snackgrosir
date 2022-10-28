<div class="container-fluid">
  <div class="mt-3">
    <!-- <a href="<?php echo base_url('Beranda'); ?>" class="btn btn-sm btn-outline-primary fw-bold text-decoration-none">
      Kembali
    </a> -->
  </div>
  <!-- Detail -->
  <section class="px-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="card card-image col-md-4"><img class="card-img-top mb-5 mb-md-0" src="<?php echo base_url('assets/imgcover/' . $detail->gambar) ?>" alt="..." /></div>
        <div class="col-md-5">
          <h3 class="fw-bolder mb-3"><?php echo $detail->nama_produk ?></h3>
          <div class="row mb-3">
            <div class="col-md-8">
              <h4><strong id="harga">Rp <?php echo number_format($detail->harga, 0) ?></strong></h4>
            </div>
          </div>
          <div class="d-flex">
            <?php
            echo form_open('Belanja/add');
            echo form_hidden('id', $detail->id_produk);
            echo form_hidden('price', $detail->harga);
            echo form_hidden('price', $detail->hargakg);
            echo form_hidden('price', $detail->hargabal);
            echo form_hidden('name', $detail->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>
            <h6>Pilih Ukuran : <span class="text-black-50" id="ukuran"></span> </h6>
            <div class="row mb-3">
              <div class="col-md-12">
                <button type="button" class="btn btnBerat btn-sm btn-outline-success" onclick="tampilharga('Rp <?php echo number_format($detail->harga, 0) ?>'); tampilukuran('500 Gram')">500 Gram</button>
                <button type="button" class="btn btnBerat btn-sm btn-outline-success" onclick="tampilharga('Rp <?php echo number_format($detail->hargakg, 0)?>'); tampilukuran('1 Kg')">1 Kg</button>
                <button type="button" class="btn btnBerat btn-sm btn-outline-success" onclick="tampilharga('Rp <?php echo number_format($detail->hargabal, 0) ?>'); tampilukuran('Bal/Dus/Kaleng')">Bal/Dus</button>
              </div>
            </div>
            <p class="detailPro">
              <span>Kategori : <?php echo $detail->kategori ?> </span><br>
              <span><?php echo $detail->deskripsi ?></span>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row mb-3">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-outline-warning btnplusmin" data-type="minus" data-field="qty">
                    <span class='bx bx-minus'></span>
                  </button>
                </span>
                <input type="text" name="qty" class="form-control qty text-center" value="1" min="1" max="100">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-outline-warning btnplusmin" data-type="plus" data-field="qty">
                    <span class="bx bx-plus"></span>
                  </button>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-sm btnCart btn-outline-warning swalDefaultSuccess">Tambah
                <i class="fa-solid fa-cart-plus"></i>
              </button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
  <!-- End Detail -->
</div>

<!-- PlusMinusJS -->
<script src="<?php echo base_url('assets/js/plusmin.js') ?>"></script>
<!-- EnsPlusMinusJS -->

<script>
  function tampilharga(name) {
    document.getElementById("harga").innerText = name;
  }

  function tampilukuran(name) {
    document.getElementById("ukuran").innerText = name;
  }
</script>