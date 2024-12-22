<?php 
    require_once("../helper/header.php");

    require_once("../../db/dbconnection.php");

?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="" method="post">
                    <input type="text" name="category_name" class="form-control mt-2" placeholder="Enter category name..." value="">
                    <input type="submit" name="btn_create" class="form-control btn btn-outline-primary shadow-sm mt-3 w-100" value="Create">
                </form>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <div class="p-1">
                                    hello
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once("../helper/footer.php");

if(isset ($_POST['btn_create'])){
    $categoryName = $_POST['category_name'];

    if($categoryName != ""){
        $sql_query = "insert into category (name) values (?)";
        $res = $pdo->prepare($sql_query);
        $res->execute([$categoryName]);

        header("Location:create.php");
    }else {
        echo "$categoryName is Null";
    }
}

?>
