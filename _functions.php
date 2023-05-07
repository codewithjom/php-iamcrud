<?php

function connection()
{
    date_default_timezone_set('Asia/Manila');
    $dbConnection = new PDO('mysql:dbname=php_iamcrud;host=localhost;charset=utf8mb4', 'root', '');
    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
}

function selectedFruits()
{
    $statement=connection()->prepare("SELECT * FROM fruits Order By fruit_id ASC");
    $statement->execute();
    return $statement;
}
