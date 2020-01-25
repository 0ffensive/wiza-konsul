<!DOCTYPE html>
<html lang="pl">

	<head>
		<meta charset="utf-8">
		<title>Dodawanie sprawy</title>
		<meta name="decription" content="...">
		<meta name="keywords" content="...">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dodawanie_sprawy_wybor.css">
		<link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

	</head>

	<body>
		<div class="container">
			<h1>Dodawanie sprawy</h1>
			<div>
				<form id="cofnij-form" method="post" action="<?php echo site_url('linki/do_zarzadzanie_sprawami'); ?>">
					<input type="submit" value="Cofnij">
				</form>
			</div>
			<div id="decyzja">
				<form method="post" action="<?php echo site_url('linki/do_dodawanie_sprawy'); ?>">
					<input id="dodaj" name ="dodaj" type="submit" value="Nowy profil wnioskodawcy">
				</form>
				<form method="post" action="<?php echo site_url('linki/do_wyszukiwanie_wnioskodawcy'); ?>">	
					<input id="wyszukaj" name ="wyszukaj" type="submit" value="Wyszukaj wnioskodawcę">
				</form>
			</div>
		</div>
	</body>
</html>
