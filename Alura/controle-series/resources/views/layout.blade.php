<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Series</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="{{ route('rota_series') }}">Home</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto">
					@auth
					<li class="nav-item">
			        	<a class="nav-link active" aria-current="page" href="/sair">Sair</a>
			        </li>
			        @endauth

			        @guest
			        <li class="nav-item">
			        	<a class="nav-link active" aria-current="page" href="/sair">Entrar</a>
			        </li>
			        @endguest
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mt-3">
		<div class="p-5 mb-4 bg-light rounded-3">
			<div class="container-fluid py-5">
			<h1 class="display-5 fw-bold">@yield('cabecalho')</h1>
			</div>
		</div>

		@yield('conteudo')
	</div>

	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>