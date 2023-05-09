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
  $sql = connection()->prepare("SELECT * FROM fruits Order By fruit_id ASC");
  $sql->execute();
  return $sql;
}

function createFruit($fruitname, $fruitqty)
{
  $sql = connection()->prepare("INSERT INTO fruits(fruit_name, fruit_qty) VALUES (:fruit_name, :fruit_qty)");
  $sql->execute(['fruit_name' => $fruitname, 'fruit_qty' => $fruitqty]);

  if ($sql) {
    return true;
  } else {
    return false;
  }
}

function searchFruit($searchFruit)
{
  $sql = connection()->prepare("SELECT * FROM fruits WHERE fruit_name LIKE :fruit_name Order By fruit_name ASC");
  $sql->execute(['fruit_name' => "%$searchFruit%"]);

  $search = $sql->rowCount();

  return $sql;
}

function searchFruit($fruitid)
{
  $sql = connection()->prepare("SELECT * FROM fruits WHERE fruit_id LIKE :fruit_id");
  $sql->execute(['fruit_id' => $fruitid]);
  return $sql;
}

function updateFruit()
