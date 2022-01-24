<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <script src="https://cdn.tailwindcss.com"></script>

  <title>header</title>


</head>

<body>

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
      <div class="ml-10 space-x-4">
        <a href="login.php" class="inline-block bg-white py-2 px-3 border rounded-md text-base font-medium text-indigo-600 hover:bg-indigo-50">Connexion</a>

        <a href="register.php" class="inline-block bg-indigo-500 py-2 px-3 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-90">Inscription</a>
      </div>
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