<?php

include 'koneksi.php';

if (isset($_POST['add-room'])) {
    $no_kamar = $_POST['no_kamar'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];

    mysqli_query($conn, "INSERT INTO rooms VALUES(NULL, '$no_kamar', '$kelas', '$status', NULL)");
    header('location:dashboard-room.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM rooms where id = '$id'");
    header("location:dashboard-room.php");
}

if (isset($_POST['edit-room'])) {
    $id = $_POST['id'];
    $no_kamar = $_POST['no_kamar'];
    $kelas = $_POST["kelas"];
    $status = $_POST['status'];

    $conn->query("UPDATE rooms SET id='$id',no_kamar='$no_kamar',kelas='$kelas',status='$status'WHERE id=$id");
    header("location:dashboard-room.php");
}

if (isset($_POST['reservation-room'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $visitor = $_POST['visitor'];

    $conn->query("UPDATE rooms SET status='$status', visitor='$visitor' WHERE id=$id");
    header("location:dashboard-staff-reservation.php");
}
