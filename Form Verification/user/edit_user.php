<?php
require '../db.php';

session_start();
require '../session_check.php';

$id = $_GET['id'];
$select_user = "SELECT*FROM users WHERE id=$id";
$select_user_res = mysqli_query($db_connection,$select_user);
//information of one person
$after_assoc = mysqli_fetch_assoc($select_user_res);//information of a single user : takes query variable as parameter

// echo $after_assoc['name'];
// echo $after_assoc['email'];

?>

<?php require '../dashboard_parts/header.php'; ?>
<div class="content-body"> 
			
			<div class="container-fluid"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Users</h3>
                    </div>
                    <div class="card-body">
                        <form action="update_user.php" method="POST">
                            <div class="mb-3">

                            <!-- real id -->
                            <input type="hidden" name="id" class="form-control" value="<?=$id?>">

                                <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" value="<?=$after_assoc['email']?>">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php require '../dashboard_parts/footer.php'; ?>