<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>

	<title>Register2</title>

</head>

<body>
	<div class="min-h-full flex flex-col justify-center py-6 sm:px-6 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-md">
			<a href="index.php"> <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
			</a>
			<h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
				Créer votre compte
			</h2>
		</div>
		<div class="mt-4 sm:mx-auto sm:w-full sm:max-w-xl">
			<div class=" bg-white py-6 px-4 shadow-xl sm:rounded-lg sm:px-10">
				<form class="space-y-6" action="" method="POST">


					<div class="">
						<div class="flex ...">
							<div class="mr-3 w-5/6 ...">
								<div class="order-first">
									<div class="col-span-6 sm:col-span-3">
										<label for="first-name" class="ml-1 block text-sm font-medium text-gray-700">Prenom <span class="text-red-500">*</span></label>
										<input type="text" name="prenom" id="first-name" required autocomplete="given-name" placeholder="Prenom" class="outline-none py-2 px-3 shadow-md placeholder-gray-400 border border-gray-300 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md">
									</div>
								</div>
							</div>
							<div class="w-3/6 ...">
								<div>
									<div class="col-span-6 sm:col-span-3">
										<label for="last-name" class="ml-1 block text-sm font-medium text-gray-700">Nom <span class="text-red-500">*</span></label>
										<input type="text" name="nom" id="last-name" required autocomplete="family-name" placeholder="Nom" class="outline-none py-2 px-3 placeholder-gray-400 border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3">
						<div>
							<label for="email" class="ml-1 block text-sm font-medium text-gray-700">Adresse e-mail <span class="text-red-500">*</span></label>
							<div class="mt-1 relative rounded-md shadow-sm">
								<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
									<!-- Heroicon name: solid/mail -->
									<svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
										<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
									</svg>
								</div>
								<input type="email" name="e_mail" id="email" required class="border border-gray-300 outline-none py-2 px-6 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-10 sm:text-sm rounded-md" placeholder="prenom@exemple.com">
							</div>
						</div>
					</div>
					<div class="mt-3">
						<label for="password" class="ml-1 block text-sm font-medium text-gray-700">
							Mot de passe <span class="text-red-500">*</span>
						</label>
						<div class="mt-1">
							<input id="password" name="mot_de_passe" type="password" autocomplete="current-password" required placeholder="0~8 caractères" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-md placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						</div>
					</div>
					<div class="mt-3">
						<label for="phone-number" class="ml-1 block text-sm font-medium text-gray-700">Téléphone <span class="text-red-500">*</span></label>
						<div class="mt-1 relative rounded-md shadow-sm">
							<input type="text" name="telephone" id="phone-number" required class="border border-gray-300 outline-none py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 shadow-md block w-full pl-3 sm:text-sm rounded-md" placeholder="+221 77-777-77-77">
						</div>
					</div>
					<div class="mt-3 col-span-6 sm:col-span-3">
						<label for="country" class="ml-1 block text-sm font-medium text-gray-700">Ville <span class="text-red-500">*</span></label>
						<select id="country" name="ville" autocomplete="country-name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
							<option selected disabled value="">Aucun</option>
							<option value="Dakar" name="Dakar">Dakar</option>
							<option value="Thiès" name="Thies">Thiès</option>
							<option value="Kaolack" name="Kaolack">Kaolack</option>
							<option value="Mbour" name="Mbour">Mbour</option>
							<option value="Saint-Louis" name="Saint-Louis">Saint-Louis</option>
							<option value="Casamance" name="Casamance">Casamance</option>
							<option value="Autres Region" name="Autres Region">Autres Région</option>
						</select>
					</div>

					<fieldset class="space-y-1 mt-2">
						<legend class="sr-only">Notifications</legend>
						<div class="relative flex items-start">
							<div class="flex items-center h-5">
								<input aria-describedby="comments-description" name="check_ok" type="checkbox" required class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 shadow-md rounded">
							</div>
							<div class="ml-3 text-sm">
								<span class="text-gray-500"><span class="sr-only">New comments </span>Accepter les conditions d'utilisation <span class="text-red-500">*</span></span>
							</div>
						</div>
					</fieldset>

					<div>
						<button name="submit" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring- focus:ring-offset-2 focus:ring-indigo-500">
							Inscription
						</button>
					</div>
				</form>
				<div class="mt-3 relative flex justify-center text-sm">
					<span class="px-2 bg-white text-gray-500">
						<p class="box-register">Vous avez un compte ? <a class="underline decoration-1" href="login.php">Se connecter</a><br /></p>
					</span>
				</div>
			</div>
		</div>
	</div>


</body>

</html>