<?php
session_start();
require '../session_check.php';
require '../db.php';
$select = "SELECT * FROM contact";
$select_res = mysqli_query($db_connection, $select);
?>

<?php require '../dashboard_parts/header.php'; ?>

<div class="content-body">

    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Contact</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>title</th>
                                <th>address</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($select_res as $sl => $logo) { ?>
                                <tr>
                                    <td><?= $sl + 1 ?></td>
                                    <td><?= $logo['title'] ?></td>
                                    <td><?= $logo['address'] ?></td>
                                    <td><?= $logo['email'] ?></td>
                                    <td><?= $logo['phone'] ?></td>

                                    <td><a href="delete_contact.php?id=<?=$logo['id'] ?>" class="btn btn-danger">delete</a> </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h3>Contact info</h3>
                    </div>
                    <div class="card-body">
                        <form action="contact_post.php" method="POST" >
                            <div class="mb-3">
                                <input type="text" class="form-control" name="title" placeholder="title">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="email" placeholder="email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="phone" placeholder="phone">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"> Add</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->


<?php require '../dashboard_parts/footer.php'; ?>

