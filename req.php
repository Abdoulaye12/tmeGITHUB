<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<title>req</title>
	</head>

	<body>
		<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
			<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
				<div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
					<div>
						<div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
							<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
							</svg>
						</div>
						<div class="mt-3 text-center sm:mt-5">
							<h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
								Connectez-vous pour pouvoir effectuer cette action
							</h3>
							<div class="mt-2">
								<p class="text-sm text-gray-500">
									les lois qui s'appliquent à notre entreprise et certains principes que nous avons toujours tenus pour vrais. Par conséquent, ces conditions d'utilisation contribuent à définir votre relation avec Google lorsque vous interagissez avec nos services. </p>
							</div>
						</div>
					</div>
					<div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
						<a href="javascript:history.back()"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
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