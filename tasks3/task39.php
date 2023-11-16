<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    function priceFinder(){
        $price = 0;
        if($_POST["drinks"] == "Coke"){
            $price = 1 * $_POST["quantity"];
        }elseif($_POST["drinks"] == "Pepsi"){
            $price = 0.8 * $_POST["quantity"];
        }elseif($_POST["drinks"] == "orange juice"){
            $price = 0.9 * $_POST["quantity"];
        }elseif($_POST["drinks"] == "apple juice"){
            $price = 1.1 * $_POST["quantity"];
        }
        return $price;
    }
?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Select your beverage: </h3><br>
        <label for="idDrinks">
            <select name="drinks" id="idDrinks">
                <option value="Coke">Coke - 1€</option>
                <option value="Pepsi">Pepsi - 0.80€</option>
                <option value="orange juice">Orange juice - 0.90€</option>
                <option value="apple juice">Apple juice - 1.10€</option>
            </select>
        </label>
        <h3>Select the quantity</h3><br>
        <label for="idQuantity"></label>
        <input type="number" id="idQuantity" name="quantity" min="0" max="33"><br>
        <input type="submit">


    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        
        echo "You have asked for ".$_POST["quantity"]." bottles of ".$_POST["drinks"].
        ". Total price to pay: ";
        echo priceFinder()." €"; 
    
    }
?>


</body>

</html>