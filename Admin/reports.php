<?php
session_start();
if (!$_SESSION['userID']) {
    header('location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense management System-Reports</title>

</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php
        include 'includes/aside.php';

        ?>
        <aside class="right-side">




            <!-- Main content -->
            <section class="content">


                <div class="card">
                    <div class="box box-primary">
                        <div class="box-header">
                            <?php
                            $role = $_SESSION['userRole'];
                            if ($role == 'user' || $role == 'User') {
                                echo " Ma diwaan galim kartid user";
                            } else {


                            ?>
                                <h3 class="box-title">Fetch Report</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="reportList.php" method="get">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option selected disabled>--select Type</option>
                                        <option value="0">All Expenses</option>
                                        <?php
                                        include 'includes/connect.php';
                                        $sql = "SELECT * FROM expenses";
                                        $q = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($q)) {

                                        ?>


                                            <option value="<?php echo $row['payee']; ?>"><?php echo $row['payee']; ?></option>
                                            <option value="<?php echo $row['account']; ?>"><?php echo $row['account']; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">From Date</label>
                                    <input type="date" name="fdate" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">To Date</label>
                                    <input type="date" name="tdate" class="form-control" required>
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="btnFetch" class="btn btn-primary">Fetch</button>
                            </div>
                        <?php } ?>
                        </form>
                    </div>
                </div>



            </section><!-- /.content -->
        </aside>
    </div>
    <!-- Welcome To dashboard: mr. <?php echo $_SESSION['userID']; ?> <a href="includes/logout.php">Logout</a> -->

</body>

</html>