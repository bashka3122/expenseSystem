<?php
include '../includes/connect.php';
//save
if (isset($_POST['btnSave'])) {
    $amount = $_POST['amount'];
    $payee = $_POST['payee'];
    $date = $_POST['date'];
    $account = $_POST['account'];
    $file = "../uploads/" . $_FILES["file"]["name"];

    $b = "SELECT SUM(amount) as a FROM budgets WHERE status =0";
    $bq = mysqli_query($conn, $b);
    $r = mysqli_fetch_assoc($bq);
    $am = $r['a'];
    if ($am < $amount) {
        echo "<script>alert('Waxaad gaartay limit-ka budget-kaaga'); location='../manageExpense.php';</script>";
    } else {


        move_uploaded_file($_FILES["file"]["tmp_name"], $file);


        $filename = $_FILES['file']['name'];

        $sql = "INSERT INTO expenses (amount,payee,date,account,file) VALUES('$amount','$payee','$date','$account','$filename')";
        $q = mysqli_query($conn, $sql);
        if ($q) {
            $b = "UPDATE budgets SET amount=amount-$amount WHERE status=0";
            $query = mysqli_query($conn, $b);
            echo "<script>alert('successfully saved'); location='../manageExpense.php';</script>";
        }
    }
}
//delete
if (isset($_GET['Eid'])) {
    $id = $_GET['Eid'];
    $del = "DELETE FROM expenses WHERE id='$id'";
    $q = mysqli_query($conn, $del);
    if ($q) {
        echo "<script>alert('Successfully Deleted'); location='../manageExpense.php';</script>";
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
