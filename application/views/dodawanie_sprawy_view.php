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
            <form>
                <label for="#cel-sprawy">Cel sprawy</label>
                <select id="cel-sprawy">
                    <option value="-1">Wybierz</option>
                    <option value="0">Utworzenie KP</option>
                    <option value="1">Duplikat KP</option>
                    <option value="2">Modyfikacja KP</option>
                    <option value="3">Przedłuenie KP</option>
                </select>
            </form>
            <div class="kontener-dodanie-sprawy">
                <div>

                    <h2>Dane wnioskodawcy</h2>
                    <form>
                        <label for="#nazwisko-w-nowa-sprawa">Nazwisko</label>
                        <input type="text" id="nazwisko_w-nowa-sprawa">
                        <label for="#imie-w-nowa-sprawa">Imię</label>
                        <input type="text" id="imie-w-nowa-sprawa">
                        <label for="#plec-w-nowa-sprawa">Płeć</label>
                        <div id="plec-w-nowa-sprawa">
                            <input type="radio" id="kobieta-nowa-sprawa" name="plec-w-nowa-sprawa" value="Kobieta">
                            <label for="kobieta-nowa-sprawa">Kobieta</label>
                            <br>
                            <input type="radio" id="mezczyzna-nowa-sprawa" name="plec-w-nowa-sprawa" value="Męzczyzna">
                            <label for="mezczyzna-nowa-sprawa">Mężczyzna</label>                        
                        </div>
                        <label for="#data-urodzenia-nowa-sprawa">Data urodzenia</label>
                        <input type="date" id="data-urodzenia-nowa-sprawa">
                        <label for="#obywatelstwo-nowa-sprawa">Obywatelstwo</label>
                        <select id="obywatelstwo-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">obywatelstwo1</option>
                            <option value="1">obywatelstwo1</option>
                            <option value="2">obywatelstwo1</option>
                            <option value="3">obywatelstwo1</option>
                        </select>
                        <label for="#narodowosc-nowa-sprawa">Narodowość</label>
                        <select id="narodowosc-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">narodowosc</option>
                            <option value="1">narodowosc</option>
                            <option value="2">narodowosc</option>
                            <option value="3">narodowosc</option>
                        </select>
                        <label for="#typ-dokumentu-nowa-sprawa">Typ dokumentu</label>
                        <select id="typ-dokumentu-nowa-sprawa"> <!--to musi być zaciągnięte potem ze słownika-->
                            <option value="-1">Wybierz</option>
                            <option value="0">Paszport</option>
                            <option value="1">Dowód osobisty</option>
                            <option value="2">Prawo jazdy</option>
                        </select>
                        <label for="#nr-dokumentu-nowa-sprawa">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-nowa-sprawa">        
                    </form>
                    <h2>Adres zamieszkania</h2>
                    <form>
                        <label for="#panstwo-nowa-sprawa">Państwo</label>
                        <input type="text" id="panstwo-nowa-sprawa">
                        <label for="#miasto-nowa-sprawa">Miasto</label>
                        <input type="text" id="miasto-nowa-sprawa">
                        <label for="#kod-nowa-sprawa">Kod pocztowy</label>
                        <input type="text" id="kod-nowa-sprawa">
                        <label for="#ulica-nowa-sprawa">Ulica</label>
                        <input type="text" id="ulica-nowa-sprawa">
                        <label for="#nr-domu-nowa-sprawa">Nr domu</label>
                        <input type="text" id="panstwo-nowa-sprawa">
                        <label for="#nr-lokalu-nowa-sprawa">Nr lokalu</label>
                        <input type="text" id="nr-lokalo-nowa-sprawa">                    
                    </form>
                </div>
                <div>
                    <div class="data-checkbox"><input type="checkbox"></div><h2 class="relative">Dane pierwszego przodka</h2>
                    <form>
                        <label for="#nazwisko-przodka-1-nowa-sprawa">Nazwisko</label>
                        <input type="text" id="nazwisko-przodka-1-nowa-sprawa">
                        <label for="#imie-przodka-1-nowa-sprawa">Imię</label>
                        <input type="text" id="imie-przodka-1-nowa-sprawa">
                        <label for="#pokrewienstwo-przodka-1-nowa-sprawa">Stopień pokrewieństwa</label>
                        <select id="obywatelstwo-przodka-1-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">Matka</option>
                            <option value="1">Ojciec</option>
                            <option value="2">Babcia</option>
                            <option value="3">Dziadek</option>
                            <option value="4">Prababcia</option>
                            <option value="5">Pradziadek</option>
                        </select>
                        <label for="#obywatelstwo-przodka-1-nowa-sprawa">Obywatelstwo</label>
                        <select id="obywatelstwo-przodka-1-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">obywatelstwo1</option>
                            <option value="1">obywatelstwo1</option>
                            <option value="2">obywatelstwo1</option>
                            <option value="3">obywatelstwo1</option>
                        </select>
                        <label for="#narodowosc-przodka-1-nowa-sprawa">Narodowość</label>
                        <select id="narodowosc-przodka-1-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">narodowosc</option>
                            <option value="1">narodowosc</option>
                            <option value="2">narodowosc</option>
                            <option value="3">narodowosc</option>
                        </select>
                        <label for="#typ-dokumentu-przodka-1-nowa-sprawa">Typ dokumentu</label>
                        <select id="typ-dokumentu-przodka-1-nowa-sprawa"> <!--to musi być zaciągnięte potem ze słownika-->
                            <option value="-1">Wybierz</option>
                            <option value="0">Paszport</option>
                            <option value="1">Dowód osobisty</option>
                            <option value="2">Prawo jazdy</option>
                        </select>
                        <label for="#nr-dokumentu-przodka-1-nowa-sprawa">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-przodka-1-nowa-sprawa">                   
                    </form>

                    <div class="data-checkbox"><input type="checkbox"></div><h2 class="relative">Dane drugiego przodka</h2>
                    <form>
                        <label for="#nazwisko-przodka-2-nowa-sprawa">Nazwisko</label>
                        <input type="text" id="nazwisko-przodka-2-nowa-sprawa">
                        <label for="#imie-przodka-2-nowa-sprawa">Imię</label>
                        <input type="text" id="imie-przodka-2-nowa-sprawa">
                        <label for="#pokrewienstwo-przodka-2-nowa-sprawa">Stopień pokrewieństwa</label>
                        <select id="obywatelstwo-przodka-2-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">Matka</option>
                            <option value="1">Ojciec</option>
                            <option value="2">Babcia</option>
                            <option value="3">Dziadek</option>
                            <option value="4">Prababcia</option>
                            <option value="5">Pradziadek</option>
                        </select>
                        <label for="#obywatelstwo-przodka-2-nowa-sprawa">Obywatelstwo</label>
                        <select id="obywatelstwo-przodka-2-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">obywatelstwo1</option>
                            <option value="1">obywatelstwo1</option>
                            <option value="2">obywatelstwo1</option>
                            <option value="3">obywatelstwo1</option>
                        </select>
                        <label for="#narodowosc-przodka-2-nowa-sprawa">Narodowość</label>
                        <select id="narodowosc-przodka-2-nowa-sprawa">
                            <option value="-1">Wybierz</option>
                            <option value="0">narodowosc</option>
                            <option value="1">narodowosc</option>
                            <option value="2">narodowosc</option>
                            <option value="3">narodowosc</option>
                        </select>
                        <label for="#typ-dokumentu-przodka-2-nowa-sprawa">Typ dokumentu</label>
                        <select id="typ-dokumentu-przodka-2-nowa-sprawa"> <!--to musi być zaciągnięte potem ze słownika-->
                            <option value="-1">Wybierz</option>
                            <option value="0">Paszport</option>
                            <option value="1">Dowód osobisty</option>
                            <option value="2">Prawo jazdy</option>
                        </select>
                        <label for="#nr-dokumentu-przodka-2-nowa-sprawa">Nr dokumentu</label>
                        <input type="text" id="nr-dokumentu-przodka-2-nowa-sprawa">                   
                    </form>
               </div>
            </div>             
            <div id="przyciski-dodawanie-sprawy">
                <div id="przyciski-zatwierdzajace">
					<input id="submit" name ="submit" type="submit" value="Dodaj">
                	<input id="reset" name ="reset" type="submit" value="Anuluj">
                </div>
            </div>   
			<!-- <form ... method="post" action="<?php //echo site_url('zarzadzanie_sprawami/dodawanie_sprawy'); ?>"> -->
 

        </div>
    </body>

</html>
