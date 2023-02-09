<?php
session_start();
require '../session_check.php';
require '../db.php';
$selects = "SELECT * FROM counts";
$select_counts = mysqli_query($db_connection, $selects);

?>

<?php
require '../dashboard_parts/header.php';
?>
<div class="content-body">
    <!-- <div class="container-fluid"> -->

    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Icon</th>
                        <th>Number</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($select_counts as $sl => $icon) { ?>
                        <tr>
                            <!-- serial -->
                            <td><?= $sl + 1 ?></td>

                            <!-- icon link -->
                            <!-- <td><i style="font-family: fontawesome;" class="< ?= $icon['icon'] ? >"></i></td> -->

                            <td><i style="font-family: fontawesome;" class="<?= $icon['icon'] ?>"></i></td>

                            <!-- number -->
                            <td><?= $icon['number'] ?></td>
                            <!-- description -->
                            <td><?= $icon['title'] ?></td>
                            <!-- status -->
                            <td>
                                <a class="btn btn-<?= ($icon['status'] == 1) ? 'success' : 'light' ?>" href="count_status.php?id=<?= $icon['id'] ?>"><?= ($icon['status'] == 1) ? 'active' : 'deactive' ?></a>
                                <!-- delete -->

                                <button data-id='count_delete.php?id=<?= $icon['id'] ?>' class="btn btn-danger delete_btn">Delete</button>
                            </td>
                            <!-- target="_blank" -->


                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- 
edit user -->
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Icons</h3>
                    </div>
                    <?php
                    $fonts = array(
                        'fas fa-share-alt',
                        'fas fa-heart',
                        'fa fa-thumbs-o-up',
                        'fa-search-plus',
                        'fa-search-minus',
                        'fa-power-off',
                        'fa-signal',
                        'fas fa-user-secret',
                        'fa fa-bug',
                        'fa-home',
                        'fa-file-o',
                        'fa-clock-o',
                        'fa-road',
                        'fa-download'
                    );

                    ?>
                    <div class="card-body">
                        <form action="count_post.php" method="POST">
                            <!-- show icon starts -->

                            <div class="mb-3">
                                <?php foreach ($fonts as $icon) { ?>
                                    <i style="font-family:fontawesome; margin-right:5px;font-size:30px" class="fa <?= $icon ?>"></i>
                                <?php } ?>
                            </div>

                            <!-- show icon  ends -->
                            <div class="mb-3">
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
                            </div>

                            <div class="mb-3">
                                <input type="number" name="number" class="form-control" placeholder="Number">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>`
            </div>
        </div>
    </div>
</div>
<?php
require '../dashboard_parts/footer.php';
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- selecting icons -->
<script>
    $('.fa').click(function() {
        var icon_class = $(this).attr('class');
        $('#icon').attr('value', icon_class);
    })
</script>


<!-- oops alert -->

<?php if (isset($_SESSION['limit'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $_SESSION['limit'] ?>',
        })
    </script>
<?php }
unset($_SESSION['limit']) ?>




<!-- delete -->

<script>
    $('.delete_btn').click(function() {
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

<?php if (isset($_SESSION['delete'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            'Your icon has been deleted.',
            'success'
        )
    </script>
<?php }
unset($_SESSION['delete']) ?>