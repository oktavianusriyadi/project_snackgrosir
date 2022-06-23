<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="style/css/bootstrap.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script src="style/js/bootstrap.js"></script>
</head>

<body>
  <div class="mask d-flex align-items-center h-100 gradient-custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6 col-xl-5">
          <div class="card-body card-user text-center">
            <div class="card my-4" style="border-radius: 1rem;">
              <i class="fas fa-user-circle fa-4x my-5"></i>
              <h3 class="fw-bold mb-5">Helo, Selamat Datang</h3>
              <form class="formuser mx-5" action="">
                <div class="input-group mb-4">
                  <input type="text" class="form-control" id="username" placeholder="No. Handphone/Username/Email">
                </div>
                <div class="input-group mb-5">
                  <input type="password" class="form-control" id="password" placeholder="Password">
                  <span class="input-group-text" style="background-color: transparent;"><i class="fas fa-eye-slash" id="togglePassword"></i></span>
                </div>
              </form>
              <div>
                <button type="submit" class="btn btnlog btn-success mb-3" style="width: 321px;">Log In</button>
              </div>
              <div class="mb-5">
                <h6>Belum Memiliki Akun? <a href="<?php echo base_url('regis') ?>" class="text-regis text-decoration-none">Daftar</a></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<!-- Show Hide Password -->
<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function() {

    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the eye icon
    this.classList.toggle('fa-eye');
  });
</script>
<!-- End Show Hide Password -->