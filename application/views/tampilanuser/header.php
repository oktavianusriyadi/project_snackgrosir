<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fontawesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <!-- End Fontawesome -->

  <!-- BoxIcons -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- End BoxIcons -->

  <!-- Bootstrap CSS -->
  <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- End Bootstrap CSS -->

  <!-- Style.css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/pages/page-auth.css') ?>" />
  <!-- End Style.css -->

  <!-- Helpers -->
  <script src="<?php echo base_url('assets/vendor/js/helpers.js') ?>"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- End Bootstrap JS -->

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- End JQuery -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

  <title>Snack Grosir</title>
</head>

<body>
  <!--Nav-->
  <nav class=" navbar sticky-top navbar-expand-lg d-lg-block navbar-light bg-light shadow">
    <div class="container-fluid">
      <a class="navbar-brand text-black-50 text-uppercase" href="<?php echo base_url('Beranda') ?>">Snack Grosir</a>
      <div class="order-lg-2 nav-btns">
        <!-- Cart -->
        <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
          $jml_item = $jml_item + $value['qty'];
        }
        ?>
        <a class="btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <i class="bx bxs-cart-alt bx-sm"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"><?php echo $jml_item ?></span>
        </a>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"><i class="fas fa-shopping-cart"></i> Keranjang</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <?php if (empty($keranjang)) { ?>
              <section class="text-center">
                <h4>Keranjang Anda Kosong!</h4>
                <hr>
              </section>
            <?php } else { ?>
              <section>
                <h5>
                  <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total : </strong></td>
                    <td class="right">Rp <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                  </tr>
                </h5>
              </section>
              <hr>
              <div class="row text-center">
                <div class="col-md-6">
                  <h6>
                    <a class="btn btn-outline-info text-decoration-none" style="color: black;" href="<?php echo base_url('Belanja'); ?>">
                      View Cart
                    </a>
                  </h6>
                </div>
                <div class="col-md-6">
                  <h6>
                    <a class="btn btn-outline-info text-decoration-none" style="color: black;" href="<?php echo base_url('Belanja/checkout') ?>">
                      Check Out
                    </a>
                  </h6>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <?php foreach ($keranjang as $key => $value) {
                $produk = $this->Beranda_m->detail_produk($value['id']);
              ?>
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="<?php echo base_url('assets/imgcover/' . $produk->gambar); ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $value['name'] ?></h5>
                        <table class="table">
                          <tr>
                            <td>Jumlah</td>
                            <td>
                              <p class="card-text"><?php echo $value['qty'] ?> x Rp <?php echo number_format($value['price'], 0) ?></p>
                            </td>
                          </tr>
                          <tr>
                            <td>Subtotal</td>
                            <td>
                              <p class="card-text">Rp <?php echo $this->cart->format_number($value['subtotal']); ?></p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <!-- End of Cart -->
        <!-- User -->
        <?php if ($this->session->userdata('email') == "") { ?>
          <a class="btn" style="margin-left: 5px;" href="<?php echo base_url('Pelanggan/login') ?>">
            Login
          </a>
        <?php } else { ?>
          <a class="btn" style="margin-left: 5px;" href="javascript:void(0);" data-bs-toggle="dropdown">
            <!-- <h6>Hi, <?php echo $this->session->userdata('nama_pelanggan') ?></h6> -->
            <i class="bx bxs-user-circle bx-sm"></i>
            <!-- <img class="rounded-circle" src="<?php echo base_url('assets/foto/' . $this->session->userdata('foto')) ?>"> -->
            <span class="avatar-status bg-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end shadow" style="margin-right: 50px;">
            <a class="dropdown-item" href="#">
              <?php echo $this->session->userdata('nama_pelanggan') ?>
            </a>
            <a class="dropdown-item" href="<?php echo base_url('Pelanggan/akun') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Akun Saya
            </a>
            <a class="dropdown-item" href="<?php echo base_url('Pesanan_saya') ?>">
              <i class="fas fa-shopping-bag fa-sm fa-fw mr-2 text-gray-400"></i>
              Pesanan Saya
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('Pelanggan/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        <?php  } ?>
        <!-- End Of User -->
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex flex-fill mt-3 mb-3">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul> -->
      </div>
    </div>
  </nav>
  <!--End Nav-->