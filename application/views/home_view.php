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
            <h1>Konsulat</h1>
            <h2>Oddział ds. Karty Polaka</h2>

            <button onclick="window.location.href='./source/zarzadzanie_sprawami.html'">Zarządzanie sprawami</button>
            <button onclick="window.location.href='./source/generowanie_raportu.html'">Generowanie raportu</button>
    
			<div>
				<h2>Dane osobowe</h2>
				<div>
					<form  method="post" action="<?php echo site_url('welcome/data_form'); ?>">
						<h3>Dodaj dane osobowe</h3>

						<label for="#nazwisko">Nazwisko</label>
						<input id="nazwisko" type="text" name="nazwisko"><br>
						<?php echo form_error('nazwisko') ?>

						<label for="#imie">Imie</label>
						<input id="imie" type="text" name="imie"><br>
						<?php echo form_error('imie') ?>

						<label for="#nr-dokumentu">Nr dokumentu</label>
						<input id="nr-dokumentu" type="text" name="nr_dokumentu"><br>
						<?php echo form_error('nr_dokumentu') ?>

						<input type="submit" value="Dodaj">
					</form>
				</div>
				<br>
				<div>
					<table>
						<thead>
							<td>Id <td>Nazwisko <td>Imię <td>Nr dokumentu
						<tbody>
							<?php
							foreach($dataArray as $key => $value){
								echo "<tr><td>$value->id <td>$value->nazwisko <td>$value->imie <td>$value->nr_dokumentu";
							}
							?>
					</table>
				</div>
			</div>
		</div>
    </body>
</html>



