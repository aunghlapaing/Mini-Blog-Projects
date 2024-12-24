<?php 
    require_once("../helper/header.php");

    require_once("../../db/dbconnection.php");

    $category_query = "select id, name from category order by created_at DESC";

    $cat_fetch = $pdo->prepare($category_query);
    $cat_fetch->execute();

    $categories = $cat_fetch->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // print_r ($categories);

?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="" method="post">
                    <input type="text" name="category_name" class="form-control mt-2" placeholder="Enter category name...">
                    <?php 
                        if(isset ($_REQUEST['btn_create'])){
                            $check_cat_name = $_REQUEST['category_name'];

                            if ($check_cat_name != ""){
                                $sql_query = "insert into category (name) values (?)";
                                $res = $pdo->prepare($sql_query);
                                $res->execute([$check_cat_name]);

                                header("Location:create.php");
                            
                            }else{
                                echo '<small class="text-danger">Category name is required...</small>';
                            }
                        };
                    ?>
                    <input type="submit" name="btn_create" class="form-control btn btn-primary shadow-sm mt-3 w-100" value="Create">
                </form>
            </div>

            <div class="col-8">
                <?php
                    foreach($categories as $item){
                        $categoryList = $item['name'];
                        $categoryId = $item ['id'];
                        echo "
                        <div class='card my-2'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-10'>
                                        <div class='p-1'>
                                            $categoryList
                                        </div>
                                    </div>
                                    <div class='col-2'>
                                        <a href='update.php?id=$categoryId' class='btn btn-secondary'><i class='fa-solid fa-pen-to-square'></i></a>
                                        <a href='delete.php?id=$categoryId' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>

<?php require_once("../helper/footer.php"); ?>
