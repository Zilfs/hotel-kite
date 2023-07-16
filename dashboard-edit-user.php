<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Hotel Kite</title>
    <link rel="stylesheet" href="assets/style/dashboard-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="page-content"></div>
    <div class="container-fluid">
    <div class="d-flex flex-row mobile-menu d-lg-none">
            <button class="btn btn-secondary mx-3 mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">🖥️</button>
            <!-- Mobile Menu -->
            <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <div class="icon-area mb-5">
                        <a href="dashboard.php" class="d-flex flex-row align-items-center mt-5" style="text-decoration:none;" data-aos="fade-down">
                            <img src="assets/images/hotel-icon.png" class="image-icon w-25 h-25">
                            <h3 class="app-name" style="text-decoration: none;">Hotel Kite</h3>
                        </a>
                    </div>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">❌</button>
                </div>
                <div class="offcanvas-body">
                    <div class="sidebar-list d-flex flex-column mt-3 w-100">
                        <a href="dashboard-user.php" class="user-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right">User</a>
                        <a href="" class="room-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right" data-aos-delay="100">Room</a>
                        <a href="index.php" class="logout-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2"data-aos="fade-right" data-aos-delay="200">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <!-- Sidebar Menu -->
            <div class="sidebar d-flex flex-column align-items-center justify-content-center col-xl-2 col-lg-3 bg-dark min-vh-100 d-none d-lg-block">
                <div class="icon-area mb-5">
                    <a href="dashboard.php" class="d-flex flex-row align-items-center mt-5" style="text-decoration:none;" data-aos="fade-down">
                        <img src="assets/images/hotel-icon.png" class="image-icon">
                        <h3 class="app-name" style="text-decoration: none;">Hotel Kite</h3>
                    </a>
                </div>
                <div class="sidebar-list d-flex flex-column mt-3 w-100">
                    <a href="dashboard-user.php" class="user-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right">User</a>
                    <a href="" class="room-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right" data-aos-delay="100">Room</a>
                    <a href="index.php" class="logout-btn sidebar-item pt-3 pb-3 w-100 text-center mb-2"data-aos="fade-right" data-aos-delay="200">Log Out</a>
                </div>
            </div>
            <div class="col-10 d-flex flex-row justify-content-center">
                <div class="form-section w-75 mt-5">
                <h1>Edit User</h1>
                <?php
include 'koneksi.php';
include 'crud-users.php';
$panggil = $conn->query("SELECT * FROM users where id_user='$_GET[edit]'");
?>
<?php
while ($row = $panggil->fetch_assoc()) {
    ?>
                    <form action="crud-users.php" method="POST">
                        <div class="form-group">
                            <label for="id_user">ID User</label>

                            <input type="text" class="form-control mb-3" name="id_user" value="<?=$row['id_user']?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>

                            <input type="text" class="form-control mb-3" name="username" value="<?=$row['username']?>">

                        </div>

                        <div class="form-group">

                            <label for="levels">Level</label>
                            <div class="form-check">

                                <input type="radio" class="form-check-input" name="levels" value="manager"
                                <?php
if (($row['levels']) === "manager") {echo "checked";}
    ?>> Manager
                            </div>

                            <div class="form-check">

                                <input type="radio" class="form-check-input" name="levels" value="staff"
                                <?php
if (($row['levels']) === "staff") {echo "checked";}
    ?>> Staff
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="edit-user" value="Edit" class="form-control btn btn-primary">
                            </div>
                        </div>
                    </form>
                <?php }?>
                </div>
            </div>
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
