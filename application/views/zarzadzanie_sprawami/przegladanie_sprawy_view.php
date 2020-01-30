<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Podglad sprawy</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_przegladanie_sprawy.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

    </head>

    <body>
        <header>e-Konsulat</header>
        <div class="container">
			<h1>Podgląd sprawy</h1>
			<div>
				<form id="cofnij-form" method="post" action="<?php echo site_url('linki/do_zarzadzanie_sprawami'); ?>">
					<input type="submit" value="Cofnij">
				</form>
			</div>
			<div>
				<h2>Dane sprawy</h2>
				<form>
					<label for="#id-lokalne">ID lokalne</label>
					<input disabled type="text" id="id-lokalne" value="<?php echo $sprawa->id_lokalne; ?>" placeholder=" ― ">
					<label for="#id-globalne">ID globalne</label>
					<input disabled type="text" id="id-globalne" value="<?php echo $sprawa->id_globalne; ?>" placeholder=" ― ">
					<label for="#placowka">ID placówki</label>
					<input disabled type="text" id="placowka" value="<?php echo $sprawa->placowka; ?>" placeholder=" ― ">
					<label for="#data">Data załozenia</label>
					<input disabled type="text" id="data" value="<?php echo $sprawa->data_zalozenia; ?>" placeholder=" ― ">
					<label for="#cel">Cel sprawy</label>
					<input disabled type="text" id="cel" value="<?php echo $sprawa->cel; ?>" placeholder=" ― ">
					<label for="#rozstrzygnieta">Rozstrzygnieta</label>
					<input disabled type="text" id="rozstrzygnieta" value="<?php echo ($sprawa->czy_rozstrzygnieta == 0 ? "Nie" : "Tak"); ?>" placeholder=" ― ">
				</form>
			</div>
			<div class="kontener-dodanie-sprawy">
                <div>
                    <h2>Dane wnioskodawcy</h2>
                    <form>
                        <label for="#nazwisko">Nazwisko</label>
                        <input disabled type="text" id="nazwisko" value="<?php echo $sprawa->nazwisko; ?>" placeholder=" ― ">
                        <label for="#imie">Imię</label>
                        <input disabled type="text" id="imie" value="<?php echo $sprawa->imie; ?>" placeholder=" ― ">
                        <label for="#plec">Płeć</label>
                        <input disabled type="text" id="plec" value="<?php echo $sprawa->plec; ?>" placeholder=" ― ">
                        <label for="#data-urodzenia">Data urodzenia</label>
                        <input disabled type="date" id="data-urodzenia" value="<?php echo $sprawa->data_urodzenia; ?>" placeholder=" ― ">
                        <label for="#obywatelstwo">Obywatelstwo</label>
                        <input disabled type="text" id="obywatelstwo" value="<?php echo $sprawa->obywatelstwo; ?>" placeholder=" ― ">
                        <label for="#narodowosc">Narodowość</label>
                        <input disabled type="text" id="obywatelstwo" value="<?php echo $sprawa->narodowosc; ?>" placeholder=" ― ">
                        <label for="#typ-dokumentu">Typ dokumentu</label>
                        <input disabled type="text" id="typ-dokumentu" value="<?php echo $sprawa->typ_dokumentu_identyfikacyjnego; ?>" placeholder=" ― ">
                        <label for="#nr-dokumentu">Nr dokumentu</label>
                        <input disabled type="text" id="nr-dokumentu" value="<?php echo $sprawa->nr_dokumentu_identyfikacyjnego; ?>" placeholder=" ― ">
                    </form>
                    <h2>Adres zamieszkania</h2>
                    <form>
                        <label for="#panstwo">Państwo</label>
                        <input disabled type="text" id="panstwo" value="<?php echo $sprawa->panstwo; ?>" placeholder=" ― ">
                        <label for="#miasto">Miasto</label>
                        <input disabled type="text" id="miasto" value="<?php echo $sprawa->miejscowosc; ?>" placeholder=" ― ">
                        <label for="#kod">Kod pocztowy</label>
                        <input disabled type="text" id="kod" value="<?php echo $sprawa->kod_pocztowy; ?>" placeholder=" ― ">
                        <label for="#ulica">Ulica</label>
                        <input disabled type="text" id="ulica" value="<?php echo $sprawa->ulica; ?>" placeholder=" ― ">
                        <label for="#nr-domu">Nr domu</label>
                        <input disabled type="text" id="nr-domu" value="<?php echo $sprawa->nr_domu; ?>" placeholder=" ― ">
                        <label for="#nr-lokalu">Nr lokalu</label>
                        <input disabled type="text" id="nr-lokalo" value="<?php echo $sprawa->nr_lokalu; ?>" placeholder=" ― ">            
                    </form>
                </div>
                <div>
                    <h2>Dane pierwszego przodka</h2>
                    <form>
                        <label for="#nazwisko-1">Nazwisko</label>
                        <input disabled type="text" id="nazwisko-1" value="<?php echo $sprawa->nazwisko1; ?>" placeholder=" ― ">
                        <label for="#imie-1">Imię</label>
                        <input disabled type="text" id="imie-1" value="<?php echo $sprawa->imie1; ?>" placeholder=" ― ">
                        <label for="#data_urodzenia-1">Data urodzenia</label>
                        <input disabled type="text" id="data_urodzenia-1" value="<?php echo $sprawa->data_urodzenia1; ?>" placeholder=" ― ">
                        <label for="#pokrewienstwo-1">Stopień pokrewieństwa</label>
                        <input disabled type="text" id="pokrewienstwo-1" value="<?php echo $sprawa->pokrewienstwo1; ?>" placeholder=" ― ">
                        <label for="#obywatelstwo-1">Obywatelstwo</label>
                        <input disabled type="text" id="obywatelstwo-1" value="<?php echo $sprawa->obywatelstwo1; ?>" placeholder=" ― ">
                        <label for="#typ-dokumentu-1">Typ dokumentu</label>
                        <input disabled type="text" id="typ-dokumentu-1" value="<?php echo $sprawa->typ_dokumentu_identyfikacyjnego1; ?>" placeholder=" ― ">
                        <label for="#nr-dokumentu-1">Nr dokumentu</label>
                        <input disabled type="text" id="nr-dokumentu-1" value="<?php echo $sprawa->nr_dokumentu_identyfikacyjnego1; ?>" placeholder=" ― ">          
                    </form>

                    <h2>Dane drugiego przodka</h2>
                    <form>
                        <label for="#nazwisko-2">Nazwisko</label>
                        <input disabled type="text" id="nazwisko-2" value="<?php echo $sprawa->nazwisko2; ?>" placeholder=" ― ">
                        <label for="#imie-2">Imię</label>
                        <input disabled type="text" id="imie-2" value="<?php echo $sprawa->imie2; ?>" placeholder=" ― ">
                        <label for="#data-urodzenia-2">Data urodzenia</label>
                        <input disabled type="text" id="data-urodzenia-2" value="<?php echo $sprawa->data_urodzenia2; ?>" placeholder=" ― ">
                        <label for="#pokrewienstwo-2">Stopień pokrewieństwa</label>
                        <input disabled type="text" id="pokrewienstwo-2" value="<?php echo $sprawa->pokrewienstwo2; ?>" placeholder=" ― ">
                        <label for="#obywatelstwo-2">Obywatelstwo</label>
                        <input disabled type="text" id="obywatelstwo-2" value="<?php echo $sprawa->obywatelstwo2; ?>" placeholder=" ― ">
                        <label for="#typ-dokumentu-2">Typ dokumentu</label>
                        <input disabled type="text" id="typ-dokumentu-2" value="<?php echo $sprawa->typ_dokumentu_identyfikacyjnego2; ?>" placeholder=" ― ">
                        <label for="#nr-dokumentu-2">Nr dokumentu</label>
                        <input disabled type="text" id="nr-dokumentu-2" value="<?php echo $sprawa->nr_dokumentu_identyfikacyjnego2; ?>" placeholder=" ― ">
                    </form>
               </div>
            </div>  
        </div>
    </body>
</html>
