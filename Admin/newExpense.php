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
    <title>Expense management System-New Accounts</title>

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
                                <h3 class="box-title">Expense Form</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="backend/expenses.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Payee</label>
                                    <input type="text" name="payee" class="form-control" placeholder="Enter Payee">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account</label>
                                    <select class="form-control" name="account">
                                        <option>Select Account</option>
                                        <?php
                                        include 'includes/connect.php';
                                        $sql = "SELECT name FROM accounts ";
                                        $q = mysqli_query($conn, $sql);
                                        while ($r = mysqli_fetch_assoc($q)) {
                                        ?>
                                            <option><?php echo $r['name']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">File</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="btnSave" class="btn btn-primary">Submit</button>
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