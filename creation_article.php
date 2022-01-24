<?php
session_start();
require('headerlog.php');
$bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
        $nom_article = htmlspecialchars($_POST['nom_article']);
        $description_ = htmlspecialchars($_POST['description_']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $statut = htmlspecialchars($_POST['statut']);
        $prix = htmlspecialchars($_POST['prix']);
        $image_ = $_FILES['image_'];

        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['image_']) and $_FILES['image_']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['image_']['size'] <= 3145728) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['image_']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['image_']['tmp_name'], 'images_news/' . basename($_FILES['image_']['name']));
                    // echo "L'envoi a bien été effectué !";
                } else {
                    echo 'extention non-autorisee';
                }
            } else {
                echo 'image trop grosse';
            }
        } elseif (isset($_FILES['image_']) and $_FILES['image_']['error'] == UPLOAD_ERR_NO_FILE) {
            echo 'fichier inexistant';
        } elseif (isset($_FILES['image_']) and $_FILES['image_']['error'] == UPLOAD_ERR_PARTIAL) {
            echo 'fichier uploadé que partiellement';
        } elseif (isset($_FILES['image_']) and $_FILES['image_']['error'] == UPLOAD_ERR_INI_SIZE) {
            echo 'fichier trop gros';
        } elseif (isset($_FILES['image_']) and $_FILES['image_']['error'] == UPLOAD_ERR_FORM_SIZE) {
            echo 'fichier trop gros';
        } elseif (!isset($_FILES['image_'])) {
            echo 'pas de variable';
        } else {
            echo 'probleme a l\'envoi';
        }

        $auteur_article = $_SESSION['prenom'];
        $filename = $_FILES['image_']['name'];
        $ins = $bdd->prepare('INSERT INTO articles (nom_article, description_, prix, categorie, statut, image_, auteur_article, date_time_publication) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $ins->execute(array($nom_article, $description_, $prix, $categorie, $statut, $filename, $auteur_article));

        echo '<!DOCTYPE html>
        <html lang="en">
    
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>creation article</title>
        </head>
    
        <body>
            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Votre compte a été bien créer
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                    Souvent, un service en vaut un autre : proposez à votre tour de vous rendre disponible ou de prêter un objet, un appareil…                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <a href="creation_article.php"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                    Cancel
                                </button></a>
                            <a href="index.php"><button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                    Voir publication
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </body>';
    } else {
        echo '	<div style="position: relative;top: 0px;left: 400px;" class="col-md-5 alert alert-warning d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>Veuillez remplir tous les champs !</div>
  </div>';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Rédaction</title>

</head>

<body>
    <div class="">
        <div class="min-h-full flex flex-col justify-center py-6 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
                    Création de l'article
                </h2>
            </div>
            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-3xl">
                <div class=" bg-white py-6 px-4 shadow-xl sm:rounded-lg sm:px-10">
                    <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                        <div class="">
                            <div class="order-first">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Nom article <span class="text-red-500">*</span></label>
                                    <input type="text" name="nom_article" id="first-name" required autocomplete="" placeholder="Nom article" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                                </div>
                            </div>

                        </div>

                        <!-- je dois placer ici tailwind about apres -->
                        <div class="mt-3">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="description" class="ml-1 block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                                <textarea rows="3" cols="91" name="description_" placeholder="Plus d'information 0~950 caractères" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"></textarea>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div>
                                <label for="price" class="ml-1 block text-sm font-medium text-gray-700">Prix <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="text-gray-500 sm:text-sm absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        $
                                    </div>
                                    <input type="number" name="prix" id="price" required class="border border-gray-300 outline-none py-2 px-6 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-10 sm:text-sm rounded-md" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <label for="categorie" class="ml-1 block text-sm font-medium text-gray-700">Catégorie <span class="text-red-500">*</span></label>
                            <select id="categorie" name="categorie" autocomplete="categorie" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value="">Aucun</option>
                                <option value="Electronique" name="Electronique">Electronique</option>
                                <option value="Mode & beaute" name="Mode & Beauté">Mode & Beauté</option>
                                <option value="Electroménager" name="Electroménager">Electroménager</option>
                                <option value="Pour la maison" name="Pour la maison">Pour la maison</option>
                                <option value="Sport & Loisir" name="Sport & Loisir">Sport & Loisir</option>
                                <option value="Matériel Pro" name="Matériel Pro">Matériel Pro</option>
                                <option value="Autres" name="Autres">Autres</option>
                            </select>
                        </div>
                        <div class="mt-1">
                            <label for="categorie" class="ml-1 block text-sm font-medium text-gray-700">Statut <span class="text-red-500">*</span></label>
                            <select id="categorie" name="statut" autocomplete="categorie" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value="">Aucun</option>
                                <option value="En stock" name="En stock">En stock</option>
                                <option value="Rupture de stock" name="Rupture de stock">Rupture de stock</option>
                                <option value="Non disponible" name="Non disponible">Non disponible</option>
                                <option value="Prêt pour l'expédition" name="Prêt pour l'expédition">Prêt pour l'expédition</option>
                                <option value="Commande sur demande" name="Commande sur demande">Commande sur demande</option>
                                <option value="Temporairement en rupture de stock" name="Temporairement en rupture de stock">Temporairement en rupture de stock</option>
                            </select>
                        </div>
                        <?php
                        if (isset($_SESSION['valid'])) {
                            include("connection.php");
                            $result = mysqli_query($mysqli, "SELECT * FROM user");
                        ?>
                            <div class="mt-3">
                                <div class="order-first">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Auteur article <span class="text-red-500">*</span></label>
                                        <input placeholder="<?php echo $_SESSION['prenom']; ?>" disabled type="text" name="auteur_article" id="first-name" required autocomplete="given-name" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                                    </div>
                                </div><?php
                                    } else { ?>
                                <div class="mt-3">
                                    <div class="order-first">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Auteur article <span class="text-red-500">*</span></label>
                                            <input placeholder="Non disponible" disabled type="text" name="auteur_article" id="first-name" required autocomplete="given-name" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>

                                </div>
                                <div class="mt-3">
                                    <label for="image" class="ml-1 block text-sm font-medium text-gray-700">Télécharger le fichier ( taille maximale : 3 Mo) <span class="text-red-500">*</span></label>
                                    <label class="block">
                                        <span class="sr-only">Choisir une image</span>
                                        <input name="image_" type="file" required class="mt-2 block w-full text-sm text-slate-500
                                                    file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-violet-50 file:text-violet-700
                                                    hover:file:bg-violet-100
                                                    " />
                                    </label>
                                </div>
                                <div>
                                    <div class="flex space-x-4 ...">
                                        <div>
                                            <button value="Envoyer l'article" name="submit" type="submit" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                                Valider
                                            </button>
                                        </div>
                                        <div>
                                            <button name="" type="reset" class=" w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                                Annuler
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>