<?php

    namespace App;

    class connect{
        public $con;
        function __construct(){
            try{
                $this->con=new \PDO($_ENV["DSN"].":host=".$_ENV["HOST"].";dbname=".$_ENV["DBNAME"].";user=".$_ENV["USER"].";password=".$_ENV["PASSWORD"]);
                $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->con->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                $this->con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
                $this->con->setAttribute(\PDO::ATTR_PERSISTENT, true);
                $this->con->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            } catch(\PDOException $e){
                echo "Connection failed". $e->getMessage();
            }
            return $this->con;
        }
    }

?>