<?php
include '../includes/connect.php';
if (isset($_POST['btnSave'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $sql = "INSERT INTO users (name,email,role,password) VALUES('$name','$email','$role','$password')";
    $q = mysqli_query($conn, $sql);
    if ($q) {

        echo "<script>alert('successfully saved'); location='../manageusers.php';</script>";
    }
}
