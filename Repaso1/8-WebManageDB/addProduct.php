<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add a product</h1>
    <?php 
    try{
        $con = new Operations;
        $categories = $con->getAllCategories();
        echo '<form action="" method="post">';
        echo '<br><br><label for="name">Name:</label>  <input type="text" id="name" name="name" required><br><br>';
        echo '<label for="description">Description:</label>  <input type="text" id="description" name="description" required><br><br>';
        echo '<label for="picture">Picture:</label>  <input type="text" id="picture" name="picture" ><br><br>';
        echo '<label for="category">Category:</label> <select id="category" name="category" required> <br><br>';
                foreach($categories as $cat){
                    echo '<option value="'.$cat->getId().'">'.$cat->getName().'</option>';
                }
                echo '</select><br><br>';
        echo '<input type="submit" value="Add product">';
        echo '</form>';
    }catch(Exception $e){
        echo 'An error occurred: '.$e->getMessage();
    }
    if(isset($_POST['name'])){
        try{
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setDescription($_POST['description']);
            $product->setPicture($_POST['picture']);
            $product->setCategory($con->getCategory($_POST['category']));
            $con->addProduct($product);
            $con->closeConnection();

            echo 'Product successfully added!';
            

        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
    }
    ?>
</body>
</html>