<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];
$select_ss = "SELECT*FROM services WHERE id=$id";
$select_ss_res = mysqli_query($db_connection,$select_ss);
$after_assoc_ss = mysqli_fetch_assoc($select_ss_res);

?>

<?php 
    require '../dashboard_parts/header.php';
?>

  <div class="content-body">
     <div class="container"> 
       <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="card">
                        <div class="card-header">
                            <h3>Edit service description</h3>
                        </div>
           
            <div class="card-body">
                <form action="update_service.php" method="POST">
                    
                    <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="<?=$after_assoc_ss['id']?>">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="service" class="form-control" value="<?= $after_assoc_ss['service']?>">
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update service</button>
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






