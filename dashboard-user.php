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
        <!-- Mobile Menu -->
        <div class="d-flex flex-row mobile-menu d-lg-none">
            <button class="btn btn-secondary mx-3 mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">🖥️</button>

            <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <div class="icon-area mb-5">
                        <a href="dashboard.php" class="d-flex flex-row align-items-center mt-5 justify-content-around" style="text-decoration:none;" data-aos="fade-down">
                            <img src="assets/images/hotel-icon.png" class="image-icon w-25 h-25">
                            <h3 class="app-name" style="text-decoration: none;">Hotel Kite</h3>
                        </a>
                    </div>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">❌</button>
                </div>
                <div class="offcanvas-body">
                    <div class="sidebar-list d-flex flex-column mt-3 w-100">
                        <a href="dashboard-user.php" class="sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right">User</a>
                        <a href="" class="sidebar-item pt-3 pb-3 w-100 text-center mb-2" data-aos="fade-right" data-aos-delay="100">Room</a>
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
            <div class="col-xl-10 col-lg-9 col-md-12 d-flex flex-row justify-content-center">
                <div class="dashboard-section w-100 mt-5 px-3">
                <h1>Data User</h1>
                <div class="col">
                    <a href="dashboard-add-user.php" class="btn btn-primary btn-sm d-flex justify-content-center mb-3 mt-5">Tambah User</a>
                </div>
                <table class="table table-striped table-hover table-sm overflow-x-scroll">
                    <tr>
                        <th>No</th>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                    <?php
include 'koneksi.php';
$no = 1;
$hasil = $conn->query("SELECT * FROM users");
?>
                    <?php
while ($row = $hasil->fetch_assoc()) {
    ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['id_user'];?></td>
                            <td><?=$row['username'];?></td>
                            <td><?=$row['password'];?></td>
                            <td><?=$row['levels'];?></td>
                            <td>
                                <a href="dashboard-edit-user.php?edit=<?=$row['id_user'];?>" class="btn btn-warning btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?=$row['id_user'];?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusModal<?=$row['id_user'];?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="crud-users.php?id_user=<?=$row['id_user'];?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </table>
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
