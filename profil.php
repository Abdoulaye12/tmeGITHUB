<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Profil</title>
</head>

<body>
    <?php
    if (isset($_SESSION['valid'])) {
        include("connection.php");
        $result = mysqli_query($mysqli, "SELECT * FROM user");

        require("headerlog.php");
    ?>
        <form class="px-10 py-5 my-10 mx-auto rounded-xl shadow-md w-9/12  space-y-8 divide-y divide-gray-200">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
            $articles = $bdd->query('SELECT * FROM user ');
            ?>
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <?php $a = $articles->fetch(); ?>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            <?= $a['prenom'] . " " . $a['nom'] ?>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            <?= $a['e_mail'] ?>
                        </p>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="photo" class="block text-sm font-medium text-gray-700">
                                ID N° <?= $a['id'] ?>
                            </label>
                            <div class="mt-2 flex items-center">
                                <span class="h-12 w-12 rounded-full overflow-hidden bg-white">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <a href="profil.php" style="width: 48px !important; height: 48px !important;display: block;" class="text-center border border-gray-500 py-3 px-auto text-gray-600 rounded-3xl font-bold hover:bg-slate-100 shadow-md">
                                            <?php $rest = strtoupper(substr($_SESSION['prenom'], 0));
                                            $rest1 = strtoupper(substr($_SESSION['nom'], 0));
                                            echo $rest[0] . $rest1[0]; ?>
                                        </a>
                                    </div>
                                </span>
                                <label class="ml-3 block">
                                    <span class="sr-only">Choisir une image</span>
                                    <input disabled name="image_" type="file" required class="mt-2 block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                            " />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <div class=" grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Prenom <span class="text-red-500">*</span></label>
                                <input value="<?= $_SESSION['prenom'] ?>" disabled type="text" name="prenom" id="first-name" required autocomplete="given-name" placeholder="Prenom" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="ml-1 block text-sm font-medium text-gray-700">Nom <span class="text-red-500">*</span></label>
                                <input value="<?= $_SESSION['nom'] ?>" disabled type="text" name="nom" id="last-name" required autocomplete="family-name" placeholder="Nom" class="outline-none py-2 px-3 placeholder-gray-400 border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="ml-1 block text-sm font-medium text-gray-700">Adresse e-mail <span class="text-red-500">*</span></label>
                            <div class=" mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input value="<?= $_SESSION['e_mail'] ?>" disabled type="email" name="e_mail" id="email" required class="w-full border border-gray-300 outline-none py-2 px-6 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block pl-10 sm:text-sm rounded-md" placeholder="prenom@exemple.com">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class=" col-span-6 sm:col-span-3">
                                <label for="phone-number" class="ml-1 block text-sm font-medium text-gray-700">Téléphone <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input value="<?= $_SESSION['telephone'] ?>" disabled type="text" name="telephone" id="phone-number" required class="border border-gray-300 outline-none py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-3 sm:text-sm rounded-md" placeholder="+221 77-987-65-43">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class=" col-span-6 sm:col-span-3">
                                <label for="country" class="ml-1 block text-sm font-medium text-gray-700">Ville <span class="text-red-500">*</span></label>
                                <select disabled id="country" name="ville" autocomplete="country-name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option selected disabled><?= $_SESSION['ville'] ?></option>
                                    <option value="Dakar" name="Dakar">Dakar</option>
                                    <option value="Thiès" name="Thies">Thiès</option>
                                    <option value="Kaolack" name="Kaolack">Kaolack</option>
                                    <option value="Mbour" name="Mbour">Mbour</option>
                                    <option value="Saint-Louis" name="Saint-Louis">Saint-Louis</option>
                                    <option value="Casamance" name="Casamance">Casamance</option>
                                    <option value="Autres Region" name="Autres Region">Autres Région</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button name="" type="reset" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                        <a href="index.php">Fermer</a>
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                        Edit
                    </button>
                </div>
            </div>
        </form>
    <?php
    } else {
        require("header.php");
    ?>
        <form class="px-10 py-5 my-10 mx-auto rounded-xl shadow-md w-9/12  space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Personnal Information
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Addresse E-mail
                        </p>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="photo" class="block text-sm font-medium text-gray-700">
                                ID N°
                            </label>
                            <div class="mt-2 flex items-center">
                                <span class="h-12 w-12 rounded-full overflow-hidden bg-white">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <a href="profil.php" style="width: 48px !important; height: 48px !important;display: block;" class="text-center border border-gray-500 py-3 px-auto text-gray-600 rounded-3xl font-bold hover:bg-slate-100 shadow-md">
                                            Photo
                                        </a>
                                    </div>
                                </span>
                                <label class="ml-3 block">
                                    <span class="sr-only">Choisir une image</span>
                                    <input disabled name="image_" type="file" required class="mt-2 block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100
                        " />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <div class=" grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Prenom <span class="text-red-500">*</span></label>
                                <input value="" disabled type="text" name="prenom" id="first-name" required autocomplete="given-name" placeholder="Prenom" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="ml-1 block text-sm font-medium text-gray-700">Nom <span class="text-red-500">*</span></label>
                                <input value="" disabled type="text" name="nom" id="last-name" required autocomplete="family-name" placeholder="Nom" class="outline-none py-2 px-3 placeholder-gray-400 border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="ml-1 block text-sm font-medium text-gray-700">Adresse e-mail <span class="text-red-500">*</span></label>
                            <div class=" mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input value="" disabled type="email" name="e_mail" id="email" required class="w-full border border-gray-300 outline-none py-2 px-6 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block pl-10 sm:text-sm rounded-md" placeholder="prenom@exemple.com">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class=" col-span-6 sm:col-span-3">
                                <label for="phone-number" class="ml-1 block text-sm font-medium text-gray-700">Téléphone <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input value="" disabled type="text" name="telephone" id="phone-number" required class="border border-gray-300 outline-none py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-3 sm:text-sm rounded-md" placeholder="+221 77-777-77-77">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class=" col-span-6 sm:col-span-3">
                                <label for="country" class="ml-1 block text-sm font-medium text-gray-700">Ville <span class="text-red-500">*</span></label>
                                <select disabled id="country" name="ville" autocomplete="country-name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option selected disabled>Aucun</option>
                                    <option value="Dakar" name="Dakar">Dakar</option>
                                    <option value="Thiès" name="Thies">Thiès</option>
                                    <option value="Kaolack" name="Kaolack">Kaolack</option>
                                    <option value="Mbour" name="Mbour">Mbour</option>
                                    <option value="Saint-Louis" name="Saint-Louis">Saint-Louis</option>
                                    <option value="Casamance" name="Casamance">Casamance</option>
                                    <option value="Autres Region" name="Autres Region">Autres Région</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button name="" type="" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                        <a href="index.php">Fermer</a>
                    </button>
                    <button type="button" class="ml-3 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                        Edit
                    </button>
                </div>
            </div>
        </form><?php
            } ?>

</body>

</html>