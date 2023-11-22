<?php

class ProductGateway
{
    private PDO $conn;
    
    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }
    
    public function getAll(): array
    {
        $sql = "SELECT *
                FROM car";
                
        $stmt = $this->conn->query($sql);

        /**Creamos un array que irá collendo cada fila do resultado, e logo será devolto */
        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            /** No código anterior, esto fai que devolva os booleans como booleans e non string
            * $row["is_available"] = (bool) $row["is_available"];
            */
            $data[] = $row;
        }
        
        return $data;
    }
    
    public function create(array $data): string
    {
        $sql = "INSERT INTO car (chassis, engine, engineManufacturer)
                VALUES (:chassis, :engine, :engineManufacturer)";
                
        $stmt = $this->conn->prepare($sql);
        //Despois do ?? indica o valor por defecto
        //PDO:PARAM indica o tipo de  dato
        $stmt->bindValue(":chassis", $data["chassis"], PDO::PARAM_STR);
        $stmt->bindValue(":engine", $data["engine"] ?? "", PDO::PARAM_STR);
        $stmt->bindValue(":engineManufacturer", $data["engineManufacturer"] ?? "", PDO::PARAM_STR);
        
        $stmt->execute();
        
        return $this->conn->lastInsertId();
    }
    
    public function get(string $id): array | false
    {
        $sql = "SELECT *
                FROM car
                WHERE carID = :id";
                
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        return $data;
    }
    
    public function update(array $current, array $new): int
    {
        $sql = "UPDATE car
                SET chassis = :chassis, engine = :engine, engineManufacturer = :engineManufacturer
                WHERE carID = :id";
                
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(":chassis", $new["chassis"] ?? $current["chassis"], PDO::PARAM_STR);
        $stmt->bindValue(":engine", $new["engine"] ?? $current["engine"], PDO::PARAM_STR);
        $stmt->bindValue(":engineManufacturer", $new["engineManufacturer"] ?? $current["engineManufacturer"], PDO::PARAM_STR);
        
        $stmt->bindValue(":id", $current["id"], PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    public function delete(string $id): int
    {
        $sql = "DELETE FROM car
                WHERE carID = :id";
                
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->rowCount();
    }
}










