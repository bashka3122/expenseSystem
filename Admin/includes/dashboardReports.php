<?php
include 'connect.php';
//Total Expenses
$e = "SELECT SUM(amount) as amount FROM expenses";
$q = mysqli_query($conn, $e);
$exp = mysqli_fetch_assoc($q);
//last 30 days expenses
$last = "SELECT SUM(amount) as amount FROM expenses WHERE date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
$query = mysqli_query($conn, $last);
$Lexp = mysqli_fetch_assoc($query);
//remaining Budget
$b = "SELECT SUM(amount) as amount FROM budgets  WHERE status=0";
$bq = mysqli_query($conn, $b);
$budget = mysqli_fetch_assoc($bq);
// Total Budget
$total = $budget['amount'] + $exp['amount'];
