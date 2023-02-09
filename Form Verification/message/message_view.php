<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

//update status
 $update = "UPDATE messages SET status=1 WHERE id=$id  ";
 $update_res = mysqli_query($db_connection, $update);
 

 $select = "SELECT * FROM messages WHERE id=$id";
 $select_res = mysqli_query($db_connection, $select);
 $after_assoc_msg = mysqli_fetch_assoc($select_res);

 

?>
<?php require '../dashboard_parts/header.php'; ?>



<div class="content-body">
    <!-- <div class="container-fluid"> -->

    <div class="container">
        <div class="row">

            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Messages</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><?= $after_assoc_msg['name']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $after_assoc_msg['email']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $after_assoc_msg['message']?></td>
                                </tr>
                        </table>
                    </div>

                </div>
            </div>






<?php require '../dashboard_parts/footer.php'; ?>