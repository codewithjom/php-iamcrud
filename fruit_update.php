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
} else if (isset($_POST['back'])) {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>IAMCRUD</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="./src/output.css" rel="stylesheet" />
</head>

<body>
  <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
      <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <form method='post'>
          <div class='flex m-10 justify-center space-x-4'>
            <input type='text' name='updatename' placeholder='Fruit name' value='<?= $row["fruit_name"] ?>' class='border px-2 py-1'>
            <input type='text' name='updateqty' placeholder='Quantity' value='<?= $row["fruit_qty"] ?>' class='border px-2 py-1'>
            <input type='submit' name='fruitedit' value='Save' class='py-2 px-8 rounded-md bg-green-500 hover:bg-green-600 text-white'>
            <input type='submit' name='back' value='Back' class='py-2 px-8 rounded-md bg-stone-300 hover:bg-stone-400 hover:text-white'>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
