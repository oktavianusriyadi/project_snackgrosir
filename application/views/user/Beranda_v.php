<div class="container-fluid">
  <!--Banner-->
  <div id="carouselExampleDark" class="banner carousel carousel-dark slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="<?php echo base_url() ?>assets/banner/banner1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="<?php echo base_url() ?>assets/banner/banner2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url() ?>assets/banner/banner1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--EndBanner-->

  <!-- Navbar Kategori -->
  <nav class="navbar navbar-expand-lg shadow rounded navbar-light mb-3">
    <div class="container-fluid">
      <div class="navbar-brand text-black text-uppercase">Kategori</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#kategori" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="kategori">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link navproduk" aria-current="page" href="<?php echo base_url('Beranda/Allproduk/') ?>">All Product</a>
          </li>
          <?php $kategori = $this->Beranda_m->tampil_data_kategori(); ?>
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
            <div class="col-lg-2 col-md-3 col-6 mb-3">
              <?php
              echo form_open('Belanja/add');
              echo form_hidden('id', $value->id_produk);
              echo form_hidden('qty', 1);
              echo form_hidden('price', $value->harga);
              echo form_hidden('name', $value->nama_produk);
              echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
              ?>
              <a href="<?php echo base_url('Beranda/detail_produk/' . $value->id_produk); ?>" class="detail">
                <div class="card produk shadow bg-body rounded" style="max-height: 550px; text-decoration: none;">
                  <img src="<?php echo base_url('assets/imgcover/' . $value->gambar) ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 class="card-title nampro mb-1 text-center"><?php echo $value->nama_produk ?></h6>
                    <p></p>
                    <section class="text-center">
                      <h5 class="harga">Rp <?php echo number_format($value->harga, 0) ?></h5>
                    </section>
                  </div>
                  <div class="card-body text-center">
                    <button type="submit" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-shopping-cart"></i></button>
                    <button class="btn btn-primary btn-sm">Beli</button>
                  </div>
                </div>
              </a>
              <?php echo form_close(); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--EndKonten-->