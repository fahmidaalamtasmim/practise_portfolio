<?php
session_start();
require '../db.php';
require '../session_check.php';
//for showing information in the form starts
$select_banners = "SELECT * FROM banners";
$select_banners_result = mysqli_query($db_connection, $select_banners);
$after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
//for showing information in the form ends

$select_banners_photo = "SELECT * FROM banner_photos";
$select_banners_photo_result = mysqli_query($db_connection, $select_banners_photo);
//$after_assoc_banners_photo = mysqli_fetch_assoc($select_banners_photo_result);
?>
<?php require '../dashboard_parts/header.php'; ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">

            <!-- for banner information starts -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Banner Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="banner_update.php" method="POST">
                            <div class="mb-3">
                                <input type="text" name="subtitle" class="form-control" value="<?= $after_assoc_banners['subtitle'] ?>">
                                <!-- taking the name of database not the name value  -->
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" value="<?= $after_assoc_banners['title'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="description" class="form-control" value="<?= $after_assoc_banners['description'] ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
              <!-- for banner information ends-->


            <!-- for picture list starts-->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Banner Image List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach($select_banners_photo_result as $sl=>$photo){?>
                            <tr>
                                <td><?=$sl+1?></td>
                                <td><img width="40" src="../uploads/banners/<?=$photo['photo']?>" alt=""></td>
                                <!-- banner status starts -->
                                <td><a class="btn btn-<?=($photo['status']==1)?'success':'light'?>"
                                 href="banner_status.php?id=<?= $photo['id']?>">
                                 <!--href ?: will show ? in url -->
                                <?=($photo['status']==1)?'active':'deactive'?>
                                </a>
                                </td>
                                <!-- banner status ends -->
                                <td><button data-id='delete_banner_photo.php?id=<?= $photo['id'] ?>' class="btn btn-danger delete_btn">Delete</button></td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
                </div>
            <!-- for picture list ends-->


<!-- banner photo uploads -->
<div class="col-lg-4">
<div class="card">
                    <div class="card-header">
                        <h3>Edit Image</h3>
                    </div>
                    <div class="card-body">
                        <form action="banner_photo_update.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
<!-- banner photo uploads -->
              
          

        </div>
    </div>
</div>



<?php require '../dashboard_parts/footer.php'; ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.delete_btn').click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                link = $(this).attr('data-id');
                window.location.href = link;
            }
            })
        });
    </script>

    <?php if(isset($_SESSION['delete'])){ ?>
        <script>
            Swal.fire(
                'Deleted!',
                'Your photo has been deleted.',
                'success'
                )
        </script>
    <?php } unset($_SESSION['delete'])?>