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
    <title>Expense management System-New users</title>

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
                            <h3 class="box-title">User Update Form</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="backend/users.php" method="post">
                            <div class="box-body">
                                <?php
                                include 'includes/connect.php';
                                $id = $_GET['uid'];
                                $sql = "SELECT * FROM users WHERE id='$id' ";
                                $q = mysqli_query($conn, $sql);
                                if ($q->num_rows > 0) {
                                    $row = mysqli_fetch_assoc($q);
                                }
                                ?>
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                    <label for="exampleInputEmail1">Full name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter fullname" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Role</label>
                                    <select class="form-control" name="role">
                                        <option>--Select user role</option>
                                        <option>Administrator</option>
                                        <option>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password']; ?>">
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