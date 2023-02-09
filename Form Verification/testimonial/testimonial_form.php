<?php
session_start();
require '../db.php';
require '../session_check.php';

// $select = "SELECT *  FROM users";
// $select_users = mysqli_query($db_connection, $select);
?>
<?php
require '../dashboard_parts/header.php';
?>


<div class="content-body">
    <div class="row">
        <div class="container">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Add works</h3>
                    </div>
                    <div class="card-body">
                        <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">

                        <!-- <input type="hidden" name="user_id" class="form-control"> -->

                            <!-- image -->
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <!-- image -->
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add review</button>
                            </div>
                        </form>

<!-- ///////////////////////////// -->

<!-- ///////////////////////////// -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- show information -->
<?php
$select = "SELECT * FROM testimonial";
$select_res = mysqli_query($db_connection, $select);

?>
<div class="content-body">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Review list</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Action</th>
                              
                            </tr>
                            <?php foreach ($select_res as $sl => $work) { ?>
                                <tr>
                                    <td><?= $sl + 1 ?></td>

                                <td>
                                    <img width="100" src="../uploads/testimonial/<?= $work['image'] ?>" alt="">
                                </td>

                                    <td><?= $work['description'] ?></td>
                                    <td><?= $work['name'] ?></td>
                                    <td><?= $work['position'] ?></td>

                                    <td>
                                        <a  href="/web dev 2205/Form Verification/testimonial/testimonial_delete.php?id=<?= $work['id']?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    
                                   
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>


<?php
require '../dashboard_parts/footer.php';
?>