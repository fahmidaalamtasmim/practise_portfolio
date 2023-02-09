<?php 
session_start();
require '../session_check.php';
require '../db.php';

$select = "SELECT * FROM skills";
$select_res = mysqli_query($db_connection, $select);
?>

<?php 
    require '../dashboard_parts/header.php';
?>
<div class="content-body">
    
    <div class="container">
<div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Desp</th>
                <th>Percentage</th>
                <th>Status</th>
            </tr>
            <?php foreach($select_res as $sl=>$skill){ ?>
            <tr>
                <td><?=$sl+1?></td>
                <td><?=$skill['title']?></td>
                <td><?=$skill['description']?></td>
                <td><?=$skill['percentage']?></td>
                <td>
                <a class="btn btn-<?=($skill['status'] == 1)?'success':'light'?>" href="skill_status.php?id=<?=$skill['id']?>"><?=($skill['status'] == 1)?'active':'deactive'?></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Skill</h3>
            </div>
            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Desp</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Percentage</label>
                        <input type="number" name="percentage" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Skill</button>
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