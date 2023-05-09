<?php

require '_functions.php';
$fruitid = $_GET['id'];
// echo $fruitid;

$searchFruit = deleteFruit($fruitid);
$row = $searchFruit->Fetch(PDO::FETCH_ASSOC);

if (isset($_POST['yes'])) {

  $sql = connection()->prepare("DELETE FROM fruits WHERE fruit_id = :fruitid");
  $sql->execute(['fruitid' => $fruitid]);

  header("Location: index.php");

  return $sql;
} else if (isset($_POST['no'])) {

  header("Location: index.php");
}

?>

<html>

<body>
  <form method='post'>
    <input type='submit' name='yes' value='Yes'>
    <input type='submit' name='yes' value='No'>
  </form>
</body>

</html>
