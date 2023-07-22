<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
    exit;
}

include 'koneksi.php';
include 'crud-users.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password='$password'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {

            if ($row["levels"] == "manager") {
                $_SESSION["manager"] = true;
                $_SESSION["login"] = true;

                header("location:dashboard.php");
                exit;
            } else if ($row["levels"] == "staff") {
                $_SESSION["manager"] = false;
                $_SESSION["login"] = true;

                header("location:dashboard-staff.php");
                exit;
            }

        }
    }

    echo "<script>alert('login gagal, username atau password salah')</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Hotel PP</title>
    <link rel="stylesheet" href="assets/style/login-page.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="page-content">
        <div class="d-flex flex-row align-items-center justify-content-center vh-100">
            <div class="form-section col-md-6 col-sm-12 col-12">
                <div class="container w-75">
                    <div class="icon-area d-flex flex-row align-items-center mb-5">
                        <img src="assets/images/hotel-icon.png" class="icon-image" data-aos="fade-right" data-aos-delay="100">
                        <h2 class="heading" data-aos="fade-right"><b>Hotel Kite</b></h2>
                    </div>
                    <h1 data-aos="fade-down">Login</h1>
                    <form action="" method="post">
                        <div class="mb-3 mt-5" data-aos="fade-down" data-aos-delay="200">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username" name="username">
                            <div id="username" class="form-text">*Pastikan username telah terdaftar</div>
                        </div>
                        <div class="mb-3" data-aos="fade-down" data-aos-delay="300">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-5" name="login" data-aos="fade-down" data-aos-delay="400"><b>Log In</b></button>
                    </form>
                    <p class="greetings mt-3" data-aos="fade-down" data-aos-delay="500">Dengan login, Anda dapat mengendalikan semua aspek operasional hotel dengan mudah :)</p>
                </div>
            </div>
            <div class="image-area col-6 col-md-6 col-sm-12 d-sm-none d-md-block d-none d-sm-block h-100">
                <img src="assets/images/login-image.jpg" class="w-100 h-100">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
