<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $con = new Operations();
    $products = $con->getAllProducts();
    echo '<table><tr><th>ID</th><th>Name</th>
    <th>Description</th><th>Picture</th><th>Category</th></tr>';
    foreach($products as $product){
        echo '<tr>';
        echo '<td><a href="index.php?load=modify&product='.$product->getId().'">'.$product->getId().'</td>';
        echo '<td>'.$product->getName().'</td>';
        echo '<td>'.$product->getDescription().'</td>';
        echo '<td>'.$product->getPicture().'</td>';
        echo '<td>'.$product->getCategory()->getName().'</td>';
        echo '</tr>';
    }
    echo '</table>'
    
    ?>
</body>
</html>