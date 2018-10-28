<?php

Class Database {

    public $servername = "localhost";
    public $username = "root";
    public $password = null;
    public $dbname = "inventory";
    public $errormsg = null;
    public $connection = null;
    public $connectioncheck = false;
    private $result = false;

    public function connect() {
        if ($this->connectioncheck) {
            return TRUE;
        } else {
            try {
                $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->connectioncheck = TRUE;
                return TRUE;
            } catch (PDOException $exc) {
                $this->errormsg = $exc->getMessage();
                return FALSE;
            }
        }
    }

    public function disconnect() {
        if ($this->connectioncheck) {
            $this->connection = null;
            $this->connectioncheck = FALSE;
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
