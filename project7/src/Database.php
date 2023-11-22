<?php 
class Database{
    public function __construct(private string $host, 
                                private string $name, 
                                private string $user,
                                 private string $password){
                                 }

    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host}; dbname={$this->name};charset=utf8";

        return new PDO($dsn, $this->user, $this->password, 
        //Este argumento fai que non convirta os datos a string, desta maneira
        //os IDs serán sempre 10 e non "10"
        [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }

}