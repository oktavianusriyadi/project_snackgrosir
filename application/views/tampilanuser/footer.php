<!-- Up Button -->
<a id="button"></a>

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

<footer class="footer text-center text-muted shadow-lg bg-body rounded-top">
  <div class="container border-bottom p-4">
    <section>
      <div class="row text-center justify-content-center">
        <h2>Snack Grosir Pontianak</h2>
      </div>
    </section>
  </div>


  <section class="alamat text-center">
    <p><i class="fas fa-store"></i> Jl. Camar No. 85A, Mariana, Kec. Pontianak Kota, Kota Pontianak, Kalimantan Barat 78112 </p>
    <p><i class="fas fa-store"></i> Gg. Kakak Tua No. 1, Mariana, Kec. Pontianak Kota, Kota Pontianak, Kalimantan Barat 78244 </p>
  </section>

  <!--SocialMedia -->
  <section class="sosial">
    <!--Whatsapp-->
    <a class="btn wa btn-secondary btn-floating m-2" href="#!" role="button"><i class="fa-brands fa-whatsapp"></i></a>

    <!--Instagram-->
    <a class="btn ig btn-secondary btn-floating m-2" href="#!" role="button"><i class="fa-brands fa-instagram"></i></a>
  </section>
  <!--EndSocialMedia -->

  <!--Copyright-->
  <div class="copy p-3" style="background-color: rgb(230, 230, 230);">
    &copy; <script>
      document.write(new Date().getFullYear())
    </script>
    <a class="nama" href="<?php echo base_url('Beranda') ?>" style="text-decoration: none;">Snack Grosir Pontianak</a>
  </div>
  <!--EndCopyright-->
</footer>

</body>

</html>

<!--FontAwesome-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!--EndFontAwesome-->

<!-- Notifications Cart -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Produk Ditambahkan Dalam Keranjang'
      })
    });
  });
</script>
<!-- End Notifications Cart -->
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500.0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000)
</script>

<!-- Main JS -->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<!--CSS-->
<!--EndCSS-->