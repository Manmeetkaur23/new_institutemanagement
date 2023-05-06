<?php
     
	
    class dbConfig {
        public $conn;
        protected $serverName;
        protected $userName;
        protected $password;
        protected $dbName;
        function dbConfig() {
            $this->serverName = 'localhost';
            $this->userName = 'root';
            $this->password = '';
            $this->dbName = 'harkshtech_ims';
            // $this->conn = new PDO("mysql:host=".$this->serverName.";dbname=". $this->dbName,$this->userName,  $this->password);
            $this->conn = new mysqli($this->serverName,$this->userName ,$this->password,$this->dbName);
        }
         
           
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // echo "Error failed to connect to MySQL: " . $e->getMessage();
            
    }
        
    ?>
