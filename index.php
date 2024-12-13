<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form
              action="login.php"
              autocomplete="off"
              class="sign-in-form"
              method="POST"
            >
              <div class="logo">
                <img src="./img/logo.png" alt="Deus Apparel" />
                <h4>Deus Apparel</h4>
              </div>

              <div class="heading">
                <h2>Selamat Datang</h2>
                <h6>Belum punya akun?</h6>
                <a href="#" class="toggle">daftar</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="username"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Nama</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <!-- <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p> -->
              </div>
            </form>

            <form
              action="register.php"
              autocomplete="off"
              class="sign-up-form"
              method="POST"
            >
              <div class="logo">
                <img src="./img/logo.png" alt="Deus Apparel" />
                <h4>Deus Apparel</h4>
              </div>

              <div class="heading">
                <h2>Mulai Buat Akun</h2>
                <h6>Sudah punya akun?</h6>
                <a href="#" class="toggle">Login</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="username"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Nama</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="confirm-password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Confirm Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <!-- <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p> -->
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
              <img src="./img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Akurasi Penargetan Barang</h2>
                  <h2>Hindari Kesalahan Pendataan</h2>
                  <h2>Buat Semua Terintegrasi</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-v alue="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
