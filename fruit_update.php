<?php

require '_functions.php';
$fruitid = $_GET['id'];
// echo $fruitid;

$searchFruit = updateFruit($fruitid);
$row = $searchFruit->Fetch(PDO::FETCH_ASSOC);

if (isset($_POST['fruitedit'])) {
  $updatename = $_POST['updatename'];
  $updateqty = $_POST['updateqty'];

  $sql = connection()->prepare("UPDATE fruits SET fruit_name = :updatename, fruit_qty = :updateqty WHERE fruit_id = :fruitid");
  $sql->execute(['updatename' => $updatename, 'updateqty' => $updateqty, 'fruitid' => $fruitid]);

  header("Location: index.php");

  return $sql;
}

?>

<html>

<body>
  <form method='post'>
    <input type='text' name='updatename' placeholder='Fruit name' value='<?= $row["fruit_name"] ?>'>
    <input type='text' name='updateqty' placeholder='Quantity' value='<?= $row["fruit_qty"] ?>'>
    <input type='submit' name='fruitedit' value='Save'>
  </form>
</body>

</html>
