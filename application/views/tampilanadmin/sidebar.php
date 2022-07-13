<?php
$this->user_login->proteksi_hal();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Snack Grosir</title>

  <meta name="description" content="" />

  <!-- Icon Untuk Tab Browser -->

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <!-- Fontawesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- // -->

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?php echo base_url('assets/vendor/js/helpers.js') ?>"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?php echo base_url('assets/js/config.js') ?>"></script>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <!-- // -->
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?php echo base_url('admin/Admin') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder text-black ms-2">Snack Grosir</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/Admin') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bxs-dashboard'></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Pelanggan -->
          <!-- <li class="menu-item">
            <a href="<?php echo base_url('admin/Admin/pelanggan') ?>" class="menu-link">
              <i class='menu-icon tf-icons bx bxs-user'></i>
              <div>Data Pelanggan</div>
            </a>
          </li> -->

          <!-- Kategori -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/Kategori') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bxs-category'></i>
              <div>Kategori Produk</div>
            </a>
          </li>

          <!-- Pesanan -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/Pesanan') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bx-package'></i>
              <div data-i18n="Form Elements">Data Pesanan</div>
            </a>
          </li>

          <!-- Produk -->
          <li class="menu-item">
            <a href="<?php echo base_url('Produk') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-package"></i>
              <div>Data Produk</div>
            </a>
          </li>

          <!-- User -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/User') ?>" class="menu-link">
              <i class='menu-icon tf-icons bx bxs-user'></i>
              <div>Data User</div>
            </a>
          </li>

          <!-- Laporan -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/Laporan') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bxs-report'></i>
              <div data-i18n="Form Elements">Laporan</div>
            </a>
          </li>

          <!-- Setting -->
          <li class="menu-item">
            <a href="<?php echo base_url('admin/Admin/setting') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bxs-cog'></i>
              <div data-i18n="Form Elements">Setting</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->