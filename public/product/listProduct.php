<?php 
    // header("Location:listProduct.php");
    require_once ("../helper/header.php");
    require_once ("../../db/dbconnection.php");

    $query = "
                select 
                product.id, 
                product.image, 
                product.name as productName, 
                product.price, 
                product.description, 
                category.name as categoryName 
                from product left join category 
                on product.category_id=category.id 
            ";
    $res = $pdo->prepare($query);
    $res->execute();

    $data = $res->fetchAll (PDO::FETCH_ASSOC);
    
    echo "<pre>";
    // print_r ($data);

?>

<h1>This is product List page</h1>
<hr>
<div class="container">
    <div class="col">
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category ID</th>
                    <th></th>       
                    <th></th>
                </tr>
            </thead>
        <tbody>
            <?php
                foreach($data as $index => $item){
                    echo "
                        <tr>
                            <td>".++$index."</td>
                            <td class='col-4'><img class='w-50' src='../../image/".$item['image']."' alt=''></td>
                            <td>".$item['productName']."</td>
                            <td>".$item['price']."</td>
                            <td>".$item['description']."</td>
                            <td>".$item['categoryName']."</td>
                            <td><a href='update.php?id=' class='btn btn-secondary'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td><a href='deleteProduct.php?id=".$item['id']."' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a> </td>
                        </tr>
                    ";

                    
                }      
            ?>
        </tbody>
        </table>
    </div>
</div>


<?php require_once("../helper/footer.php") ?>