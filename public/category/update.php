<?php 
require_once('../helper/header.php');
require_once('../../db/dbconnection.php');

// print_r($_GET['id']);


$fetch_query = "select name from category where id=?";
$res = $pdo->prepare($fetch_query);
$res->execute([$_GET['id']]);

$data = $res->fetch(PDO::FETCH_ASSOC);

// print_r($data);

?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="" method="post">
                <input type="text" class="form-control mt-2" name="upate_category" value='<?php echo $_POST['upate_category'] ?? $data['name']; ?>'>
                <?php
                if(isset($_POST['btn_update'])){
                    $update_cat_name = $_POST['upate_category'];

                    if($update_cat_name != ""){
                        $upate_query = "update category set name=? where id=?";
                        $update = $pdo->prepare($upate_query);
                        $update->execute([$update_cat_name, $_GET['id']]);

                        header("Location:create.php");
                    }else{
                        echo "<small class='text-danger'>Update category name is required...</small>";
                    }
                }
                ?>
                
                <br>
                <input type="submit" class="btn btn-primary mt-2" name="btn_update" value="Update">
            </form>
        </div>
    </div>
</div>



<?php require_once('../helper/footer.php'); ?>