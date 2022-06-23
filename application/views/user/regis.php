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
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card-body card-user text-center">
            <div class="card my-1" style="border-radius: 1rem;">
              <h3 class="fw-bold m-4">Daftar Sekarang</h3>
              <form class="regisuser mx-5" action="">
                <div class="form-outline mb-4">
                  <input type="email" class="form-control" id="emailAddress" placeholder="Nama Lengkap">
                </div>
                <div class="form-outline mb-4">
                  <input type="email" class="form-control" id="emailAddress" placeholder="Email">
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="tel" class="form-control" id="phonenumber" placeholder="No. Handphone">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 my-2">
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="inlineRadioOptions" id="pria" value="option1">
                      <label for="pria" class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="inlineRadioOptions" id="wanita" value="option2">
                      <label for="wanita" class="form-check-label">Wanita</label>
                    </div>
                  </div>
                </div>
                <!-- Password -->
                <div class="input-group mb-4">
                  <input type="password" id="password" class="form-control" placeholder="Password">
                  <span class="input-group-text" style="background-color: transparent;"><i class="fas fa-eye-slash" id="togglePassword"></i></span>
                </div>
                <div class="input-group mb-4">
                  <input type="password" id="password" class="form-control" placeholder="Ulangi Password">
                  <span class="input-group-text" style="background-color: transparent;"><i class="fas fa-eye-slash" id="togglePassword"></i></span>
                </div>
                <!-- EndPassword -->
                <div class="birthday datepicker mb-4">
                  <input type="" id="birthdayDate" class="form-control" placeholder="Tanggal Lahir">
                </div>
                <div class="form-outline mb-4">
                  <textarea name="" id="alamat" class="form-control" cols="10" rows="4" placeholder="Alamat Anda"></textarea>
                </div>
              </form>
              <div>
                <button type="submit" class="btn btndaf btn-success mb-5" style="width: 85%;">Daftar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<!--Show Hide Password-->
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
<!-- Show Hide Password -->