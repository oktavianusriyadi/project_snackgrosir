<div class="container-fluid">
  <!--Banner-->
  <img src="<?php echo base_url() ?>assets/banner/banner1.jpg" class="banner img-fluid mt-4 shadow" alt="...">
  <!--EndBanner-->

  <!-- Navbar Kategori -->
  <nav class="navbar navbar-expand-lg shadow rounded navbar-light mb-3">
    <div class="container-fluid">
      <div class="navbar-brand text-black text-uppercase">Kategori</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#kategori" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="kategori">
        <ul class="navbar-nav mb-lg-0">
          <?php $kategori = $this->Beranda_m->tampil_data_kategori(); ?>
          <li class="nav-item">
            <a class="nav-link navproduk" href="<?php echo base_url('Beranda') ?>">All Produk</a>
          </li>
          <?php foreach ($kategori as $key => $value) { ?>
            <li class="nav-item">
              <a class="nav-link navproduk" href="<?php echo base_url('Beranda/kategori/' . $value->id_kategori) ?>"><?php echo $value->kategori ?></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar Kategori -->

  <!--Konten-->
  <div class="container-fluid">
    <div class="row">
      <div class="my-1">
        <div class="row justify-content-center justify-content-md-start">
          <?php foreach ($produk as $key => $value) { ?>
            <div class="col-lg-3 col-md-3 col-6 mb-3">
              <?php
              echo form_open('Belanja/add');
              echo form_hidden('id', $value->id_produk);
              echo form_hidden('qty', 1);
              echo form_hidden('price', $value->harga);
              echo form_hidden('name', $value->nama_produk);
              echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
              ?>
              <div class="card produk shadow bg-body rounded" style="max-height: 550px; text-decoration: none;">
                <img src="<?php echo base_url('assets/imgcover/' . $value->gambar) ?>" class="card-img-top" style="max-height: 250px;" alt="...">
                <div class="card-body">
                  <h6 class="card-title nampro mb-1 text-center"><?php echo $value->nama_produk ?></h6>
                  <p></p>
                  <section class="text-center">
                    <h5 class="harga">Rp <?php echo number_format($value->harga, 0) ?></h5>
                  </section>
                </div>
                <div class="card-body text-center">
                  <a href="<?php echo base_url('Beranda/detail_produk/' . $value->id_produk); ?>" class="btn btn-sm btn-warning btn-md">Detail</a>
                  <button type="submit" class="btn btn-danger btn-sm swalDefaultSuccess"> + <i class="fas fa-shopping-cart"></i></button>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          <?php } ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
  </div>
</div>
<!--EndKonten-->