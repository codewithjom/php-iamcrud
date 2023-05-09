<?php

require '_functions.php';
$fruitid = $_GET['id'];
// echo $fruitid;

$searchFruit = searchFruit($fruitid);
$row = $searchFruit->Fetch(PDO::FETCH_ASSOC);

if (isset($_POST['fruitedit'])) {
  $fruitname = $_POST['fruitname'];
  $fruitqty = $_POST['fruitqty'];

  $request = createFruit($fruitname, $fruitqty);

  if ($request == true) {
    header("location: index.php?fruit=added");
  } else {
    header("location: index.php?fruit=error");
  }
} else {
  header("location: index.php?fruit=invalid");
}

?>

<html>

<body>
  <form method='post'>
    <input type='text' name='fruitname' placeholder='Fruit name' value='<?= $row["fruit_name"] ?>'>
    <input type='text' name='fruitqty' placeholder='Quantity' value='<?= $row["fruit_qty"] ?>'>
    <input type='submit' name='fruitedit' value='Edit'>
  </form>
</body>

</html>
