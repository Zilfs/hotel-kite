<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE rooms SET status='Ready', visitor='' WHERE id=$id");
    header("location:dashboard-staff-reservation.php");
}
