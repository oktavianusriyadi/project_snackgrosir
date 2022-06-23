<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      &copy; <script>
        document.write(new Date().getFullYear())
      </script>
      <a class="nama" href="#" style="text-decoration: none;">Snack Grosir Pontianak</a>
    </div>
    <div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Up Button -->
<a id="button"></a>
<style>
  #button {
    text-decoration: none;
    display: inline-block;
    background-color: #FF9800;
    width: 45px;
    height: 45px;
    text-align: center;
    border-radius: 4px;
    position: fixed;
    bottom: 10px;
    right: 30px;
    transition: background-color .3s,
      opacity .5s, visibility .5s;
    opacity: 0;
    visibility: hidden;
    z-index: 1000;
  }

  #button::after {
    content: "\f077";
    font-family: FontAwesome;
    font-weight: normal;
    font-style: normal;
    font-size: 2em;
    line-height: 50px;
    color: #fff;
  }

  #button:hover {
    cursor: pointer;
    background-color: #333;
  }

  #button:active {
    background-color: #555;
  }

  #button.show {
    opacity: 1;
    visibility: visible;
  }
</style>

<script>
  var btn = $('#button');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '300');
  });
</script>
<!-- //Up Button -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

<script src="<?php echo base_url('assets/vendor/js/menu.js') ?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?php echo base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

<!-- Main JS -->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

<!-- Page JS -->
<script src="<?php echo base_url('assets/js/dashboards-analytics.js') ?>"></script>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<!-- // -->

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500.0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000)
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>