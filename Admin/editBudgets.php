<?php
session_start();
if (!$_SESSION['userID']) {
    header('location: ../');
}
?>

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
                        <h3 class="box-title">Account Update Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="backend/budgets.php" method="post">
                        <div class="box-body">
                            <?php
                            include 'includes/connect.php';
                            $id = $_GET['Bid'];
                            $sql = "SELECT * FROM budgets WHERE id='$id' ";
                            $q = mysqli_query($conn, $sql);
                            if ($q->num_rows > 0) {
                                $row = mysqli_fetch_assoc($q);
                            }
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="text" name="amount" class="form-control" value="<?php echo $row['amount']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input type="code" name="code" class="form-control" value="<?php echo $row['code']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="code" name="date" class="form-control" value="<?php echo $row['date']; ?>">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>



        </section><!-- /.content -->
    </aside>
</div>
<!-- Welcome To dashboard: mr. <?php echo $_SESSION['userID']; ?> <a href="includes/logout.php">Logout</a> -->

</body>

</html>