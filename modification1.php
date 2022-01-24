<?php
session_start();
require('headerlog.php');
$bdd = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');
$mode_edition = 0;
$message = null;
if (isset($_GET['edit']) and !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if ($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if (isset($_POST['submit'])) {
   if (isset($_POST['submit'])) {
      $nom_article = htmlspecialchars($_POST['nom_article']);
      $description_ = htmlspecialchars($_POST['description_']);
      $prix = htmlspecialchars($_POST['prix']);
      $categorie = htmlspecialchars($_POST['categorie']);
      $statut = htmlspecialchars($_POST['statut']);
      $filename = $_FILES['image_']['name'];
      $auteur_article = $_SESSION['prenom'];

      if ($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO articles (nom_article, description_, prix, categorie, statut, image_, auteur_article, date_time_publication) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
         $ins->execute(array($nom_article, $description_, $prix, $categorie, $statut, $filename, $auteur_article));
         echo '
         <!DOCTYPE html>
        <html lang="en">
    
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Modification1</title>
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
                                Votre article a bien été modifié
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                    Souvent, un service en vaut un autre : proposez à votre tour de vous rendre disponible ou de prêter un objet, un appareil…                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols sm:gap-3 sm:grid-flow-row-dense">
                            <a href="index.php"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                    fermer
                                </button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
         ';
      } else {
         $update = $bdd->prepare('UPDATE articles SET nom_article = ?, description_ = ?, prix = ?, categorie = ?, statut = ?, image_ = ?, auteur_article = ?, date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($nom_article, $description_, $prix, $categorie, $statut, $filename, $auteur_article, $edit_id));
         // $message = 'Votre article a bien été mis à jour ! Redirection Accueil dans 5 secondes';
         echo '
         <!DOCTYPE html>
        <html lang="en">
    
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Register</title>
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
                                Votre article a bien été modifié
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                    Souvent, un service en vaut un autre : proposez à votre tour de vous rendre disponible ou de prêter un objet, un appareil…                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols sm:gap-3 sm:grid-flow-row-dense">
                            <a href="index.php"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                    fermer
                                </button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
         ';
         // header("refresh:5; url=index.php?id=" . $edit_id);
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
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

   <title>Rédaction / Edition</title>

</head>

<body>
   <div class="">
      <div class="min-h-full flex flex-col justify-center py-6 sm:px-6 lg:px-8">
         <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
               Edition de l'article
            </h2>
         </div>
         <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-3xl">
            <div class=" bg-white py-6 px-4 shadow-xl sm:rounded-lg sm:px-10">
               <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                  <div class="">
                     <div class="order-first">
                        <div class="col-span-6 sm:col-span-3">
                           <label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Nom article <span class="text-red-500">*</span></label>
                           <input type="text" name="nom_article" id="first-name" required value="<?php if ($mode_edition == 1) echo ($edit_article['nom_article']);
                                                                                                   else ''; ?>" autocomplete="" placeholder="Nom article" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
                        </div>
                     </div>

                  </div>

                  <!-- je dois placer ici tailwind about apres -->
                  <div class="mt-3">
                     <div class="col-span-6 sm:col-span-3">
                        <label for="description" class="ml-1 block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                        <textarea rows="3" cols="91" name="description_" placeholder="Plus d'information" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"><?php if ($mode_edition == 1) echo ($edit_article['description_']);
                                                                                                                                                                                                                                                                                       else ''; ?></textarea>
                     </div>
                  </div>

                  <div class="mt-3">
                     <div>
                        <label for="price" class="ml-1 block text-sm font-medium text-gray-700">Prix <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                           <div class="text-gray-500 sm:text-sm absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              $
                           </div>
                           <input type="number" name="prix" id="price" required value="<?php if ($mode_edition == 1) echo ($edit_article['prix']);
                                                                                       else ''; ?>" class="border border-gray-300 outline-none py-2 px-6 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-10 sm:text-sm rounded-md" placeholder="0.00">
                        </div>
                     </div>
                  </div>
                  <div class="mt-1">
                     <label for="categorie" class="ml-1 block text-sm font-medium text-gray-700">Catégorie <span class="text-red-500">*</span></label>
                     <select id="categorie" name="categorie" autocomplete="categorie" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option selected value="<?php if ($mode_edition == 1) echo ($edit_article['categorie']);else ''; ?>"><?php if ($mode_edition == 1) echo ($edit_article['categorie']); else ''; ?></option>
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
                        <option selected value="<?php if ($mode_edition == 1) echo ($edit_article['statut']);else ''; ?>"><?php if ($mode_edition == 1) echo ($edit_article['statut']);else ''; ?></option>
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
                                 <button value="Envoyer l'article" name="submit" type="submit" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:text-indigo-700 hover:bg-indigo-50 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Valider
                                 </button>
                              </div>
                              <a href="index.php"><button name="" type="reset" class="w-lg flex justify-center py-2 px-4 border  rounded-md shadow-sm text-sm font-medium text-white bg-indigo-700 hover:text-white hover:bg-indigo-800 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
                                    Annuler
                                 </button>
                              </a>
                           </div>
                        </div>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php if (isset($message)) {
      echo $message;
   } ?>
</body>

</html>