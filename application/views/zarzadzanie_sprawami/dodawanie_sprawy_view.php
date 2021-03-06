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
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

    </head>

    <body>
		<header>e-Konsulat</header>
		<div class="container">
            <h1>Dodawanie sprawy</h1>
            <form id="dodanie-sprawy" method="post" action="<?php echo site_url('zarzadzanie_sprawami/dodawanie_sprawy'); ?>">
				<div class="dane-sprawy">
					<label for="#cel-sprawy">Cel sprawy</label>
					<select id="cel-sprawy" name="cel">
						<option value="" hidden>Wybierz</option>
						<option value="Utworzenie" <?php echo (set_value('cel') == NULL? "" : (set_value('cel') == "Utworzenie" ? "selected":"" )); ?>>Utworzenie</option>
						<option value="Duplikat" <?php echo (set_value('cel') == NULL? "" : (set_value('cel') == "Duplikat" ? "selected":"" )); ?>>Duplikat</option>
						<option value="Modyfikacja" <?php echo (set_value('cel') == NULL? "" : (set_value('cel') == "Modyfikacja" ? "selected":"" )); ?>>Modyfikacja</option>
						<option value="Przedłużenie" <?php echo (set_value('cel') == NULL? "" : (set_value('cel') == "Przedłużenie" ? "selected":"" )); ?>>Przedłużenie</option>
					</select>
					<?php echo form_error('cel','<div class="error-message">*','</div>') ?>			
				</div>
				<div class="kontener-dodanie-sprawy">
					<div>
						<h2>Dane wnioskodawcy</h2>
						<div>
							<label for="#nazwisko">Nazwisko</label>
							<input type="text" id="nazwisko" name="nazwisko" maxlength="30" value="<?php echo (set_value('nazwisko') == NULL? ($wnioskodawca == NULL ? "" : $wnioskodawca->nazwisko) : set_value('nazwisko')); ?>">
							<?php echo form_error('nazwisko','<div class="error-message">*','</div>') ?>
								
							<label for="#imie">Imię</label>
							<input type="text" id="imie" name="imie" maxlength="30" value="<?php echo (set_value('imie') == NULL? ($wnioskodawca == NULL ? "" : $wnioskodawca->imie) : set_value('imie')); ?>">
							<?php echo form_error('imie','<div class="error-message">*','</div>') ?>	

							<label for="#plec">Płeć</label>
							<div id="plec">
								<input type="radio" id="kobieta" name="plec" value="Kobieta" <?php echo (set_value('plec') == NULL? ($wnioskodawca == NULL ? "" : ($wnioskodawca->plec == "Kobieta" ? "checked":"" )) : (set_value('plec') == "Kobieta" ? "checked":"" )); ?>>
								<label for="kobieta">Kobieta</label>
								<input type="radio" id="mezczyzna" name="plec" value="Mężczyzna" <?php echo (set_value('plec') == NULL? ($wnioskodawca == NULL ? "" : ($wnioskodawca->plec == "Mężczyzna" ? "checked":"" )) : (set_value('plec') == "Mężczyzna" ? "checked":"")); ?>>
								<label for="mezczyzna">Mężczyzna</label>                        
							</div>
							<?php echo form_error('plec','<div class="error-message">*','</div>') ?>
								
							<label for="#data-urodzenia">Data urodzenia</label>
							<input type="date" id="data-urodzenia" name="data_urodzenia" max="<?php echo date('Y-m-d'); ?>" value="<?php echo (set_value('data_urodzenia') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->data_urodzenia) : set_value('data_urodzenia')); ?>">
							<?php echo form_error('data_urodzenia','<div class="error-message">*','</div>') ?>
							
							<label for="#obywatelstwo">Obywatelstwo</label>
							<select id="obywatelstwo" name="obywatelstwo">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo') == NULL ? ($wnioskodawca == NULL ? "" : ($wnioskodawca->obywatelstwo == $wartosc->nazwa ? "selected":"" )) : (set_value('obywatelstwo') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo','<div class="error-message">*','</div>') ?>
							
							<label for="#narodowosc">Narodowość</label>
							<select id="narodowosc" name="narodowosc">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('narodowosc') == NULL ? ($wnioskodawca == NULL ? "" : ($wnioskodawca->narodowosc == $wartosc->nazwa ? "selected":"" )) : (set_value('narodowosc') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('narodowosc','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu">Typ dokumentu</label>
							<select id="typ-dokumentu" name="typ_dokumentu_identyfikacyjnego">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego') == NULL ? ($wnioskodawca == NULL ? "" : ($wnioskodawca->typ_dokumentu_identyfikacyjnego == $wartosc->nazwa ? "selected":"" )) : (set_value('typ_dokumentu_identyfikacyjnego') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu" maxlength="15" name="nr_dokumentu_identyfikacyjnego" value="<?php echo (set_value('nr_dokumentu_identyfikacyjnego') == NULL? ($wnioskodawca == NULL? "" : $wnioskodawca->nr_dokumentu_identyfikacyjnego) : set_value('nr_dokumentu_identyfikacyjnego')); ?>">        
							<?php echo form_error('nr_dokumentu_identyfikacyjnego','<div class="error-message">*','</div>') ?>
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_pierwszy" <?php echo set_value('przodek_pierwszy') == NULL? "" : "checked" ?>>
							</div>
							<h2 class="relative">Dane pierwszego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-1">Nazwisko</label>
							<input type="text" id="nazwisko-1" maxlength="30" name="nazwisko1" value="<?php echo set_value('nazwisko1') ?>">
							<?php echo form_error('nazwisko1','<div class="error-message">*','</div>') ?>

							<label for="#imie-1">Imię</label>
							<input type="text" id="imie-1" maxlength="30" name="imie1" value="<?php echo set_value('imie1') ?>">
							<?php echo form_error('imie1','<div class="error-message">*','</div>') ?>
							
							<label for="#data-urodzenia-1">Data urodzenia</label>
							<input type="date" id="data-urodzenia-1" name="data_urodzenia1" max="<?php echo date('Y-m-d'); ?>" value="<?php echo set_value('data_urodzenia1') ?>">
							<?php echo form_error('data_urodzenia1','<div class="error-message">*','</div>') ?>
							
							<label for="#pokrewienstwo-1">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-1" name="pokrewienstwo1">
								<option value="" hidden>Wybierz</option>
								<option value="Matka" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Matka" ? "selected":"" )); ?>>Matka</option>
								<option value="Ojciec" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Ojciec" ? "selected":"" )); ?>>Ojciec</option>
								<option value="Babcia" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Babcia" ? "selected":"" )); ?>>Babcia</option>
								<option value="Dziadek" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Dziadek" ? "selected":"" )); ?>>Dziadek</option>
								<option value="Prababcia" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Prababcia" ? "selected":"" )); ?>>Prababcia</option>
								<option value="Pradziadek" <?php echo (set_value('pokrewienstwo1') == NULL? "" : (set_value('pokrewienstwo1') == "Pradziadek" ? "selected":"" )); ?>>Pradziadek</option>
							</select>
							<?php echo form_error('pokrewienstwo1','<div class="error-message">*','</div>') ?>
							
							<label for="#obywatelstwo-1">Obywatelstwo</label>
							<select id="obywatelstwo-1" name="obywatelstwo1">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo1') == NULL ? "" : (set_value('obywatelstwo1') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo1','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu-1">Typ dokumentu</label>
							<select id="typ-dokumentu-1" name="typ_dokumentu_identyfikacyjnego1">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego1') == NULL ? "" : (set_value('typ_dokumentu_identyfikacyjnego1') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego1','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu-1">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-1" maxlength="15" name="nr_dokumentu_identyfikacyjnego1" value="<?php echo set_value('nr_dokumentu_identyfikacyjnego1') ?>">
							<?php echo form_error('nr_dokumentu_identyfikacyjnego1','<div class="error-message">*','</div>') ?>
							                 
						</div>
					</div>
					<div>
						<h2>Adres zamieszkania</h2>
						<div>
							<label for="#ulica">Ulica</label>
							<input type="text" id="ulica" name="ulica" maxlength="50" value="<?php echo (set_value('ulica') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->ulica) : set_value('ulica')); ?>">
							<?php echo form_error('ulica','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-domu">Nr domu</label>
							<input type="text" id="nr-domu" name="nr_domu" maxlength="10" value="<?php echo (set_value('nr_domu') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->nr_domu) : set_value('nr_domu')); ?>">
							<?php echo form_error('nr_domu','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-lokalu">Nr lokalu</label>
							<input type="text" id="nr-lokalu" name="nr_lokalu" maxlength="10" value="<?php echo (set_value('nr_lokalu') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->nr_lokalu) : set_value('nr_lokalu')); ?>">
							<?php echo form_error('nr_lokalu','<div class="error-message">*','</div>') ?>

							<label for="#kod">Kod pocztowy</label>
							<input type="text" id="kod" name="kod_pocztowy" maxlength="15" value="<?php echo (set_value('kod_pocztowy') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->kod_pocztowy) : set_value('kod_pocztowy')); ?>">
							<?php echo form_error('kod_pocztowy','<div class="error-message">*','</div>') ?>
							
							<label for="#miejscowosc">Miejscowość</label>
							<input type="text" id="miejscowosc" name="miejscowosc" maxlength="50" value="<?php echo (set_value('miejscowosc') == NULL ? ($wnioskodawca == NULL ? "" : $wnioskodawca->miejscowosc) : set_value('miejscowosc')); ?>">
							<?php echo form_error('miejscowosc','<div class="error-message">*','</div>') ?>
							
							<label for="#panstwo">Państwo</label>
							<select id="panstwo" name="panstwo">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('panstwo') == NULL ? ($wnioskodawca == NULL ? "" : ($wnioskodawca->panstwo == $wartosc->nazwa ? "selected=selected":"" )) : (set_value('panstwo') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('panstwo','<div class="error-message">*','</div>') ?>
							
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_drugi" <?php echo set_value('przodek_drugi') == NULL? "" : "checked" ?>>
							</div>	
							<h2 class="relative">Dane drugiego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-2">Nazwisko</label>
							<input type="text" id="nazwisko-2" name="nazwisko2" maxlength="30" value="<?php echo set_value('nazwisko2') ?>">
							<?php echo form_error('nazwisko2','<div class="error-message">*','</div>') ?>

							<label for="#imie-2">Imię</label>
							<input type="text" id="imie-2" name="imie2" maxlength="30" value="<?php echo set_value('imie2') ?>">
							<?php echo form_error('imie2','<div class="error-message">*','</div>') ?>

							<label for="#data-urodzenia-2">Data urodzenia</label>
							<input type="date" id="data-urodzenia-2" name="data_urodzenia2" max="<?php echo date('Y-m-d'); ?>" value="<?php echo set_value('data_urodzenia2') ?>">
							<?php echo form_error('data_urodzenia2','<div class="error-message">*','</div>') ?>

							<label for="#pokrewienstwo-2">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-2" name="pokrewienstwo2">
								<option value="" hidden>Wybierz</option>
								<option value="Matka" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Matka" ? "selected":"" )); ?>>Matka</option>
								<option value="Ojciec" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Ojciec" ? "selected":"" )); ?>>Ojciec</option>
								<option value="Babcia" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Babcia" ? "selected":"" )); ?>>Babcia</option>
								<option value="Dziadek" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Dziadek" ? "selected":"" )); ?>>Dziadek</option>
								<option value="Prababcia" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Prababcia" ? "selected":"" )); ?>>Prababcia</option>
								<option value="Pradziadek" <?php echo (set_value('pokrewienstwo2') == NULL? "" : (set_value('pokrewienstwo2') == "Pradziadek" ? "selected":"" )); ?>>Pradziadek</option>
							</select>
							<?php echo form_error('pokrewienstwo2','<div class="error-message">*','</div>') ?>

							<label for="#obywatelstwo-2">Obywatelstwo</label>
							<select id="obywatelstwo-2" name="obywatelstwo2">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo2') == NULL ? "" : (set_value('obywatelstwo2') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo2','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu-2">Typ dokumentu</label>
							<select id="typ-dokumentu-2" name="typ_dokumentu_identyfikacyjnego2">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego2') == NULL ? "" : (set_value('typ_dokumentu_identyfikacyjnego2') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego2','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu-2">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-2" name="nr_dokumentu_identyfikacyjnego2" maxlength="15" value="<?php echo set_value('nr_dokumentu_identyfikacyjnego2') ?>">
							<?php echo form_error('nr_dokumentu_identyfikacyjnego2','<div class="error-message">*','</div>') ?>
							   
						</div>
					</div>  
				</div>    
				<div>
					<div id="przyciski-zatwierdzajace">
						<input id="submit" name ="submit" type="submit" value="Dodaj">
						<input id="reset" name ="submit" type="submit" value="Anuluj">
					</div>
				</div>   
			</form>
        </div>
    </body>
</html>
