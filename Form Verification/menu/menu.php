<?php
session_start();
require '../session_check.php';
require '../db.php';

$select = "SELECT * FROM menus";
$select_res = mysqli_query($db_connection, $select);


?>

<?php
require '../dashboard_parts/header.php';
?>
<div class="content-body">

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu list</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Menu name</th>
                                <th>Section Id</th>
                                <th>Action</th>

                            </tr>
                            <?php foreach ($select_res as $sl => $menu) { ?>
                                <tr>
                                    <td><?= $sl + 1 ?></td>
                                    <td><?= $menu['menu_name'] ?></td>
                                    <td><?= $menu['section_id'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                   
                                    

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add menu</h3>
                    </div>
                    <div class="card-body">
                        <form action="menu_post.php" method="POST">
                            <div class="mb-3">
                                <label for="" class="form-label">Menu name</label>
                                <input type="text" name="menu_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Section Id</label>
                                <input type="text" name="section_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../dashboard_parts/footer.php';
?>