<?php
session_start();
require '../session_check.php';
require '../db.php';

$select = "SELECT * FROM works";
$select_res = mysqli_query($db_connection, $select);


?>

<?php
require '../dashboard_parts/header.php';
?>
<div class="content-body">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Work list</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>User id</th>
                                <th>Category</th>
                                <th>Subtitle</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Thumbnail</th>
                                <th>Featured Image</th>
                            </tr>
                            <?php foreach ($select_res as $sl => $work) { ?>
                                <tr>
                                    <td><?= $sl + 1 ?></td>

                                    <td>
                                        <?php
                                        $user_id = $work['user_id'];
                                        //query for user name
                                        $select_user = "SELECT * FROM users WHERE id =$user_id";
                                        $select_user_res = mysqli_query($db_connection, $select_user);
                                        $after_assoc_user = mysqli_fetch_assoc($select_user_res);
                                        echo $after_assoc_user['name'];
                                        ?>
                                    </td>



                                    <td><?= $work['category'] ?></td>
                                    <td><?= $work['subtitle'] ?></td>
                                    <td><?= substr($work['title'], 0, 7) ?></td>
                                    <td><?= substr($work['description'], 0, 7) . '..more' ?></td>
                                    <td><img width="30" src="../uploads/work/thumbnail/<?= $work['thumbnail'] ?>" alt=""></td>
                                    <td><img width="30" src="../uploads/work/featured_image/<?= $work['featured_image'] ?>" alt=""></td>




                                    <!-- <td>
                <a class="btn btn-< ?=($skill['status'] == 1)?'success':'light'?>" href="skill_status.php?id=< ?=$skill['id']?>">< ?=($skill['status'] == 1)?'active':'deactive'?></a>
                </td> -->

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add works</h3>
                    </div>
                    <div class="card-body">
                        <form action="work_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <input type="hidden" name="user_id" class="form-control" value="<?= $after_assoc['id'] ?>">
                                <!-- <input type="hidden" name="id" class="form-control" value="< ?=$select_res['id']?>"> -->

                                <input type="text" name="category" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sub title</label>
                                <input type="text" name="subtitle" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <!-- image -->
                            <div class="mb-3">
                                <label for="" class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Featured image</label>
                                <input type="file" name="featured_image" class="form-control">
                            </div>
                            <!-- image -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add work</button>
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