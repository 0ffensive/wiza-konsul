<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Placówka - strona główna</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <h1>Konsulat</h1>
            <h2>Oddział ds. Karty Polaka</h2>

            <button onclick="window.location.href='./source/zarzadzanie_sprawami.html'">Zarządzanie sprawami</button>
            <button onclick="window.location.href='./source/generowanie_raportu.html'">Generowanie raportu</button>
        </div>

	<?php
		
		foreach($userArray as $key => $value){
			echo "<pre>";
			print_r($value);
			echo "</pre>";
		}
		
	?>

    </body>
</html>



