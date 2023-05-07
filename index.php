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
          <div class="font-semibold text-gray-800">Fruits</div>
        </header>
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
                  <td class="p-2">
                    <a>
                      <div class="font-medium text-gray-800">Edit</div>
                    </a>
                  </td>
                  <td class="p-2">
                    <a href='#'>
                      <div class="font-medium text-red-500">Delete</div>
                    </a>
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
