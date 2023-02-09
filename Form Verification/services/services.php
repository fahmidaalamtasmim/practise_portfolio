<?php
session_start();
require '../session_check.php';
require '../db.php';
$selects = "SELECT * FROM services";
$select_services = mysqli_query($db_connection, $selects);

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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($select_services as $sl => $icon) { ?>
                        <tr>
                            <!-- serial -->
                            <td><?= $sl + 1 ?></td>

                            <!-- icon link -->
                            <td><i style="font-family: fontawesome;" class="<?= $icon['icon'] ?>"></i></td>

                            <!-- title -->
                            <td><?= $icon['title'] ?></td>
                            <!-- description -->
                            <td><?= $icon['service'] ?></td>

                            <!-- status -->
                            <td>
                                <a class="btn btn-<?= ($icon['status'] == 1) ? 'success' : 'light' ?>" href="services_icon_status.php?id=<?= $icon['id'] ?>"><?= ($icon['status'] == 1) ? 'active' : 'deactive' ?></a>
                            </td>

                            <!-- edit -->

                            <td>
                                <a href='service_update.php?id=<?=$icon['id']?>' class="btn btn-dark">Edit</a>
                                
                            </td>


                            <!-- target="_blank" -->
                            <!-- delete -->
                            <td><button data-id='delete_service.php?id=<?= $icon['id'] ?>' class="btn btn-danger delete_btn">Delete</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- 
edit user -->
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit icon</h3>
                    </div>
                    <?php
                    $fonts = array(
                        'fa fa-free-code-camp',
                        'fa-glass',
                        'fa-music',
                        'fa-search',
                        'fa-envelope-o',
                        'fa-heart',
                        'fa-star',
                        'fa-star-o',
                        'fa-user',
                        'fa-film',
                        'fa-th-large',
                        'fa-th',
                        'fa-th-list',
                        'fa-check',
                        'fa-times',
                        'fa-search-plus',
                        'fa-search-minus',
                        'fa-power-off',
                        'fa-signal',
                        'fa-cog',
                        'fa-trash-o',
                        'fa-home',
                        'fa-file-o',
                        'fa-clock-o',
                        'fa-road',
                        'fa-download',
                        'fa-arrow-circle-o-down',
                        'fa-arrow-circle-o-up',
                        'fa-inbox',
                        'fa-play-circle-o',
                        'fa-repeat',
                        'fa-refresh',
                        'fa-list-alt',
                        'fa-lock',
                        'fa-flag',
                        'fa-headphones',
                        'fa-volume-off',
                        'fa-volume-down',
                        'fa-volume-up',
                        'fa-qrcode',
                        'fa-barcode',
                        'fa-tag',
                        'fa-tags',
                        'fa-book',
                        'fa-bookmark',
                        'fa-print',
                        'fa-camera',
                        'fa-font',
                        'fa-bold',
                        'fa-italic',
                        'fa-text-height',
                        'fa-text-width',
                        'fa-align-left',
                        'fa-align-center',
                        'fa-align-right',
                        'fa-align-justify',
                        'fa-list',
                        'fa-outdent',
                        'fa-indent',
                        'fa-video-camera',
                        'fa-picture-o',
                        'fa-pencil',
                        'fa-map-marker',
                        'fa-adjust',
                        'fa-tint',
                        'fa-pencil-square-o',
                        'fa-share-square-o',
                        'fa-check-square-o',
                        'fa-arrows',
                        'fa-step-backward',
                        'fa-fast-backward',
                        'fa-backward',
                        'fa-play',
                        'fa-pause',
                        'fa-stop',
                        'fa-forward',
                        'fa-fast-forward',
                        'fa-step-forward',
                        'fa-eject',
                        'fa-chevron-left',
                        'fa-chevron-right',
                        'fa-plus-circle',
                        'fa-minus-circle',
                        'fa-times-circle',
                        'fa-check-circle',
                        'fa-question-circle',
                        'fa-info-circle',
                        'fa-crosshairs',
                        'fa-times-circle-o',
                        'fa-check-circle-o',
                        'fa-ban',
                        'fa-arrow-left',
                        'fa-arrow-right',
                        'fa-arrow-up',
                        'fa-arrow-down',
                        'fa-share',
                        'fa-expand',
                        'fa-compress',
                        'fa-plus',
                        'fa-minus',
                        'fa-asterisk',
                        'fa-exclamation-circle',
                        'fa-gift',
                        'fa-leaf',
                        'fa-fire',
                        'fa-eye',
                        'fa-eye-slash',
                        'fa-exclamation-triangle',
                        'fa-plane',
                        'fa-calendar',
                        'fa-random',
                        'fa-comment',
                        'fa-magnet',
                        'fa-chevron-up',
                        'fa-chevron-down',
                        'fa-retweet',
                        'fa-shopping-cart',
                        'fa-folder',
                        'fa-folder-open',
                        'fa-arrows-h',
                        'fa-bar-chart',
                        'fa-camera-retro',
                        'fa-key',
                        'fa-shopping-basket' ,                    
                        'fa-hashtag' ,                            
                        'fa-bluetooth' ,                          
                        'fa-bluetooth-b',                         
                        'fa-percent' ,
                        'fa-firefox',
                        'fa-wpbeginner' ,
                        'fa-battery-empty',

                    );

                    ?>
                    <div class="card-body">
                        <form action="services_post.php" method="POST">
                            <div class="mb-3">
                                <?php foreach ($fonts as $icon) { ?>
                                    <i style="font-family:fontawesome; margin-right:5px;font-size:30px" class="fa <?= $icon ?>"></i>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="icon">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title" id="icon" class="form-control" placeholder="title">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="service" id="icon" class="form-control" placeholder="Service">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update icon</button>
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
<script>
    $('.fa').click(function() {
        var icon_class = $(this).attr('class');
        $('#icon').attr('value', icon_class);
    })
</script>

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