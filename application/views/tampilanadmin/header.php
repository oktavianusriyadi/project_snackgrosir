<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl sticky-top navbar-detached align-items-center bg-navbar-theme no-print" target="_blank" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- <div class="app-brand-text demo menu-text fw-bolder text-black">Snack Grosir Pontianak</div> -->
      <!-- Search -->
      <!-- <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
          <i class="bx bx-search fs-4 lh-0"></i>
          <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
        </div>
      </div> -->
      <!-- /Search -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="my-3">
              <p class="text-black"><?php echo $this->session->userdata('nama'); ?></p>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block"><?php echo $this->session->userdata('nama'); ?></span>
                    <small class="text-muted"><?php if ($this->session->userdata('level_user') == 1) {
                                                echo 'Admin';
                                              } else {
                                                echo 'User';
                                              } ?></small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="<?php echo base_url('Auth/logout_admin') ?>">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>
  <!-- / Navbar -->