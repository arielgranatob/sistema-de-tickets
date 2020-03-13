<?php
    class Database{   

        // Define os dados da conexão
        private $host = "localhost";
        private $db_name = "sistema-de-tickets";
        private $username = "root";
        private $password = "";
        public $conn;

        // Função para realizar a conexão com o banco de dados
        public function dbConnection(){
    	    $this->conn = null;    
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, 
                  array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                  ));
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
    		catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }