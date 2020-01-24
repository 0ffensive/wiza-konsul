<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Wyszukiwanie wnioskodawcy</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/wyszukiwanie_wnioskodawcy.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Wyszukaj profil wnioskodawcy</h1>
		<form id="cofnij-form" method="post" action="<?php echo site_url('linki/do_dodawanie_sprawy_wybor'); ?>">
			<input type="submit" value="Cofnij">
		</form>
		<div class="wyszukaj-wnioskodawce">
            <form method="post" action="<?php echo site_url('zarzadzanie_sprawami/wyszukaj_wnioskodawcow'); ?>">
                <label for="#id-w">ID wnioskodawcy</label>
                <input type="text" id="id-w" name='id'>
				<label for="#nazwisko-w">Nazwisko</label>
                <input type="text" id="nazwisko-w" name="nazwisko">
                <label for="#imie-w">Imię</label>
                <input type="text" id="imie-w" name="imie">
                <label for="#data-urodzenia-w">Data urodzenia</label>
                <input type="date" id="data-urodzenia-w" name="data_urodzenia">

            	<input type="submit" id="submit" value="Wyszukaj">
				<input type="reset" id="reset" value="Wyczyść">
            </form>
                         
            <table id="wyszukane-profile">
                <thead> 
                    <td>ID<td>Nazwisko<td>Imię<td>Data urodzenia<td>
                <tbody>
					<?php
						foreach($wnioskodawcy as $klucz => $wartosc){
							echo '<tr>
									<td>'.$wartosc->id.'
									<td>'.$wartosc->nazwisko.'
									<td>'.$wartosc->imie.'
									<td>'.$wartosc->data_urodzenia.'
									<td>
										<form class="wybierz-form" method="post" action='.site_url("zarzadzanie_sprawami/wybierz_wnioskodawce").'>
											<input type="hidden" value='.$wartosc->id.' name="id">
											<input type="submit" value="Wybierz">
										</form>';
						}
					?>
			</table>
			<div>
				<i class="fas fa-angle-left"></i>
				<i class="fas fa-angle-right"></i>
			</div>
        </div>
    </div>
</body>
</html>
