<!-- Up Button -->
<a id="button"></a>
<script src="<?php echo base_url('assets/js/upbutton.js') ?>"></script>

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
    <a class="btn wa btn-secondary btn-floating m-2" href="https://wa.me/6285252394439" role="button"><i class="fa-brands fa-whatsapp"></i></a>

    <!--Instagram-->
    <a class="btn ig btn-secondary btn-floating m-2" href="https://www.instagram.com/snackgrosirpontianak/" role="button"><i class="fa-brands fa-instagram"></i></a>
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

<!-- Notifikasi Keranjang -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url('assets/js/notifcart.js') ?>"></script>
<!-- End Notifikasi Keranjang -->

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500.0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000)
</script>


<!--CSS-->
<!--EndCSS-->