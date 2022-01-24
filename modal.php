<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Modal</title>

</head>

<body>
<?php
  if (isset($_SESSION['valid'])) {
    include("connection.php");
    $result = mysqli_query($mysqli, "SELECT * FROM user");

    require("headerlog.php");
  } else {
    require('header.php');
  } 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
        $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $article->execute(array($id));
        if ($article->rowCount() == 1) {
            $a = $article->fetch();
        } else {
            die('Erreur : l\'article n\'existe pas...');
        }
    }
    ?>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
            Détail de l'article
        </h2>
    </div>
    <div class="mt-10 max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-4xl">
        <div class="md:flex">
            <div class="md:shrink-0">
                <img class="h-48 w-full object-cover md:h-full md:w-48" src="<?= $a['image_'] ?>" alt="Man looking at item at a store">
            </div>
            <div class="px-4 py-3">
                <div class="m-2 uppercase tracking-wide text-3xl text-indigo-500 font-semibold">
                    <?= $a['nom_article'] ?>
                </div>
                <p class=" mx-3 my-2 block mt-1 text-2xl leading-tight font-medium"><?= $a['prix'] . " $" ?></p>
                <span class="m-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <?= $a['statut'] ?>
                </span>
                <p class="my-2 mx-3 text-slate-800"><?= $a['categorie'] ?></p>
                <p class="my-2 mx-3 text-slate-400"><?= $a['description_'] ?></p>
                
                    <p class="uppercase font-semibold my-2 mx-3 text-slate-800"><?= $a['auteur_article'] ?></p>
                
                <p class="text-xs my-2 mx-3 text-slate-800"><?= $a['date_time_edition'] ?: $a['date_time_publication'] ?></p>
                <div class="my-2 mx-3 flex space-x-4 ...">
                    <?php
                    if (isset($_SESSION['valid'])) {
                        include("connection.php");
                        $result = mysqli_query($mysqli, "SELECT * FROM user");
                    ?>
                        <div>
                            <a href="modification1.php?edit=<?= $a['id'] ?>"><button value="Envoyer l'article" name="submit" type="submit" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Edit
                                </button>
                            </a>
                        </div>
                        <div>
                            <a href="supprimer.php?id=<?= $a['id'] ?>"><button name="" type="reset" class=" w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Supprimer
                                </button>
                            </a>
                        </div>
                    <?php
                    } else { ?>
                        <div>
                            <a href="req.php"><button value="Envoyer l'article" name="submit" type="submit" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Edit
                                </button>
                            </a>
                        </div>
                        <div>
                            <a href="req.php"><button name="" type="reset" class=" w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Supprimer
                                </button>
                            </a>
                        </div>
                    <?php
                    } ?>
                    <a href="index.php"><button name="" type="reset" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                            Fermer
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>