<?php 
require_once('../helper/header.php');
require_once('../../db/dbconnection.php');
require_once('./source/categoryList.php');

?>
<div class="contaier">
    <div class="row">
        <form action="" method="post">
            <div class="col-6 offset-3">
                <input type="text" class="form-control mt-2 w-100" name="product_name" placeholder="Enter product name..." value="<?php echo $_POST['product_name']; ?>">
                    <?php 
                    if(isset($_POST['btn_create'])){
                        $productName = $_POST['product_name'] == "" ? false : true;
                        echo $productName ? "" : "<small class='text-danger'>Product name required...</small>";
                        
                    }
                    ?>
                <input type="text" class="form-control mt-2 w-100" name="product_price" placeholder="Enter product price..." value="<?php echo $_POST['product_price']; ?>">
                <?php 
                    if(isset($_POST['btn_create'])){
                        $productPrice = $_POST['product_price'] == "" ? false : true;
                        echo $productPrice ? "" : "<small class='text-danger'>Product price required...</small>";
                        
                    }
                    ?>
                <input type="file" class="form-control mt-2" name="product_img">
                <textarea name="description" class="form-control mt-2" rows="10" cols="20" placeholder="Enter description..."><?php echo $_POST['description']; ?></textarea>
                <?php 
                    if(isset($_POST['btn_create'])){
                        $productDescription = $_POST['description'] == "" ? false : true;
                        echo $productDescription ? "" : "<small class='text-danger'>Product description required...</small>";
                        
                    }
                    ?>
                <select name="category_name" id="" class="form-select mt-2">
                    <option value=''>Choose category...</option>
                    
                    <?php 
                    foreach($data as $item){
                        $categoryName = $item['name'];
                        echo "<option value=''>$categoryName</option>";
                    }
                    ?>
                </select>
                    <?php 
                    if(isset($_POST['btn_create'])){
                        $product_cat_name = $_POST['category_name'] == "" ? false : true;
                        echo $product_cat_name ? "" : "<small class='text-danger'>Category name required...</small>";
                        
                    }
                    ?>
                <input type="submit" class="btn btn-primary mt-2 w-100" name="btn_create" value="Create">
            </div>
        </form>
    </div>
</div>

<?php require_once('../helper/footer.php') ?>