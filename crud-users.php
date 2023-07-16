<?php

include 'koneksi.php';

if (isset($_POST['add-user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $levels = $_POST['levels'];

    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password', '$levels')");
    header('location:dashboard-user.php');
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $conn->query("DELETE FROM users where id_user = '$id_user'");
    header("location:dashboard-user.php");
}

if (isset($_POST['edit-user'])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $levels = $_POST['levels'];

    $conn->query("UPDATE users SET id_user='$id_user',username='$username',levels='$levels'WHERE id_user=$id_user");
    header("location:dashboard-user.php");
}
