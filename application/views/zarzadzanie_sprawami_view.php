<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Zarządzanie sprawami</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_zarzadzanie_sprawami.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Zarządzanie sprawami</h1>
		<form method="post" action="<?php echo site_url('linki/do_strona_glowna'); ?>">
			<input type="submit" value="Cofnij">
		</form>
		<form method="post" action="<?php echo site_url('linki/do_dodawanie_sprawy'); ?>">
			<input type="submit" value="Dodaj sprawę">
		</form>

        <h2>Wyszukaj sprawę</h2>
        <div id="wyszukanie-spraw-zarzadzanie-sprawami">
            <form>
                <label for="#id-lokalne-zarzadzanie-sprawami">ID lokalne sprawy</label>
                <input type="text" id="id-lokalne-zarzadzanie-sprawami">
                <label for="#id-globalne-zarzadzanie-sprawami">ID globalne sprawy</label>
                <input type="text" id="id-globalne-zarzadzanie-sprawami">
                <label for="#id-wnioskodawcy-zarzadzanie-sprawami">ID wnioskodawcy</label>
                <input type="text" id="id-wnioskodawcy-zarzadzanie-sprawami">
                <label for="#nazwisko-zarzadzanie-sprawami">Nazwisko</label>
                <input type="text" id="nazwisko-zarzadzanie-sprawami">
                <label for="#imie-zarzadzanie-sprawami">Imię</label>
                <input type="text" id="imie-zarzadzanie-sprawami">
                <label for="#data-urodzenia-zarzadzanie-sprawami">Data urodzenia</label>
                <input type="date" id="data-urodzenia-zarzadzanie-sprawami">
                <label for="#numer-kp-zarzadzanie-sprawami">Numer KP</label>
                <input type="text" id="numer-kp-zarzadzanie-sprawami">
                <label for="#data-zalozenia-zarzadzanie-sprawami">Data założenia sprawy</label>
                <input type="date" id="data-zalozenia-zarzadzanie-sprawami">
                <label for="#cel-sprawy-zarzadzanie-sprawami">Cel sprawy</label>
                <select id="cel-sprawy-zarzadzanie-sprawami">
                    <option value="-1">Wybierz cel</option>
                    <option value="0">Utworzenie</option>
                    <option value="1">Duplikat</option>
                    <option value="2">Modyfikacja</option>
                    <option value="3">Przedłużenie</option>
                </select>
                <label for="#rozstrzygnieta-zarzadzanie-sprawami">Rozstrzygnięta</label>

                <div id="rozstrzygnieta-zarzadzanie-sprawami">
                    <input type="radio" id="kobieta-nowa-sprawa" name="plec-w-nowa-sprawa" value="1">
                    <label for="tak-rozstrzygnieta-zarzadzanie-sprawami">Tak</label>
                    <br>
                    <input type="radio" id="mezczyzna-nowa-sprawa" name="plec-w-nowa-sprawa" value="0">
                    <label for="nie-rozstrzygnieta-zarzadzanie-sprawami">Nie</label>    
                </div>    
            </form>
            <button id="wyszukaj-zarzadzanie-sprawami">Wyszukaj</button>
            <br>
            <button id="wyczysc-zarzadzanie-sprawami">Wyczyść pola</button>  
        </div>

		<h2>Lista spraw</h2>
        <table id="wyszukane-sprawy-zarzadzanie-sprawami">
            <thead>
                <td>L.p.<td>ID globalne<td>ID lokalne<td>ID placówki<td>ID wnioskodawcy<td>Nazwisko<td>Imię<td>Data urodzenia<td>Data załozenia sprawy<td>Cel<td>Rozstrzygnięta<td>Dokumenty<td>Decyzje<td><td><td>
			</thead>
				<?php
					$lp = 1;
					foreach($dane as $key => $value){
						echo '
							<tr><td>'.$lp.'<td>'.($value->id_globalne == NULL ? "-" : $value->id_globalne).' <td>'.$value->id_lokalne.' <td>'.$value->placowka.' 
							<td>'.$value->wnioskodawca.' <td>'.$value->nazwisko.' <td>'.$value->imie.' <td>'.$value->data_urodzenia.' 
							<td>'.date("Y-m-d", strtotime($value->data_zalozenia)).' <td>'.$value->cel.' <td>'.($value->czy_rozstrzygnieta == 1 ? "Tak" : "Nie").'
							<td>
								<form method="post" action="'.site_url('linki/do_zarzadzanie_dokumentami').'">
									<input type="submit" value="Dokumenty">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/do_zarzadzanie_decyzjami').'">
									<input type="submit" value="Decyzje">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/do_przegladanie_sprawy').'">
									<input type="submit" value="Wyświetl">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/do_edycja_sprawy').'">
									<input type="submit" value="Edytuj">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/usun_sprawe').'">
									<input type="submit" value="Usuń">
								</form>
						';
						$lp += 1;
					}
				?>
		</table>
    </div>
</body>

</html>
