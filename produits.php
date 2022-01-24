<?php session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Produits</title>

</head>

<body>
  <?php
  if (isset($_SESSION['valid'])) {
    include("connection.php");
    $result = mysqli_query($mysqli, "SELECT * FROM user");

    require("headerlog.php");
  } else {
    require('header.php');
  } ?>

  <div class="m-10 sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
      Produits
    </h2>
  </div>
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
  $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
  ?>
  <div class="ml-7 flex flex-col">
    <div class="w-screen -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Id
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nom article
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  categorie
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  prix ($)
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Auteur
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <?php while ($a = $articles->fetch()) { ?>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">
                    <?= $a['id'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <a href="modal.php?id=<?= $a['id'] ?>">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="<?= $a['image_'] ?>" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            <?= $a['nom_article'] ?>
                          </div>
                        </div>
                      </div>
                    </a>
                  </td>
                  <td class="px-6 py-4 whitespace-normal">
                    <div class="text-sm text-gray-900"><?php echo explode(' ', trim($a['description_']))[0] . " ... "; ?></div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?= $a['categorie'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?= $a['prix'] . " $" ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      <?= $a['statut'] ?>
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?= $a['auteur_article'] ?>
                  </td>
                  <?php
                  if (isset($_SESSION['valid'])) {
                    include("connection.php");
                    $result = mysqli_query($mysqli, "SELECT * FROM user");
                  ?>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="modification1.php?edit=<?= $a['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="supprimer.php?id=<?= $a['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer</a>
                    </td>
                  <?php
                  } else {
                  ?>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="req.php" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="req.php" class="text-indigo-600 hover:text-indigo-900">Supprimer</a>
                    </td>
                  <?php
                  } ?>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>



</body>

</html>