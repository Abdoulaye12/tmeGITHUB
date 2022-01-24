<?php
include("connection.php");

// Vérifier si le formulaire est soumis 
if (isset($_POST['submit'])) {
	$mysqli = new PDO('mysql:host=localhost;dbname=tme;charset=utf8', 'root', '');

	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$e_mail = $_POST['e_mail'];
	$mot_de_passe = md5($_POST['mot_de_passe']);
	$telephone = $_POST['telephone'];
	$ville = $_POST['ville'];
	$check_ok = $_POST['check_ok'];

	// afficher le résultat
	$requete = $mysqli->prepare("INSERT INTO user (prenom, nom, e_mail, mot_de_passe, telephone, ville, check_ok) 
	VALUES (:prenom, :nom, :e_mail, :mot_de_passe, :telephone, :ville, :check_ok)");

	$requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
	$requete->bindValue(':e_mail', $e_mail, PDO::PARAM_STR);
	$requete->bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
	$requete->bindValue(':telephone', $telephone, PDO::PARAM_STR);
	$requete->bindValue(':ville', $ville, PDO::PARAM_STR);
	$requete->bindValue(':check_ok', $check_ok, PDO::PARAM_STR);
	$requete->execute();

?>
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
								Votre compte a été bien créer
							</h3>
							<div class="mt-2">
								<p class="text-sm text-gray-500">
									Les présentes conditions d'utilisation traduisent le fonctionnement de Google, les lois qui s'appliquent à notre entreprise et certains principes que nous avons toujours tenus pour vrais. Par conséquent, ces conditions d'utilisation contribuent à définir votre relation avec Google lorsque vous interagissez avec nos services. </p>
							</div>
						</div>
					</div>
					<div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
						<a href="register.php"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
								Cancel
							</button></a>
						<a href="login.php"><button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
								Se Connecter
							</button></a>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
<?php
	require("register2.php");
} else {
	require("register2.php");
}
?>