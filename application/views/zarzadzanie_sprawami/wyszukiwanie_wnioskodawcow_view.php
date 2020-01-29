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
        <h1>Wyszukiwanie profilu wnioskodawcy</h1>
		<form id="cofnij-form" method="post" action="<?php echo site_url('linki/do_dodawanie_sprawy_wybor'); ?>">
			<input type="submit" value="Cofnij">
		</form>
		<div class="wyszukaj-wnioskodawce">
            <form method="post" action="<?php echo site_url('zarzadzanie_sprawami/wyszukaj_wnioskodawcow'); ?>">
				<label for="#id-w">ID wnioskodawcy</label>
				<input type="number" id="id-w" name='id' value="<?php echo set_value('id')?>" max="9999999999">
				
				<label for="#nazwisko-w">Nazwisko</label>
				<input type="text" id="nazwisko-w" name="nazwisko" value="<?php echo set_value('nazwisko')?>" maxlength="30">
				
                <label for="#imie-w">Imię</label>
				<input type="text" id="imie-w" name="imie" value="<?php echo set_value('imie')?>" maxlength="30">
				
                <label for="#data-urodzenia-w">Data urodzenia</label>
                <input type="date" id="data-urodzenia-w" name="data_urodzenia" value="<?php echo set_value('data_urodzenia')?>" max="<?php echo date('Y-m-d'); ?>">

            	<input type="submit" name="submit" value="Wyszukaj">
				<input type="submit" name="submit" value="Pokaż wszystko">

            </form>
                         
            <table id="wyszukane-profile">
				<?php 
					if($wnioskodawcy == NULL) {
						echo '<div class="komunikat-brak">Brak wnioskodawców do wyświetlenia</div>';
					} else {
						echo '
						<thead> 
							<td>ID
							<td>Nazwisko
							<td>Imię
							<td>Data urodzenia
							<td>
						<tbody>';
						foreach($wnioskodawcy as $klucz => $wartosc){
							echo '<tr>
								<td>'.$wartosc->id_wnioskodawcy.'
								<td>'.$wartosc->nazwisko.'
								<td>'.$wartosc->imie.'
								<td>'.$wartosc->data_urodzenia.'
								<td>
								<form class="wybierz-form" method="post" action='.site_url("zarzadzanie_sprawami/wybierz_wnioskodawce").'>
									<input type="hidden" value='.$wartosc->id_wnioskodawcy.' name="id">
									<input type="submit" value="Wybierz">
								</form>';
						}
						
						echo '</table><div><p id="paginacja">'.$paginacja.'</p></div>';
					}
				?>
        </div>
    </div>
</body>
</html>
