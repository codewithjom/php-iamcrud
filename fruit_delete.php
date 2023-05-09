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
      <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <form method='post'>
          <div class='flex m-10 justify-center space-x-4'>
            <input type='submit' name='yes' value='Yes' class='py-2 px-8 rounded-md bg-red-500 hover:bg-red-600 text-white'>
            <input type='submit' name='no' value='No' class='py-2 px-8 rounded-md bg-stone-300 hover:bg-stone-400 hover:text-white'>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
