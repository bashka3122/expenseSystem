<?php
session_start();
if (!$_SESSION['userID']) {
    header('location: ../');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Expense Management system-Reports List</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->

</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php
        include 'includes/aside.php';

        ?>
        <aside class="right-side">


            <section class="content">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Expenses Report List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <div class="card-header">
                                    <img src="images/logo.PNG" width="100%">
                                    <p style="text-align: center;">
                                        All Expenses: <b style="margin-left:60%"> Date: <?php echo date('d/M/Y'); ?></b></br>
                                        <?php echo "From  " . $_GET['fdate'] . "To   " . $_GET['tdate']; ?>
                                    </p>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ref</th>

                                            <th>Payee</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Date</th>

                                        </tr>
                                    <tbody>


                                        <?php
                                        include 'includes/connect.php';
                                        if (isset($_GET['btnFetch'])) {

                                            $type = $_GET['type'];
                                            $fdate = $_GET['fdate'];
                                            $tdate = $_GET['tdate'];
                                            if ($type == 0) {

                                                $sql = "SELECT * FROM expenses WHERE date BETWEEN '$fdate' AND '$tdate'  ";
                                                $r = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($r)) {


                                        ?>
                                                    <tr>
                                                        <td>Ref000<?php echo $row['id']; ?></td>

                                                        <td><?php echo $row['payee']; ?></td>
                                                        <td><?php echo $row['account']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>



                                                    </tr>

                                                <?php
                                                } ?>
                                                <tr>
                                                    <?php
                                                    $t = "SELECT SUM(amount) as amount FROM expenses  WHERE date BETWEEN '$fdate' AND '$tdate'";
                                                    $q = mysqli_query($conn, $t);
                                                    $total = mysqli_fetch_assoc($q);
                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="background-color: black; color:white;">Total:<?php echo $total['amount']; ?></td>
                                                </tr>
                                                <?php
                                            } else {


                                                $sql = "SELECT * FROM expenses WHERE date BETWEEN '$fdate' AND '$tdate' AND account='$type' or payee='$type'  ";
                                                $r = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($r)) {


                                                ?>
                                                    <tr>
                                                        <td>Ref000<?php echo $row['id']; ?></td>

                                                        <td><?php echo $row['payee']; ?></td>
                                                        <td><?php echo $row['account']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>



                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->



</body>

</html>