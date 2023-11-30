<?php 

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include 'Product.php';
    include 'User.php';
class Operations{
    private PDO $conn;

    public function __construct(){
        $this->openConnection();
    }

    public function openConnection(){
        try{
            $servername = "localhost";
            $username = "gestor";
            $password = "abc123.";
            $dbName = "review";
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbName"
            ,$username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "DB Error: " . $e->getMessage();
            $this->conn->rollBack();
        }
    }

    public function closeConnection(){
        unset($this->conn);
    }


    function getCategory(int $id){
        try{
            $sql = "SELECT *
                    FROM category 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $product = $stmt->fetchObject('Category');
            return $product;

        }catch(PDOException $e) {
            throw $e;
        }
    }
    function getAllCategories(){
        try{
            $sql = "SELECT *
                FROM category";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $categories = array();
            while($category = $stmt->fetchObject('Category')){
                $categories[] = $category;
            }
            
            return $categories;
        }catch(PDOException $e) {
            throw $e;
        }
    }

    //Arranxar para que colla a categoria
    function getProduct(int $id){
        try{

             $sql = "SELECT *
                    FROM category 
                    WHERE id = (
                        SELECT idCategory
                        FROM product
                        WHERE id = ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $category = $stmt->fetchObject('Category');
            $sql = "SELECT id, name, description, picture
                    FROM product 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $product = $stmt->fetchObject('Product');
            $product->setCategory($category);
            return $product;

        }catch(PDOException $e) {
            throw $e;
        }

    }

    function addProduct(Product $product){
        try{
            $sql = "INSERT INTO product(name, description, picture, idCategory)
                VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$product->getName(), $product->getDescription(),
                            $product->getPicture(), $product->getCategory()]);
            $categories = array();
            while($category = $stmt->fetchObject('Categories')){
                $categories[] = $category;
            }
            
            return $categories;
        }catch(PDOException $e) {
            throw $e;
        }

    }
    function updateProduct(Product $product){
        try{
            $sql = "UPDATE product
                    SET name=?, description=?, picture=?, idCategory=?
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$product->getName(), $product->getDescription(),
                            $product->getPicture(), $product->getCategory()->getId(),
                            $product->getId()]);
            
            return $stmt->rowCount();
        }catch(PDOException $e) {
            throw $e;
        }
    }

    //make it so it returns an array with the admin perhaps?
    function getUserName(string $login, string $password){
        try{
            $sql = "SELECT name
                    FROM user
                    WHERE login = ? AND password=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$login, $password]);
            
            $name = $stmt->fetchColumn();
            if($name == false){
                return null;
            }else{
                return $name;
            }
        }catch(PDOException $e) {
            throw $e;
        }
    }
}

// echo 'a';

$con = new Operations();
// $product = $con->getProduct(4);
// $categories = $con->getAllCategories();
// foreach($categories as $category){
//     echo $category->getName();
// }
// echo $product->getCategory()->getName();
// echo $product->getId();
// echo $product->getDescription();
echo $con->getUserName('alChicago', 'typewriter');