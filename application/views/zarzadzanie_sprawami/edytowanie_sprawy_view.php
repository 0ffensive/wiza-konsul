<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Edytowanie sprawy</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_przegladanie_sprawy.css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
			<h1>Edytowanie sprawy</h1>
			<div>
				<form id="cofnij-form" method="post" action="<?php echo site_url('linki/do_zarzadzanie_sprawami'); ?>">
					<input type="submit" value="Cofnij">
				</form>
			</div>
			<div>
				<h2>Dane sprawy</h2>
				<form>
					<label for="#id-lokalne-przegladanie-sprawy">ID lokalne</label>
					<input disabled type="text" id="id-lokalne-przegladanie-sprawy" value="EF 124354">
					<label for="#id-globalne-przegladanie-sprawy">ID globalne</label>
					<input disabled type="text" id="id-globalne-przegladanie-sprawy" value="EF 124354">
					<label for="#id-placowki-przegladanie-sprawy">ID placówki</label>
					<input disabled type="text" id="id-placowki-przegladanie-sprawy" value="EF">
					<label for="#data-przegladanie-sprawy">Data załozenia</label>
					<input disabled type="text" id="data-przegladanie-sprawy" value="2019-03-04">
					<label for="#cel-sprawy-przegladanie-sprawy">Cel sprawy</label>
					<input disabled type="text" id="cel-sprawy-przegladanie-sprawy" value="Duplikat KP">
					<label for="#rozstrzygnieta-przegladanie-sprawy">Rozstrzygnieta</label>
					<input disabled type="text" id="rozstrzygnieta-przegladanie-sprawy" value="TAK">
				</form>
			</div>
			<div class="kontener-dodanie-sprawy">
                <div>
                    <h2>Dane wnioskodawcy</h2>
                    <form>
                        <label for="#nazwisko-w-przegladanie-sprawy">Nazwisko</label>
                        <input type="text" id="nazwisko_w-przegladanie-sprawy" value="Kowalski">
                        <label for="#imie-w-przegladanie-sprawy">Imię</label>
                        <input type="text" id="imie-w-przegladanie-sprawy" value="Jan">
                        <label for="#plec-w-przegladanie-sprawy">Płeć</label>
                        <input type="text" id="plec-w-przegladanie-sprawy" value="Męzczyzna">
                        <label for="#data-urodzenia-przegladanie-sprawy">Data urodzenia</label>
                        <input type="date" id="data-urodzenia-przegladanie-sprawy" value="1970-04-24">
                        <label for="#obywatelstwo-przegladanie-sprawy">Obywatelstwo</label>
                        <input type="text" id="obywatelstwo-przegladanie-sprawy" value="Czeska">
                        <label for="#narodowosc-przegladanie-sprawy">Narodowość</label>
                        <input type="text" id="obywatelstwo-przegladanie-sprawy" value="Polska">
                        <label for="#typ-dokumentu-przegladanie-sprawy">Typ dokumentu</label>
                        <input type="text" id="typ-dokumentu-przegladanie-sprawy" value="Dowód osobisty">
                        <label for="#nr-dokumentu-przegladanie-sprawy">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-przegladanie-sprawy" value="RGD2456">        
                    </form>
                    <h2>Adres zamieszkania</h2>
                    <form>
                        <label for="#panstwo-przegladanie-sprawy">Państwo</label>
                        <input type="text" id="panstwo-przegladanie-sprawy" value="Czechy">
                        <label for="#miasto-przegladanie-sprawy">Miasto</label>
                        <input type="text" id="miasto-przegladanie-sprawy" value="Praha">
                        <label for="#kod-przegladanie-sprawy">Kod pocztowy</label>
                        <input type="text" id="kod-przegladanie-sprawy" value="13000">
                        <label for="#ulica-przegladanie-sprawy">Ulica</label>
                        <input type="text" id="ulica-przegladanie-sprawy" value="Mahlerovy sady">
                        <label for="#nr-domu-przegladanie-sprawy">Nr domu</label>
                        <input type="text" id="nr-domu-przegladanie-sprawy" value="1">
                        <label for="#nr-lokalu-przegladanie-sprawy">Nr lokalu</label>
                        <input type="text" id="nr-lokalo-przegladanie-sprawy" value="-">                    
                    </form>
                </div>
                <div>
                    <h2>Dane pierwszego przodka</h2>
                    <form>
                        <label for="#nazwisko-przodka-1-przegladanie-sprawy">Nazwisko</label>
                        <input type="text" id="nazwisko-przodka-1-przegladanie-sprawy" value="Kowalska">
                        <label for="#imie-przodka-1-przegladanie-sprawy">Imię</label>
                        <input type="text" id="imie-przodka-1-przegladanie-sprawy" value="Danuta">
                        <label for="#pokrewienstwo-przodka-1-przegladanie-sprawy">Stopień pokrewieństwa</label>
                        <input type="text" id="pokrewienstwo-przodka-1-przegladanie-sprawy" value="Matka"> 
                        <label for="#obywatelstwo-przodka-1-przegladanie-sprawy">Obywatelstwo</label>
                        <input type="text" id="obywatelstwo-przodka-1-przegladanie-sprawy" value="Polskie">
                        <label for="#narodowosc-przodka-1-przegladanie-sprawy">Narodowość</label>
                        <input type="text" id="narodowosc-przodka-1-przegladanie-sprawy" value="Polska">
                        <label for="#typ-dokumentu-przodka-1-przegladanie-sprawy">Typ dokumentu</label>
                        <input type="text" id="typ-dokumentu-przodka-1-przegladanie-sprawy" value="Prawo jazdy">
                        <label for="#nr-dokumentu-przodka-1-przegladanie-sprawy">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-przodka-1-przegladanie-sprawy" value="EFG 24353">                   
                    </form>

                    <h2>Dane drugiego przodka</h2>
                    <form>
                        <label for="#nazwisko-przodka-2-przegladanie-sprawy">Nazwisko</label>
                        <input type="text" id="nazwisko-przodka-2-przegladanie-sprawy" value="Kowalski">
                        <label for="#imie-przodka-2-przegladanie-sprawy">Imię</label>
                        <input type="text" id="imie-przodka-2-przegladanie-sprawy" value="Bogdan">
                        <label for="#pokrewienstwo-przodka-2-przegladanie-sprawy">Stopień pokrewieństwa</label>
                        <input type="text" id="pokrewienstwo-przodka-2-przegladanie-sprawy" value="Ojciec">  
                        <label for="#obywatelstwo-przodka-2-przegladanie-sprawy">Obywatelstwo</label>
                        <input type="text" id="obywatelstwo-przodka-2-przegladanie-sprawy" value="Polskie">
                        <label for="#narodowosc-przodka-2-przegladanie-sprawy">Narodowość</label>
                        <input type="text" id="narodowosc-przodka-2-przegladanie-sprawy" value="Polska">
                        <label for="#typ-dokumentu-przodka-2-przegladanie-sprawy">Typ dokumentu</label>
                        <input type="text" id="typ-dokumentu-przodka-2-przegladanie-sprawy" value="Dowód osobisty">
                        <label for="#nr-dokumentu-przodka-2-przegladanie-sprawy">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-przodka-2-przegladanie-sprawy" value="EFG 24353">                     
                    </form>
					<input type="submit" value="Zatwierdź"></input>
               </div>
            </div>  
        </div>
    </body>
</html>
