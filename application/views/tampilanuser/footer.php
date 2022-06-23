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
    bottom: 30px;
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

<footer class="footer text-center text-muted shadow-lg bg-body rounded-top">
  <div class="container border-bottom p-3">
    <section>
      <div class="row text-center justify-content-center">
        <div class="col-md-2 col-4">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#" style="text-decoration: none; color: black;">About Us</a>
          </h6>
        </div>
        <div class="col-md-2 col-4">
          <h6 class="text-uppercase font-weight-bold">
            <a href="<?php echo base_url('snack') ?>" style="text-decoration: none; color: black;">Products</a>
          </h6>
        </div>
        <div class="col-md-2 col-4">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#" style="text-decoration: none; color: black;">Contact</a>
          </h6>
        </div>
      </div>
    </section>
  </div>

  <section class="alamat text-center">
    <h2>Snack Grosir Pontianak</h2>
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
    <a class="nama" href="#" style="text-decoration: none;">Snack Grosir Pontianak</a>
  </div>
  <!--EndCopyright-->
</footer>

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

<!--CSS-->
<style>
  .footer {
    margin-top: 5rem;
  }

  .alamat {
    font-weight: 500;
    text-align: justify;
    color: black;
  }

  .nama {
    color: black;
    font-weight: bold;
  }

  .copy {
    font-family: 'Times New Roman';
    color: black;
    font-weight: bold;
  }
</style>
<!--EndCSS-->