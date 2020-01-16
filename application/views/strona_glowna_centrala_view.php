<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Placówka - strona główna</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
			<h1>Konsulat - Centrala</h1>
			<div>
				<h2>Oddział ds. Karty Polaka</h2>
				<form method="post" action="<?php echo site_url('linki/do_generowanie_raportu'); ?>">
					<input type="submit" value="Generowanie raportu">
				</form>
			</div>
		</div>
    </body>
</html>



