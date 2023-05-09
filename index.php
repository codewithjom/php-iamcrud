<?php require '_functions.php' ?>

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
      <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100">
          <div class='flex justify-between'>
            <span class="font-semibold text-gray-800">Fruits</span>
            <form method='post'>
              <input type='text' name='searchfruit' class='border rounded-md py-1 px-2'>
              <button type='submit' name='search' class='border px-4 py-1 text-white bg-blue-500 hover:bg-blue-700'>Search</button>
            </form>
          </div>
        </header>
        <?php
        if (isset($_POST['search'])) {
          $searchFruit = $_POST['searchfruit'];
          $search = searchFruit($searchFruit);

          while ($row = $search->Fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="overflow-x-auto p-3">
              <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                  <tr>
                    <th>#</th>
                    <th class="p-2">
                      <div class="font-semibold text-left">Fruit Name</div>
                    </th>
                    <th class="p-2">
                      <div class="font-semibold text-left">Quantity</div>
                    </th>
                    <th class="p-2">
                      <div class="font-semibold text-left">Registered</div>
                    </th>
                    <th class="p-2">
                      <div class="font-semibold text-left">Updated</div>
                    </th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                  <tr>
                    <td class="p-2">
                      <div class="font-medium text-gray-800"><?= $row['fruit_id'] ?></div>
                    </td>
                    <td class="p-2">
                      <div class="text-left"><?= $row['fruit_name'] ?></div>
                    </td>
                    <td class="p-2">
                      <div class="text-left font-medium text-green-500"><?= $row['fruit_qty'] ?></div>
                    </td>
                    <td class="p-2">
                      <div class="text-left font-medium text-stone-500"><?= $row['fruit_created'] ?></div>
                    </td>
                    <td class="p-2">
                      <div class="font-medium text-stone-500"><?= $row['fruit_updated'] ?></div>
                    </td>
                    <td class="p-2">
                      <a href="fruit_update.php?id=<?= $row['fruit_id'] ?>" class="font-medium text-gray-800">Edit</a>
                    </td>
                    <td class="p-2">
                      <a href="fruit_delete.php?id=<?= $row['fruit_id'] ?>" class="font-medium text-red-500">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        <?php }
        }
        ?>

        <form action='fruit_create.php' method='post'>
          <div class='m-3 space-x-2'>
            <input type='text' name='fruitname' placeholder='Fruit name' class='border rounded-md py-1 px-2'>
            <input type='number' name='fruitqty' placeholder='Quantity' class='border rounded-md py-1 px-2'>
            <button type='submit' name='submit' class='border px-4 py-1 text-white bg-blue-500 hover:bg-blue-700'>Add</button>
          </div>
        </form>
        <div class="overflow-x-auto p-3">
          <table class="table-auto w-full">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
              <tr>
                <th></th>
                <th class="p-2">
                  <div class="font-semibold text-left">Fruit Name</div>
                </th>
                <th class="p-2">
                  <div class="font-semibold text-left">Quantity</div>
                </th>
                <th class="p-2">
                  <div class="font-semibold text-left">Registered</div>
                </th>
                <th class="p-2">
                  <div class="font-semibold text-left">Updated</div>
                </th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <?php
            $getFruit = selectedFruits();
            while ($fruit = $getFruit->fetch(PDO::FETCH_ASSOC)) { ?>
              <tbody class="text-sm divide-y divide-gray-100">
                <tr>
                  <td class="p-2">
                    <div class="font-medium text-gray-800"><?= $fruit['fruit_id'] ?></div>
                  </td>
                  <td class="p-2">
                    <div class="text-left"><?= $fruit['fruit_name'] ?></div>
                  </td>
                  <td class="p-2">
                    <div class="text-left font-medium text-green-500"><?= $fruit['fruit_qty'] ?></div>
                  </td>
                  <td class="p-2">
                    <div class="text-left font-medium text-stone-500"><?= $fruit['fruit_created'] ?></div>
                  </td>
                  <td class="p-2">
                    <div class="font-medium text-stone-500"><?= $fruit['fruit_updated'] ?></div>
                  </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
