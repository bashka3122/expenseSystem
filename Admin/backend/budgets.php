<?php
include '../includes/connect.php';
//save
if (isset($_POST['btnSave'])) {
    $amount = $_POST['amount'];
    $code = $_POST['code'];
    $date = $_POST['date'];
    $sql = "INSERT INTO budgets (amount,code,date) VALUES('$amount','$code','$date')";
    $q = mysqli_query($conn, $sql);
    if ($q) {

        echo "<script>alert('successfully saved'); location='../manageBudgets.php';</script>";
    }
}
//delete
if (isset($_GET['Bid'])) {
    $id = $_GET['Bid'];
    $del = "DELETE FROM budgets WHERE id='$id'";
    $q = mysqli_query($conn, $del);
    if ($q) {
        echo "<script>alert('Successfully Deleted'); location='../manageBudgets.php';</script>";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
//update
if (isset($_POST['btnUpdate'])) {
    $amount = $_POST['amount'];
    $code = $_POST['code'];
    $date = $_POST['date'];
    $id = $_POST['id'];
    $sql = "UPDATE budgets SET amount='$amount', code='$code',date='$date'
    WHERE id='$id'";
    $q = mysqli_query($conn, $sql);
    if ($q) {
        echo "<script>alert('successfully Updated'); location='../manageBudgets.php';</script>";
    } else {
        echo "error";
    }
}
