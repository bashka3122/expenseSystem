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


        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                <tbody>


                                    <?php

                                    include 'includes/connect.php';
                                    $sql = "SELECT * FROM users";
                                    $r = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($r)) {


                                    ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['role']; ?></td>

                                            <td>
                                                <?php
                                                $role = $_SESSION['userRole'];
                                                if ($role == 'user' || $role == 'User') { ?>

                                                    <span>you don't have premission</span>
                                                <?php  } else {

                                                ?>
                                                    <a href="editusers.php?uid=<?php echo $row['id']; ?>">

                                                        <button class="btn btn-info">Edit</button>

                                                    </a>
                                                    <a href="backend/users.php?uid=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </a>
                                                <?php
                                                } ?>
                                            </td>

                                        </tr>
                                    <?php     }
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