<?php
require '_functions.php';

if (isset($_POST['submit'])) {
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
