<?php 

require_once('../helper/header.php'); 
require_once('../../db/dbconnection.php');
require_once('./source/categoryList.php');

$id = $_GET['id'];
// print_r($id);

$product_query ="
                select 
                product.id as product_id, 
                product.name as product_name, 
                product.price, 
                product.image, 
                product.description, 
                category.name as category_name, 
                category.id as category_id 
                from product left join category 
                on product.category_id=category.id where product.id=?
                ";
$product_res = $pdo->prepare($product_query);
$product_res->execute([$id]);

$product_data = $product_res->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($product_data);


?>

<div class="container">
    <div class="row">
       <div class="col-8 offset-2">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="update_name" class="form-control w-100 mt-2" placeholder="Enter update product name..." value="<?php echo $_POST['update_name'] ?? $product_data[0]['product_name'] ?>"> 
                    <?php 
                    if(isset($_POST['btn_update'])){
                        $update_name_status = $_POST['update_name'] == "" ? false : true;
                        echo $update_name_status ? "" : "<small class='text-danger'>Update product name required...</small>";
                    }
                    ?>
                <input type="text" name="update_price" class="form-control w-100 mt-2" placeholder="Enter update product price..." value="<?php echo $_POST['update_price'] ?? $product_data[0]['price']; ?>">
                    <?php
                        if(isset($_POST['btn_update'])){
                            $update_price_status = $_POST['update_price'] == "" ? false : true;
                            echo $update_price_status ? "" : "<small class='text-danger'>Update product price required...</small>";
                        }
                    ?>
                <input type="file" name="update_img" class="form-control w-100 mt-2">
                <textarea name="update_description" rows="10" cols="50" class="form-control w-100 mt-2" value="Enter update description..."><?php echo $_POST['update_description'] ?? $product_data[0]['description'];?></textarea>
                    <?php
                        if (isset($_POST['btn_update'])){
                            $update_description_status = $_POST['update_description'] == "" ? false : true;
                            echo $update_description_status ? "" : "<small class='text-danger'>Update product descrption required...</small>";
                        }
                    ?>
                <select name="update_category" class="form-control w-100 mt-2" id="">
                    <option value="">Choose update category...</option>
                    <?php
                        foreach($data as $item){
                            echo "
                                <option value='".$item['id']."'".(isset($_POST['update_category']) && $item['id'] == $_POST['update_category'] ? 'selected' : '').">".$item['name']."</option>
                            ";
                        }
                    ?>
                </select>
                    <?php
                        if(isset($_POST['btn_update'])){
                            $update_category_status = $_POST['update_category'] == "" ? false : true;
                            echo $update_category_status ? "" : "<small class='text-danger'>Update category required...</small>";
                        }
                    ?>
                <input type="submit" name="btn_update" class="btn btn-primary shadow-sm w-100 mt-2" value="Update">
            </form>

            <?php
                // $update_product_query = "update product set name=?, price=?, image=?, description=?, category_id where id=? ";
                // $update_product_res = $pdo->prepare($update_product_query);
                // $update_product_res->execute([$id]);
            ?>   
       </div>
    </div>
</div>


<?php require_once('../helper/footer.php'); ?>