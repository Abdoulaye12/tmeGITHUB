<?php session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Accueil</title>

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

    <div class="">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
        $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
        ?>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-15 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php while ($a = $articles->fetch()) { ?>
                    <div class="group relative">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="<?= $a['image_'] ?>" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="modal.php?id=<?= $a['id'] ?>">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        <?= $a['nom_article'] ?>
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500"><?= $a['statut'] ?></p>
                            </div>
                            <p class="text-sm font-medium text-gray-900"><?= $a['prix'] ?> $</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>