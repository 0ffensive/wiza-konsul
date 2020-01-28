<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Edytowanie sprawy</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_dodawanie_sprawy.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
			<h1>Edytowanie sprawy</h1>
			<form id="edytowanie-sprawy" method="post" action="<?php echo site_url('zarzadzanie_sprawami/edytowanie_sprawy'); ?>">
				<div class="dane-sprawy">
					<label for="#id-lokalne">ID lokalne</label>
					<input disabled type="text" id="id-lokalne" name="id_lokalne" value="<?php echo (set_value('id_lokalne') == NULL? ($sprawa == NULL ? "" : $sprawa->id_lokalne) : set_value('id_lokalne')); ?>">
					<label for="#id-globalne">ID globalne</label>
					<input disabled type="text" id="id-globalne" name="id_globalne" value="<?php echo (set_value('id_globalne') == NULL? ($sprawa == NULL ? "" : $sprawa->id_globalne) : set_value('id_globalne')); ?>">
					<label for="#placowka">ID placówki</label>
					<input disabled type="text" id="placowka" name="placowka" value="<?php echo (set_value('placowka') == NULL? ($sprawa == NULL ? "" : $sprawa->placowka) : set_value('placowka')); ?>">
					<label for="#data">Data załozenia</label>
					<input disabled type="text" id="data" name="data_zalozenia" value="<?php echo (set_value('data_zalozenia') == NULL? ($sprawa == NULL ? "" : $sprawa->data_zalozenia) : set_value('data_zalozenia')); ?>">
					<label for="#cel">Cel sprawy</label>
					<input disabled type="text" id="cel" name="cel" value="<?php echo (set_value('cel') == NULL? ($sprawa == NULL ? "" : $sprawa->cel) : set_value('cel')); ?>">
					<label for="#rozstrzygnieta">Rozstrzygnieta</label>
					<input disabled type="text" id="rozstrzygnieta" name="czy_rozstrzygnieta" value="<?php echo (set_value('czy_rozstrzygnieta') == NULL? ($sprawa == NULL ? "" : ($sprawa->czy_rozstrzygnieta == 0 ? "Nie" : "Tak")) : set_value('czy_rozstrzygnieta')); ?>">
				</div>
				<div class="kontener-dodanie-sprawy">
					<div>
						<h2>Dane wnioskodawcy</h2>
						<div>
							<label for="#nazwisko">Nazwisko</label>
							<input type="text" id="nazwisko" name="nazwisko" value="<?php echo (set_value('nazwisko') == NULL? ($sprawa == NULL ? "" : $sprawa->nazwisko) : set_value('nazwisko')); ?>">
							<?php echo form_error('nazwisko','<div class="error-message">*','</div>') ?>
								
							<label for="#imie">Imię</label>
							<input type="text" id="imie" name="imie" value="<?php echo (set_value('imie') == NULL? ($sprawa == NULL ? "" : $sprawa->imie) : set_value('imie')); ?>">
							<?php echo form_error('imie','<div class="error-message">*','</div>') ?>	

							<label for="#plec">Płeć</label>
							<div id="plec">
								<input type="radio" id="kobieta" name="plec" value="Kobieta" <?php echo (set_value('plec') == NULL? ($sprawa == NULL ? "" : ($sprawa->plec == "Kobieta" ? "checked":"" )) : (set_value('plec') == "Kobieta" ? "checked":"" )); ?>>
								<label for="kobieta">Kobieta</label>
								<input type="radio" id="mezczyzna" name="plec" value="Mężczyzna" <?php echo (set_value('plec') == NULL? ($sprawa == NULL ? "" : ($sprawa->plec == "Mężczyzna" ? "checked":"" )) : (set_value('plec') == "Mężczyzna" ? "checked":"")); ?>>
								<label for="mezczyzna">Mężczyzna</label>                        
							</div>
							<?php echo form_error('plec','<div class="error-message">*','</div>') ?>
								
							<label for="#data-urodzenia">Data urodzenia</label>
							<input type="date" id="data-urodzenia" name="data_urodzenia" value="<?php echo (set_value('data_urodzenia') == NULL ? ($sprawa == NULL ? "" : $sprawa->data_urodzenia) : set_value('data_urodzenia')); ?>">
							<?php echo form_error('data_urodzenia','<div class="error-message">*','</div>') ?>
							
							<label for="#obywatelstwo">Obywatelstwo</label>
							<select id="obywatelstwo" name="obywatelstwo">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo') == NULL ? ($sprawa == NULL ? "" : ($sprawa->obywatelstwo == $wartosc->nazwa ? "selected":"" )) : (set_value('obywatelstwo') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo','<div class="error-message">*','</div>') ?>
							
							<label for="#narodowosc">Narodowość</label>
							<select id="narodowosc" name="narodowosc">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('narodowosc') == NULL ? ($sprawa == NULL ? "" : ($sprawa->narodowosc == $wartosc->nazwa ? "selected":"" )) : (set_value('narodowosc') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('narodowosc','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu">Typ dokumentu</label>
							<select id="typ-dokumentu" name="typ_dokumentu_identyfikacyjnego">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego') == NULL ? ($sprawa == NULL ? "" : ($sprawa->typ_dokumentu_identyfikacyjnego == $wartosc->nazwa ? "selected":"" )) : (set_value('typ_dokumentu_identyfikacyjnego') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu" name="nr_dokumentu_identyfikacyjnego" value="<?php echo (set_value('nr_dokumentu_identyfikacyjnego') == NULL ? ($sprawa == NULL ? "" : $sprawa->nr_dokumentu_identyfikacyjnego) : set_value('nr_dokumentu_identyfikacyjnego')); ?>">        
							<?php echo form_error('nr_dokumentu_identyfikacyjnego','<div class="error-message">*','</div>') ?>
							
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_pierwszy" <?php echo set_value('przodek_pierwszy') == NULL? ($sprawa == NULL ? "" : ($sprawa->nazwisko1 == NULL? "" : "checked")) : "checked" ?>>
							</div>
							<h2 class="relative">Dane pierwszego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-1">Nazwisko</label>
							<input type="text" id="nazwisko-1" name="nazwisko1" value="<?php echo (set_value('nazwisko1') == NULL ? ($sprawa == NULL ? "" : $sprawa->nazwisko1) : set_value('nazwisko1')); ?>">
							<?php echo form_error('nazwisko1','<div class="error-message">*','</div>') ?>

							<label for="#imie-1">Imię</label>
							<input type="text" id="imie-1" name="imie1" value="<?php echo (set_value('imie1') == NULL ? ($sprawa == NULL ? "" : $sprawa->imie1) : set_value('imie1')); ?>">
							<?php echo form_error('imie1','<div class="error-message">*','</div>') ?>
							
							<label for="#data-urodzenia-1">Data urodzenia</label>
							<input type="date" id="data-urodzenia-1" name="data_urodzenia1"  value="<?php echo (set_value('data_urodzenia1') == NULL ? ($sprawa == NULL ? "" : $sprawa->data_urodzenia1) : set_value('data_urodzenia1')); ?>">
							<?php echo form_error('data_urodzenia1','<div class="error-message">*','</div>') ?>
							
							<label for="#pokrewienstwo-1">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-1" name="pokrewienstwo1">
								<option value="" hidden>Wybierz</option>
								<option value="Matka" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Matka" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Matka" ? "selected":"" )); ?>>Matka</option>
								<option value="Ojciec" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Ojciec" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Ojciec" ? "selected":"" )); ?>>Ojciec</option>
								<option value="Babcia" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Babcia" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Babcia" ? "selected":"" )); ?>>Babcia</option>
								<option value="Dziadek" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Dziadek" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Dziadek" ? "selected":"" )); ?>>Dziadek</option>
								<option value="Prababcia" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Prababcia" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Prababcia" ? "selected":"" )); ?>>Prababcia</option>
								<option value="Pradziadek" <?php echo (set_value('pokrewienstwo1') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo1 == "Pradziadek" ? "selected":"" )) : (set_value('pokrewienstwo1') == "Pradziadek" ? "selected":"" )); ?>>Pradziadek</option>
							</select>
							<?php echo form_error('pokrewienstwo1','<div class="error-message">*','</div>') ?>
							
							<label for="#obywatelstwo-1">Obywatelstwo</label>
							<select id="obywatelstwo-1" name="obywatelstwo1">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo1') == NULL ? ($sprawa == NULL ? "" : ($sprawa->obywatelstwo1 == $wartosc->nazwa ? "selected":"" )) : (set_value('obywatelstwo1') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo1','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu-1">Typ dokumentu</label>
							<select id="typ-dokumentu-1" name="typ_dokumentu_identyfikacyjnego1">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego1') == NULL ? ($sprawa == NULL ? "" : ($sprawa->typ_dokumentu_identyfikacyjnego1 == $wartosc->nazwa ? "selected":"" )) : (set_value('typ_dokumentu_identyfikacyjnego1') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego1','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu-1">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-1" name="nr_dokumentu_identyfikacyjnego1" value="<?php echo (set_value('nr_dokumentu_identyfikacyjnego1') == NULL ? ($sprawa == NULL ? "" : $sprawa->nr_dokumentu_identyfikacyjnego1) : set_value('nr_dokumentu_identyfikacyjnego1')); ?>">
							<?php echo form_error('nr_dokumentu_identyfikacyjnego1','<div class="error-message">*','</div>') ?>
							                 
						</div>
					</div>
					<div>
						<h2>Adres zamieszkania</h2>
						<div>
							<label for="#ulica">Ulica</label>
							<input type="text" id="ulica" name="ulica" value="<?php echo (set_value('ulica') == NULL ? ($sprawa == NULL ? "" : $sprawa->ulica) : set_value('ulica')); ?>">
							<?php echo form_error('ulica','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-domu">Nr domu</label>
							<input type="text" id="nr-domu" name="nr_domu" value="<?php echo (set_value('nr_domu') == NULL ? ($sprawa == NULL ? "" : $sprawa->nr_domu) : set_value('nr_domu')); ?>">
							<?php echo form_error('nr_domu','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-lokalu">Nr lokalu</label>
							<input type="text" id="nr-lokalu" name="nr_lokalu" value="<?php echo (set_value('nr_lokalu') == NULL ? ($sprawa == NULL ? "" : $sprawa->nr_lokalu) : set_value('nr_lokalu')); ?>">
							<?php echo form_error('nr_lokalu','<div class="error-message">*','</div>') ?>

							<label for="#kod">Kod pocztowy</label>
							<input type="text" id="kod" name="kod_pocztowy" value="<?php echo (set_value('kod_pocztowy') == NULL ? ($sprawa == NULL ? "" : $sprawa->kod_pocztowy) : set_value('kod_pocztowy')); ?>">
							<?php echo form_error('kod_pocztowy','<div class="error-message">*','</div>') ?>
							
							<label for="#miejscowosc">Miejscowość</label>
							<input type="text" id="miejscowosc" name="miejscowosc" value="<?php echo (set_value('miejscowosc') == NULL ? ($sprawa == NULL ? "" : $sprawa->miejscowosc) : set_value('miejscowosc')); ?>">
							<?php echo form_error('miejscowosc','<div class="error-message">*','</div>') ?>
							
							<label for="#panstwo">Państwo</label>
							<select id="panstwo" name="panstwo">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('panstwo') == NULL ? ($sprawa == NULL ? "" : ($sprawa->panstwo == $wartosc->nazwa ? "selected=selected":"" )) : (set_value('panstwo') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('panstwo','<div class="error-message">*','</div>') ?>
							
						</div>
					</div>
					<div>
						<div class="checkbox-header">
							<div class="data-checkbox">
								<input type="checkbox" name="przodek_drugi" <?php echo set_value('przodek_drugi') == NULL? ($sprawa == NULL ? "" : ($sprawa->nazwisko2 == NULL? "" : "checked")) : "checked" ?>>
							</div>	
							<h2 class="relative">Dane drugiego przodka</h2>
						</div>
						<div>
							<label for="#nazwisko-2">Nazwisko</label>
							<input type="text" id="nazwisko-2" name="nazwisko2" value="<?php echo (set_value('nazwisko2') == NULL? ($sprawa == NULL ? "" : $sprawa->nazwisko2) : set_value('nazwisko2')); ?>">
							<?php echo form_error('nazwisko2','<div class="error-message">*','</div>') ?>

							<label for="#imie-2">Imię</label>
							<input type="text" id="imie-2" name="imie2" value="<?php echo (set_value('imie2') == NULL ? ($sprawa == NULL ? "" : $sprawa->imie2) : set_value('imie2')); ?>">
							<?php echo form_error('imie2','<div class="error-message">*','</div>') ?>

							<label for="#data-urodzenia-2">Data urodzenia</label>
							<input type="date" id="data-urodzenia-2" name="data_urodzenia2" value="<?php echo (set_value('data_urodzenia2') == NULL ? ($sprawa == NULL ? "" : $sprawa->data_urodzenia2) : set_value('data_urodzenia2')); ?>">
							<?php echo form_error('data_urodzenia2','<div class="error-message">*','</div>') ?>

							<label for="#pokrewienstwo-2">Stopień pokrewieństwa</label>
							<select id="pokrewienstwo-2" name="pokrewienstwo2">
								<option value="" hidden>Wybierz</option>
								<option value="Matka" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Matka" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Matka" ? "selected":"" )); ?>>Matka</option>
								<option value="Ojciec" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Ojciec" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Ojciec" ? "selected":"" )); ?>>Ojciec</option>
								<option value="Babcia" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Babcia" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Babcia" ? "selected":"" )); ?>>Babcia</option>
								<option value="Dziadek" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Dziadek" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Dziadek" ? "selected":"" )); ?>>Dziadek</option>
								<option value="Prababcia" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Prababcia" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Prababcia" ? "selected":"" )); ?>>Prababcia</option>
								<option value="Pradziadek" <?php echo (set_value('pokrewienstwo2') == NULL? ($sprawa == NULL ? "" : ($sprawa->pokrewienstwo2 == "Pradziadek" ? "selected":"" )) : (set_value('pokrewienstwo2') == "Pradziadek" ? "selected":"" )); ?>>Pradziadek</option>
							</select>
							<?php echo form_error('pokrewienstwo2','<div class="error-message">*','</div>') ?>

							<label for="#obywatelstwo-2">Obywatelstwo</label>
							<select id="obywatelstwo-2" name="obywatelstwo2">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($kraje as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('obywatelstwo2') == NULL ?  ($sprawa == NULL ? "" : ($sprawa->obywatelstwo2 == $wartosc->nazwa ? "selected":"" )) : (set_value('obywatelstwo2') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('obywatelstwo2','<div class="error-message">*','</div>') ?>
							
							<label for="#typ-dokumentu-2">Typ dokumentu</label>
							<select id="typ-dokumentu-2" name="typ_dokumentu_identyfikacyjnego2">
								<option value="" hidden>Wybierz</option>
								<?php
									foreach($typy as $klucz => $wartosc){
										echo '<option value="'.$wartosc->nazwa.'" '.(set_value('typ_dokumentu_identyfikacyjnego2') == NULL ? ($sprawa == NULL ? "" : ($sprawa->typ_dokumentu_identyfikacyjnego2 == $wartosc->nazwa ? "selected":"" )) : (set_value('typ_dokumentu_identyfikacyjnego2') == $wartosc->nazwa ? "selected":"")).'>'.$wartosc->nazwa.'</option>';
									}
								?>
							</select>
							<?php echo form_error('typ_dokumentu_identyfikacyjnego2','<div class="error-message">*','</div>') ?>
							
							<label for="#nr-dokumentu-2">Nr dokumentu</label>
							<input type="text" id="nr-dokumentu-2" name="nr_dokumentu_identyfikacyjnego2" value="<?php echo (set_value('nr_dokumentu_identyfikacyjnego2') == NULL ? ($sprawa == NULL ? "" : $sprawa->nr_dokumentu_identyfikacyjnego2) : set_value('nr_dokumentu_identyfikacyjnego2')); ?>">
							<?php echo form_error('nr_dokumentu_identyfikacyjnego2','<div class="error-message">*','</div>') ?>
							   
						</div>
					</div>  
				</div>    
				<div>
					<div id="przyciski-zatwierdzajace">
						<input id="submit" name ="submit" type="submit" value="Zatwierdź">
						<input id="reset" name ="reset" type="submit" value="Anuluj">
					</div>
				</div>   
			</form>
        </div>
    </body>
</html>
