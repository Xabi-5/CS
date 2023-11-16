<?php 
class ProductController{
    public function processRequest(string $method, ?string $id): void{
        if($id){
            $this->processResourceRequest($method, $id);    
        }else{
            $this->procesCollectionRequest($method);
        }
    }
    private function processResourceRequest(string $method, string $id): void{

    }

    private function procesCollectionRequest(string $method): void{
        switch($method){   
            case "GET":
                    echo json_encode()
        }
    }
}