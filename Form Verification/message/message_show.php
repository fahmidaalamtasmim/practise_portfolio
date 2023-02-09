<?php
session_start();
require '../session_check.php';
require '../db.php';
 $select = "SELECT * FROM messages";
 $select_res = mysqli_query($db_connection, $select);

 //print_r(($select_res));
 //die();
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
                                <th>SL</th>
                                <th>NAME</th>
                                <th>Email</th>
                                <th>MESSAGE</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($select_res as $sl => $msg) { ?>
                                <tr class="<?=($msg['status']==0)?'bg-light':''?>">
                                    <td><?= $sl + 1 ?></td>
                                    <td><?=$msg['name']?></td>
                                    <td><?=$msg['email']?></td>
                                    <td><?=substr($msg['message'],0,10)?></td> 


                                    <!-- <td>< ?=(str_word_count($msg['message']==2))?'...more':$msg['message']?></td> -->



                                    <!-- to link more we have to take it ander anchor tag -->
                                    <td> 
                                       <a href="message_view.php?id=<?=$msg['id']?>" class="btn btn-info">View</a>

                                       <button data-id='delete_logo.php?id=<?= $msg['id'] ?>' class="btn btn-danger delete_btn">Delete</button></td>
                                   
                                </tr>
                            <?php } ?>
                           <?php if(mysqli_num_rows($select_res)==0){?>
                            <tr>
                                <td colspan="5" class="text-center">No Message Found</td>
                            </tr>
                           <?php } ?>
                        </table>
                    </div>

                </div>
            </div>






<?php require '../dashboard_parts/footer.php'; ?>