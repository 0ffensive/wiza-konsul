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
	<link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container">
		<h1>Zarządzanie sprawami</h1>
		<div>
			<form class="inline-form" action="<?php echo site_url('linki/do_strona_glowna_placowka'); ?>">
				<input type="submit" value="Cofnij">
			</form>
			<form method="post" class="inline-form" action="<?php echo site_url('linki/do_dodawanie_sprawy_wybor'); ?>">
				<input type="submit" value="Dodaj sprawę">
			</form>
		</div>
		
        <div id="wyszukanie-spraw-zarzadzanie-sprawami">
			<h2>Wyszukaj sprawę</h2>
            <form method="post" action="<?php echo site_url('zarzadzanie_sprawami/wyszukaj_sprawy'); ?>">
                <label for="#id-lokalne">ID lokalne sprawy</label>
                <input type="text" id="id-lokalne" name="id_lokalne">
                <label for="#id-globalne">ID globalne sprawy</label>
                <input type="text" id="id-globalne" name="id_globalne">
                <label for="#id-wnioskodawcy">ID wnioskodawcy</label>
                <input type="text" id="id-wnioskodawcy" name="wnioskodawca">
                <label for="#nazwisko">Nazwisko</label>
                <input type="text" id="nazwisko" name="nazwisko">
                <label for="#imie">Imię</label>
                <input type="text" id="imie" name="imie">
                <label for="#data-urodzenia">Data urodzenia</label>
                <input type="date" id="data-urodzenia" name="data_urodzenia">
                <label for="#data-zalozenia">Data założenia sprawy</label>
				<input type="date" id="data-zalozenia" name="data_zalozenia">
				
                <label for="#cel">Cel sprawy</label>
                <select id="cel" name="cel">
                    <option value="">Wybierz</option>
                    <option value="Utworzenie">Utworzenie</option>
                    <option value="Duplikat">Duplikat</option>
                    <option value="Modyfikacja">Modyfikacja</option>
                    <option value="Przedłużenie">Przedłużenie</option>
				</select>
				
                <label for="#czy-rozstrzygnieta">Rozstrzygnięta</label>
                <div id="czy-rozstrzygnieta">
                    <input type="radio" id="czy-rozstrzygnięta-tak" name="czy_rozstrzygnieta" value=1>
                    <label for="czy-rozstrzygnięta-tak">Tak</label>
                    <br>
                    <input type="radio" id="czy-rozstrzygnięta-nie" name="czy_rozstrzygnieta" value=0>
                    <label for="czy-rozstrzygnięta-nie">Nie</label>    
                </div>    
            
            	<input type="submit" id="submit" value="Wyszukaj">
            	<br>
				<input type="reset" id="reset" value="Wyczyść pola"> 
			</form> 
		</div>

		<h2>Lista spraw</h2>
        <table id="wyszukane-sprawy-zarzadzanie-sprawami">
            <thead>
                <td>L.p.
				<td>ID globalne
				<td>ID lokalne
				<td>ID wnioskodawcy
				<td>Nazwisko
				<td>Imię
				<td>Data urodzenia
				<td>Data załozenia sprawy
				<td>Cel
				<td>Stan
				<?php echo !$czy_kierownik ? '<td>' : ""; ?>
				<td><td><td><td>
			</thead>
				<?php
					$lp = 1;
					foreach($dane as $key => $value){
						echo '<tr>
							<td>'.$lp.'
							<td>'.($value->id_globalne == NULL ? "-" : $value->id_globalne).' 
							<td>'.$value->id_lokalne.'
							<td>'.$value->wnioskodawca.' 
							<td>'.$value->nazwisko.' 
							<td>'.$value->imie.' 
							<td>'.$value->data_urodzenia.' 
							<td>'.$value->data_zalozenia.' 
							<td>'.$value->cel.' 
							<td>'.$value->decyzje.'
							<td>'.(!$czy_kierownik ? '
								<form class="wybierz-form" method="post" action='.site_url("linki/do_zarzadzanie_decyzjami").'>
									<input type="hidden" value='.$value->id_lokalne.' name="id_lokalne">
									<input type="submit" value="Decyzje">
								</form> <td>' : "") . '
								<form method="post" action="'.site_url('linki/do_zarzadzanie_dokumentami').'">
									<input type="submit" value="Dokumenty">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/do_przegladanie_sprawy').'">
									<input type="hidden" value='.$value->id_lokalne.' name="id_lokalne">
									<input type="submit" value="Podgląd">
								</form>
							<td>
								<form method="post" action="'.site_url('linki/do_edycja_sprawy').'">
									<input type="hidden" value='.$value->id_lokalne.' name="id_lokalne">
									<input type="submit" value="Edytuj" '. ($value->czy_rozstrzygnieta == 1 ? "disabled" : "").'>
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
		<div>
			<i class="fas fa-angle-left"></i>
			<i class="fas fa-angle-right"></i>
		</div>
    </div>
</body>

</html>
