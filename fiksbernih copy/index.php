<!DOCTYPE html>
    <html lang="en">
        <head>
                                    <!-- form login -->
            <title>Login Form</title>
            <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="container" id="container">
                <div class="form-container register-container"> 

                <!--  -->
                <form action="signup.php" method="POST">
                    <h1>Register Hire</h1>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <input type="hidden" name="action" value="add_account">
                    <button type="submit">Register</button>
                </form>
                
                </div>

                <div class="form-container login-container">
                    <form  method="post" action="login.php"> 
                    <h1>Login Hire</h1>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <div class="content">
                            <div class="pass-link">
                                <a href="#e">Forgot password</a>
                            </div>
                        </div>
                        <button type="submit">Login</button>
                    </form>
                </div>

                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1 class="title">Hello <br> friends</h1>
                            <p>Udah punya akun? Login sini, tapi jangan lupa cek stok asli dulu biar nggak zonk pas input!</p>
                            <button class="ghost" id="login">Login
                                <i class="lni lni-arrow-right login"></i>
                            </button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1 class="title">Start your <br> journey now</h1>
                            <p>Karyawan baru? <br> Ayo regster sekarang, biar hidup kamu makin rame sama laporan dan absen!</p>
                            <button class="ghost" id="register">Register
                                <i class="lni lni-arrow-left register"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="script.js"></script>
        </body>
    </html>