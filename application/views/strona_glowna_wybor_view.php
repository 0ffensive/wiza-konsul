<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Placówka - wybór pracownika</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    </head>

    <body>
		<header>e-Konsulat</header>
        <div class="container">

			<h1>Konsulat - Placówka</h1>
			<div>
				<h2>Logowanie</h2>

				<form method="post" action="<?php echo site_url('linki/do_strona_glowna_placowka'); ?>">
					<input type="submit" name="pracownik" value="Pracownik">
					<input type="submit" name="pracownik" value="Kierownik">
				</form>
			</div>
		</div>
    </body>
</html>
