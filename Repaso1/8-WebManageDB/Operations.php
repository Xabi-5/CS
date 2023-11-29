<?php 
    include 'Product.php';
class Operations{

    public function __construct(private PDO $conn){
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

    function getProduct(int $id){
        try{
            $sql = "SELECT *
                    FROM Product 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $product = $stmt->fetchObject('Product');
            return $product;

        }catch(PDOException $e) {
            throw $e;
        }

    }

    function getCategory(int $id){
        try{
            $sql = "SELECT *
                    FROM Category 
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
                FROM Category";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $categories = array();
            while($category = $stmt->fetchObject('Categories')){
                $categories[] = $category;
            }
            
            return $categories;
        }catch(PDOException $e) {
            throw $e;
        }
    }

    function addProduct(Product $product){
        try{
            $sql = "INSERT INTO Product(name, description, picture, idCategory)
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
            $sql = "UPDATE Product
                    SET name=?, description=?, picture=?, idCategory=?
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$product->getName(), $product->getDescription(),
                            $product->getPicture(), $product->getCategory(),
                            $product->getId()]);
            
            return $stmt->rowCount();
        }catch(PDOException $e) {
            throw $e;
        }
    }

    function getUserName(string $login, string $password){
        try{
            $sql = "SELECT name
                    FROM User
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