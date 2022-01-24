<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <script src="https://cdn.tailwindcss.com"></script>

  <title>headerlog</title>


</head>

<body>
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
  $articles = $bdd->query('SELECT * FROM user ');
  $a = $articles->fetch();
  ?>
  <header class="bg-white shadow-xl">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
      <div class="w-full py-3 flex items-center justify-between border-b border-indigo-500 lg:border-none">
        <div class="flex items-center">
          <a href="index.php">
            <span class="sr-only">Workflow</span>
            <img class="h-8 w-auto sm:h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
          </a>
          <div class="hidden ml-10 space-x-4 lg:block">
            <a href="index.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
              Marché
            </a>

            <a href="produits.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
              Produits
            </a>
            <a href="profil.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
              Profil
            </a>
          </div>
        </div>
        <?php
        if (isset($_SESSION['valid'])) {
          include("connection.php");
          $result = mysqli_query($mysqli, "SELECT * FROM user");

        ?>
          <div class="ml-10 space-x-4">
            <div class="flex justify-end">
              <div> <a href="creation_article.php" class="mx-4 inline-block bg-white py-2 px-3 border rounded-md text-base font-medium text-indigo-600 hover:text-white hover:bg-indigo-600">+ ajouter un nouveau article</a>
              </div>
              <div>
                <div class="mr-1 flex-shrink-0 h-12 w-12">
                  <a href="profil.php" style="width: 48px !important; height: 48px !important;display: block;" class="text-center border border-gray-500 py-3 px-auto text-gray-600 rounded-3xl font-bold hover:bg-slate-100 shadow-md">
                    <?php $rest = strtoupper(substr($_SESSION['prenom'], 0));
                    $rest1 = strtoupper(substr($_SESSION['nom'], 0));
                    echo $rest[0] . $rest1[0]; ?>
                  </a>
                </div>
              </div>
              <div> <a href="logout.php" class="mx-2 inline-block shadow-md bg-indigo-600 py-2 px-3 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-90">Déconnexion</a>
              </div>
            </div>
          </div>
        <?php
        } else {
        ?>
          <div class="ml-10 space-x-4">
            <div class="flex justify-end">
            </div>
            <div> <a href="login.php" class="mx-2 inline-block shadow-md bg-indigo-600 py-2 px-3 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-90">Connexion</a>
            </div>
          </div>
          <div> <a href="register.php" class="mx-2 inline-block shadow-md bg-indigo-600 py-2 px-3 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-90">Inscription</a>
          </div>
      </div>
      </div>
    <?php
        } ?>

    </div>
    <div class="py-2 flex flex-wrap justify-center space-x-4 lg:hidden">
      <a href="index.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
        Marché
      </a>

      <a href="produits.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
        Produits
      </a>

      <a href="profil.php" class="p-3 text-base font-medium text-indigo-600 rounded-md hover:bg-indigo-50 hover:text-indigo-600">
        Profil
      </a>
    </div>
    </nav>
  </header>

</body>

</html>