<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modify a product</h1>
    <?php 
    try{
        $con = new Operations;
        $categories = $con->getAllCategories();
        $product = $con->getProduct($_GET['product']);
        echo '<form action="" method="post">';
        echo '<label for="id">ID:</label>  <input type="text" id="id" name="id" disabled
        value="'.$_GET['product'].'" ><br><br>';
        echo '<label for="name">Name:</label>  <input type="text" id="name" name="name"
        value ="'.$product->getName().'" required><br><br>';
        echo '<label for="description">Description:</label>  <input type="text" id="description" 
        name="description" value ="'.$product->getDescription().'"required><br><br>';
        echo '<label for="picture">Picture:</label>  <input type="text" id="picture" name="picture"
        value ="'.$product->getPicture().'" ><br><br>';
        echo '<label for="category">Category:</label> <select id="category" name="category" 
        required> <br><br>';
                foreach($categories as $cat){
                    echo '<option value="'.$cat->getId().'">'.$cat->getName().'</option>';
                }
                echo '</select><br><br>';
        echo '<input type="submit" value="Update product">';
        echo '</form>';
    }catch(Exception $e){
        echo 'An error occurred: '.$e->getMessage();
    }
    if(isset($_POST['name'])){
        try{
            $product = new Product();
            $product->setId($_GET['product']);
            $product->setName($_POST['name']);
            $product->setDescription($_POST['description']);
            $product->setPicture($_POST['picture']);
            $product->setCategory($con->getCategory($_POST['category']));
            $con->updateProduct($product);
            $con->closeConnection();

            echo 'Product successfully added!';
            

        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
    }

    ?>
</body>
</html>