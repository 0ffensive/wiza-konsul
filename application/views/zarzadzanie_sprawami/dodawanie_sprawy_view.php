<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Dodawanie sprawy</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_dodawanie_sprawy.css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <h1>Dodaj nową sprawę</h1>
            <form id="dodanie-sprawy" method="post" action="<?php echo site_url('zarzadzanie_sprawami/dodawanie_sprawy'); ?>">
				<div id="cel-container">
					<div id="cel">
						<label for="#cel-sprawy">Cel sprawy</label>
						<select id="cel-sprawy" name="cel">
							<option value="">Wybierz</option>
							<option value="Utworzenie">Utworzenie</option>
							<option value="Duplikat">Duplikat</option>
							<option value="Modyfikacja">Modyfikacja</option>
							<option value="Przedłużenie">Przedłużenie</option>
						</select>
					</div>
				</div>
				<div class="kontener-dodanie-sprawy">
					<div>
						<h2>Dane wnioskodawcy</h2>
						<div>
							<label for="#nazwisko">Nazwisko</label>
							<input type="text" id="nazwisko" name="nazwisko">
								
							<label for="#imie">Imię</label>
							<input type="text" id="imie" name="imie">
								
							<label for="#plec">Płeć</label>
							<div id="plec">
								<input type="radio" id="kobieta" name="plec" value="Kobieta">
								<label for="kobieta">Kobieta</label>
								<input type="radio" id="mezczyzna" name="plec" value="Mężczyzna">
								<label for="mezczyzna">Mężczyzna</label>                        
							</div>
								
							<label for="#data-urodzenia">Data urodzenia</label>
							<input type="date" id="data-urodzenia" name="data_urodzenia">
								
							<label for="#obywatelstwo">Obywatelstwo</label>
							<select id="obywatelstwo" name="obywatelstwo">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>

							<label for="#narodowosc">Narodowość</label>
							<select id="narodowosc" name="narodowosc">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
								
							<label for="#typ-dokumentu">Typ dokumentu</label>
							<select id="typ-dokumentu" name="typ_dokumentu_identyfikacyjnego">
								<option value="">Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
								
							<label for="#nr-dokumentu">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu" name="nr_dokumentu_identyfikacyjnego">        
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_pierwszy">
							</div>
							<h2 class="relative">Dane pierwszego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-1">Nazwisko</label>
							<input type="text" id="nazwisko-1" name="nazwisko1">
							<label for="#imie-1">Imię</label>
							<input type="text" id="imie-1" name="imie1">

							<label for="#pokrewienstwo-1">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-1" name="pokrewienstwo1">
								<option value="">Wybierz</option>
								<option value="Matka">Matka</option>
								<option value="Ojciec">Ojciec</option>
								<option value="Babcia">Babcia</option>
								<option value="Dziadek">Dziadek</option>
								<option value="Prababcia">Prababcia</option>
								<option value="Pradziadek">Pradziadek</option>
							</select>

							<label for="#obywatelstwo-1">Obywatelstwo</label>
							<select id="obywatelstwo-1" name="obywatelstwo1">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>

							<label for="#narodowosc-1">Narodowość</label>
							<select id="narodowosc-1" name="narodowosc1">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<label for="#typ-dokumentu-1">Typ dokumentu</label>
							<select id="typ-dokumentu-1" name="typ_dokumentu_identyfikacyjnego1">
								<option value="">Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<label for="#nr-dokumentu-1">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-1" name="nr_dokumentu_identyfikacyjnego1">                   
						</div>
					</div>
					<div>
						<h2>Adres zamieszkania</h2>
						<div>
							<label for="#ulica">Ulica</label>
							<input type="text" id="ulica" name="ulica">
							<label for="#nr-domu">Nr domu</label>
							<input type="text" id="nr-domu" name="nr_domu">
							<label for="#nr-lokalu">Nr lokalu</label>
							<input type="text" id="nr-lokalu" name="nr_lokalu">

							<label for="#kod">Kod pocztowy</label>
							<input type="text" id="kod" name="kod_pocztowy">
							<label for="#miejscowosc">Miejscowość</label>
							<input type="text" id="miejscowosc" name="miejscowosc">

							<label for="#panstwo">Państwo</label>
							<select id="panstwo" name="panstwo">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_drugi">
							</div>	
							<h2 class="relative">Dane drugiego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-2">Nazwisko</label>
							<input type="text" id="nazwisko-2" name="nazwisko2">
							<label for="#imie-2">Imię</label>
							<input type="text" id="imie-2" name="imie2">
							<label for="#pokrewienstwo-2">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-2" name="pokrewienstwo2">
								<option value="">Wybierz</option>
								<option value="Matka">Matka</option>
								<option value="Ojciec">Ojciec</option>
								<option value="Babcia">Babcia</option>
								<option value="Dziadek">Dziadek</option>
								<option value="Prababcia">Prababcia</option>
								<option value="Pradziadek">Pradziadek</option>
							</select>
							<label for="#obywatelstwo-2">Obywatelstwo</label>
							<select id="obywatelstwo-2" name="obywatelstwo2">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<label for="#narodowosc-2">Narodowość</label>
							<select id="narodowosc-2" name="narodowosc2">
								<option value="">Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<label for="#typ-dokumentu-2">Typ dokumentu</label>
							<select id="typ-dokumentu-2" name="typ_dokumentu_identyfikacyjnego2">
								<option value="">Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value='.$wartosc->nazwa.'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<label for="#nr-dokumentu-2">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-2" name="nr_dokumentu_identyfikacyjnego2">     
						</div>
					</div>  
				</div>    
				<div>
					<div id="przyciski-zatwierdzajace">
						<input id="submit" name ="submit" type="submit" value="Dodaj">
						<input id="reset" name ="reset" type="submit" value="Anuluj">
					</div>
				</div>   
			</form>
        </div>
    </body>
</html>
