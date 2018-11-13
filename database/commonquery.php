<?php

include_once 'database.php';

function select_singlerow($table, $conditions = null, $ordertype = NULL) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
        exit();
    } else {
        if ($conditions != NULL) {
            $cleanData = "";
            foreach ($conditions as $key => $data) {
                $tmpdata = trim($data);
                $tmpdata = stripcslashes($tmpdata);
                $tmpdata = htmlspecialchars($tmpdata);
                $cleanData .= $key . "='" . $tmpdata . "',";
            }
            $cleanData = rtrim($cleanData, ",");

            $sql = "SELECT * FROM " . $table . " WHERE " . $cleanData . " ";
        } else {
            $sql = "SELECT * FROM " . $table . " ";
        }

        if ($ordertype != NULL) {
            $sql .= " ORDER BY " . $ordertype;
        }

        $stmt = $database->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}

function select_rows($table, $conditions = null, $ordertype = NULL) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
        exit();
    } else {
        if ($conditions != NULL) {
            $cleanData = "";
            foreach ($conditions as $key => $data) {
                $tmpdata = trim($data);
                $tmpdata = stripcslashes($tmpdata);
                $tmpdata = htmlspecialchars($tmpdata);
                $cleanData .= $key . "='" . $tmpdata . "' AND ";
            }
            $cleanData = rtrim($cleanData, " AND ");

            $sql = "SELECT * FROM " . $table . " WHERE " . $cleanData;
        } else {
            $sql = "SELECT * FROM " . $table . " ";
        }

        if ($ordertype != NULL) {
            $sql .= " ORDER BY " . $ordertype;
        }
        $stmt = $database->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

