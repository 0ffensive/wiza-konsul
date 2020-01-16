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
            <form id="dodanie-sprawy" method="post" action="<?php //echo site_url('zarzadzanie_sprawami/dodawanie_sprawy'); ?>">
				<div id="cel-container">
					<div id="cel">
						<label for="#cel-sprawy">Cel sprawy</label>
						<select id="cel-sprawy">
							<option value="">Wybierz</option>
							<option value="0">Utworzenie KP</option>
							<option value="1">Duplikat KP</option>
							<option value="2">Modyfikacja KP</option>
							<option value="3">Przedłuenie KP</option>
						</select>
					</div>
				</div>
				<div class="kontener-dodanie-sprawy">
					<div>
						<h2>Dane wnioskodawcy</h2>
						<div>
							<label for="#nazwisko">Nazwisko</label>
							<input type="text" id="nazwisko">
								
							<label for="#imie">Imię</label>
							<input type="text" id="imie">
								
							<label for="#plec">Płeć</label>
							<div id="plec">
								<input type="radio" id="kobieta" name="plec" value="Kobieta">
								<label for="kobieta">Kobieta</label>
								<input type="radio" id="mezczyzna" name="plec" value="Męzczyzna">
								<label for="mezczyzna">Mężczyzna</label>                        
							</div>
								
							<label for="#data-urodzenia">Data urodzenia</label>
							<input type="date" id="data-urodzenia">
								
							<label for="#obywatelstwo">Obywatelstwo</label>
							<select id="obywatelstwo">
								<option value="">Wybierz</option>
								<option value="0">obywatelstwo1</option>
								<option value="1">obywatelstwo1</option>
								<option value="2">obywatelstwo1</option>
								<option value="3">obywatelstwo1</option>
							</select>
								
							<label for="#narodowosc">Narodowość</label>
							<select id="narodowosc">
								<option value="">Wybierz</option>
								<option value="0">narodowosc</option>
								<option value="1">narodowosc</option>
								<option value="2">narodowosc</option>
								<option value="3">narodowosc</option>
							</select>
								
							<label for="#typ-dokumentu">Typ dokumentu</label>
							<select id="typ-dokumentu"> <!--to musi być zaciągnięte potem ze słownika-->
								<option value="">Wybierz</option>
								<option value="0">Paszport</option>
								<option value="1">Dowód osobisty</option>
								<option value="2">Prawo jazdy</option>
							</select>
								
							<label for="#nr-dokumentu">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu">        
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox">
							</div>
							<h2 class="relative">Dane pierwszego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-1">Nazwisko</label>
							<input type="text" id="nazwisko-1">
							<label for="#imie-1">Imię</label>
							<input type="text" id="imie-1">
							<label for="#pokrewienstwo-1">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-1">
								<option value="">Wybierz</option>
								<option value="Matka">Matka</option>
								<option value="Ojciec">Ojciec</option>
								<option value="Babcia">Babcia</option>
								<option value="Dziadek">Dziadek</option>
								<option value="Prababcia">Prababcia</option>
								<option value="Pradziadek">Pradziadek</option>
							</select>
							<label for="#obywatelstwo-1">Obywatelstwo</label>
							<select id="obywatelstwo-1">
								<option value="">Wybierz</option>
								<option value="0">obywatelstwo1</option>
								<option value="1">obywatelstwo1</option>
								<option value="2">obywatelstwo1</option>
								<option value="3">obywatelstwo1</option>
							</select>
							<label for="#narodowosc-1">Narodowość</label>
							<select id="narodowosc-1">
								<option value="">Wybierz</option>
								<option value="0">narodowosc</option>
								<option value="1">narodowosc</option>
								<option value="2">narodowosc</option>
								<option value="3">narodowosc</option>
							</select>
							<label for="#typ-dokumentu-1">Typ dokumentu</label>
							<select id="typ-dokumentu-1"> <!--to musi być zaciągnięte potem ze słownika-->
								<option value="">Wybierz</option>
								<option value="0">Paszport</option>
								<option value="1">Dowód osobisty</option>
								<option value="2">Prawo jazdy</option>
							</select>
							<label for="#nr-dokumentu-1">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-1">                   
						</div>
					</div>
					<div>
						<h2>Adres zamieszkania</h2>
						<div>
							<label for="#panstwo">Państwo</label>
							<input type="text" id="panstwo">
							<label for="#miasto">Miasto</label>
							<input type="text" id="miasto">
							<label for="#kod">Kod pocztowy</label>
							<input type="text" id="kod">
							<label for="#ulica">Ulica</label>
							<input type="text" id="ulica">
							<label for="#nr-domu">Nr domu</label>
							<input type="text" id="nr-domu">
							<label for="#nr-lokalu">Nr lokalu</label>
							<input type="text" id="nr-lokalu">                    
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox">
							</div>	
							<h2 class="relative">Dane drugiego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-2">Nazwisko</label>
							<input type="text" id="nazwisko-2">
							<label for="#imie-2">Imię</label>
							<input type="text" id="imie-2">
							<label for="#pokrewienstwo-2">Stopień pokrewieństwa</label>
							<select id="obywatelstwo-2">
								<option value="">Wybierz</option>
								<option value="0">Matka</option>
								<option value="1">Ojciec</option>
								<option value="2">Babcia</option>
								<option value="3">Dziadek</option>
								<option value="4">Prababcia</option>
								<option value="5">Pradziadek</option>
							</select>
							<label for="#obywatelstwo-2">Obywatelstwo</label>
							<select id="obywatelstwo-2">
								<option value="-1">Wybierz</option>
								<option value="0">obywatelstwo1</option>
								<option value="1">obywatelstwo1</option>
								<option value="2">obywatelstwo1</option>
								<option value="3">obywatelstwo1</option>
							</select>
							<label for="#narodowosc-2">Narodowość</label>
							<select id="narodowosc-2">
								<option value="">Wybierz</option>
								<option value="0">narodowosc</option>
								<option value="1">narodowosc</option>
								<option value="2">narodowosc</option>
								<option value="3">narodowosc</option>
							</select>
							<label for="#typ-dokumentu-2">Typ dokumentu</label>
							<select id="typ-dokumentu-2"> <!--to musi być zaciągnięte potem ze słownika-->
								<option value="">Wybierz</option>
								<option value="0">Paszport</option>
								<option value="1">Dowód osobisty</option>
								<option value="2">Prawo jazdy</option>
							</select>
							<label for="#nr-dokumentu-2">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-2">     
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
