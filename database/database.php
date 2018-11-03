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

    public function insert($table, $data) {
        $keys = implode(', ', array_keys($data));
//        $values = "'" . implode("','", array_values($data)) . "'";
        $values = $this->clean_data(array_values($data));
        $sql = "INSERT INTO " . $table . "(" . $keys . ")" . "VALUES (" . $values . ")";
        $stmt = $this->connection->prepare($sql);

        if ($stmt->execute() > 0) {
            return "DONE";
        } else {
            return "ERROR";
        }
    }

    public function update($table, $datas, $id) {
        $cleanData = "";
        foreach ($datas as $key => $data) {
            $tmpdata = trim($data);
            $tmpdata = stripcslashes($tmpdata);
            $tmpdata = htmlspecialchars($tmpdata);
            if (next($datas)) {
                $cleanData .= $key . "='" . $tmpdata . "',";
            } else {
                $cleanData .= $key . "='" . $tmpdata . "'";
            }
        }
        $sql = "UPDATE " . $table . " SET " . $cleanData . "WHERE id=" . $id;
        $stmt = $this->connection->prepare($sql);

        if ($stmt->execute() > 0) {
            return "DONE";
        } else {
            return "ERROR";
        }
    }

    public function clean_data($data) {
        $cleandata = "";

        $arraySize = sizeof($data);
        for ($i = 0; $i < $arraySize; $i++) {
            $tmpdata = trim($data[$i]);
            $tmpdata = stripcslashes($tmpdata);
            $tmpdata = htmlspecialchars($tmpdata);
            if (($arraySize - 1) == $i) {
                $cleandata .= "'" . $tmpdata . "'";
            } else {
                $cleandata .= "'" . $tmpdata . "',";
            }
        }

        return $cleandata;
    }

}
