<?php
include '../includes/connect.php';
//save
if (isset($_POST['btnSave'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];

    $sql = "INSERT INTO accounts (name,code) VALUES('$name','$code')";
    $q = mysqli_query($conn, $sql);
    if ($q) {

        echo "<script>alert('successfully saved'); location='../manageAccounts.php';</script>";
    }
}
//delete
if (isset($_GET['Aid'])) {
    $id = $_GET['Aid'];
    $del = "DELETE FROM accounts WHERE id='$id'";
    $q = mysqli_query($conn, $del);
    if ($q) {
        echo "<script>alert('Successfully Deleted'); location='../manageAccounts.php';</script>";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
//update
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];

    $id = $_POST['id'];
    $sql = "UPDATE accounts SET name='$name', code='$code'
    WHERE id='$id'";
    $q = mysqli_query($conn, $sql);
    if ($q) {
        echo "<script>alert('successfully Updated'); location='../manageAccounts.php';</script>";
    } else {
        echo "error";
    }
}
