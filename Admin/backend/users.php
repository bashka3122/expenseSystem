<?php
include '../includes/connect.php';
//save
if (isset($_POST['btnSave'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $role = $_POST['role'];
    $sql = "INSERT INTO users (name,email,role,password) VALUES('$name','$email','$role','$pass')";
    $q = mysqli_query($conn, $sql);
    if ($q) {

        echo "<script>alert('successfully saved'); location='../manageusers.php';</script>";
    }
}
//delete
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $del = "DELETE FROM users WHERE id='$id'";
    $q = mysqli_query($conn, $del);
    if ($q) {
        echo "<script>alert('Successfully Deleted'); location='../manageusers.php';</script>";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
//update
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET name='$name', email='$email', 
    password='$password', role='$role' WHERE id='$id'";
    $q = mysqli_query($conn, $sql);
    if ($q) {
        echo "<script>alert('successfully Updated'); location='../manageusers.php';</script>";
    } else {
        echo "error";
    }
}
