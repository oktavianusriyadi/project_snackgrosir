<div class="container-fluid">
  <div class="mt-3">
    <a href="<?php echo base_url('Beranda'); ?>" class="btn btn-outline-primary fw-bold text-decoration-none">
      Kembali
    </a>
  </div>
  <!-- Detail -->
  <section class="px-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" src="<?php echo base_url('assets/imgcover/' . $detail->gambar) ?>" alt="..." /></div>
        <div class="col-md-8">
          <h1 class="display-5 fw-bolder"><?php echo $detail->nama_produk ?></h1>
          <h6 class="text-black">Kategori : <?php echo $detail->kategori ?></h6>
          <div class="dharga fs-5 mb-5">
            <span>Rp <?php echo number_format($detail->harga, 0) ?></span>
          </div>
          <p class="deskP lead"><?php echo $detail->deskripsi ?></p>
          <div class="d-flex">
            <?php
            echo form_open('Belanja/add');
            echo form_hidden('id', $detail->id_produk);
            echo form_hidden('price', $detail->harga);
            echo form_hidden('name', $detail->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>
            <div class="row">
              <div class="col-md-5 col-8">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-info btnplusmin" data-type="minus" data-field="qty">
                      <span class='bx bx-minus'></span>
                    </button>
                  </span>
                  <input type="text" name="qty" class="form-control qty text-center" value="1" min="1" max="100">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-info btnplusmin" data-type="plus" data-field="qty">
                      <span class="bx bx-plus"></span>
                    </button>
                  </span>
                </div>
              </div>
              <div class="col-md-7 col-4">
                <button type="submit" class="btn btnCart btn-outline-info swalDefaultSuccess">
                  <i class="fa-solid fa-cart-plus"></i>
                </button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Detail -->
</div>

<!-- PlusMinusJS -->
<script src="<?php echo base_url('assets/js/plusmin.js') ?>"></script>
<!-- EnsPlusMinusJS -->