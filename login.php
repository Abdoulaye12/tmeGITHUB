<?php session_start(); ?>

<?php
include("connection.php");

if (isset($_POST['submit'])) {
	$e_mail = mysqli_real_escape_string($mysqli, $_POST['e_mail']);
	$mot_de_passe = mysqli_real_escape_string($mysqli, $_POST['mot_de_passe']);

	if ($e_mail == "" || $mot_de_passe == "") {
		echo "Entrer un nom d'utilisateur et un mot de passe";
		echo "<br/>";
		echo "<a href='login.php'>Retour</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE e_mail='$e_mail' AND mot_de_passe='" . md5($mot_de_passe) . "'")
			or die("Could not execute the select query.");

		$row = mysqli_fetch_assoc($result);

		if (is_array($row) && !empty($row)) {
			$validuser = $row['e_mail'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['telephone'] = $row['telephone'];
			$_SESSION['categorie'] = $row['categorie'];
			$_SESSION['e_mail'] = $row['e_mail'];
			$_SESSION['ville'] = $row['ville'];
			$_SESSION['nom'] = $row['nom'];
			$_SESSION['id'] = $row['id'];
		} else {

			echo '<!DOCTYPE html>
						<html lang="en">
						<head>
							<meta charset="UTF-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<script src="https://cdn.tailwindcss.com"></script>
							<title>login</title>
						</head>
						<body>
						<div class="rounded-md mt-8 sm:mx-auto sm:w-full sm:max-w-md bg-yellow-50 p-4">
						<div class="flex">
							<div class="flex-shrink-0">
								<!-- Heroicon name: solid/exclamation -->
								<svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
								</svg>
							</div>
							<div class="ml-3">
								<h3 class="text-sm font-medium text-yellow-800">
									Attention needed
								</h3>
								<div class="mt-2 text-sm text-yellow-700">
									<p>
									L\'addresse e-mail ou le mot de passe est incorrect.</p>
								</div>
							</div>
						</div>
						</div>
						</body>
						</html>
						';
			include("login2.php");
		}

		if (isset($_SESSION['valid'])) {
			header('Location: index.php');
		}
	}
} else {
	include("login2.php");
}

?>