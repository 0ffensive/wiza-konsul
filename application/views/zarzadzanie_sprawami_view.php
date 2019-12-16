<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Zarządzanie sprawami</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/i_zarzadzanie_sprawami.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Zarządzanie sprawami</h1>
        <button id="dodaj-sprawe-zarzadzanie-spraw" onclick="window.location.href='dodawanie_sprawy.html'">Dodaj nową sprawę</button>
        <h2>Wyszukaj sprawę</h2>
        <div id="wyszukanie-spraw-zarzadzanie-sprawami">
            <form>
                <label for="#id-placowki-zarzadzanie-sprawami">ID placówki</label>
                <input type="text" id="id-placowki-zarzadzanie-sprawami">
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
                    <option value="0">Utworzenie KP</option>
                    <option value="1">Duplikat KP</option>
                    <option value="2">Modyfikacja KP</option>
                    <option value="3">Przedłużenie KP</option>
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
                <td>L.p.<td>ID globalne<td>ID lokalne<td>ID placówki<td>ID wnioskodawcy<td>Nazwisko<td>Imię<td>Data urodzenia<td>Data załozenia sprawy<td>Cel<td>Rozstrzygnięta<td><td><td><td><td>
            </thead>
            <tr><td>1<td>154351<td>5265<td>TB<td>19/466<td>Dąbrowski<td>Martin<td>1985-05-20<td>2019-05-31<td>Utworzenie KP<td>Nie<td><button class="dokumenty-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_dokumentami.html'">Dokumenty</button><td><button class="decyzje-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_decyzjami.html'">Decyzje</button><td><button class="wyswietl-zarzadzanie-sprawami" onclick="window.location.href='przegladanie_sprawy.html'">Wyświetl</button><td><button class="edytuj-zarzadzanie-sprawami">Edytuj</button><td><button class="usun-zarzadzanie-sprawami">Usuń</button>
            <tr><td>2<td>325345<td>3541<td>WB<td>19/423<td>Kowalski<td>Daniel<td>1955-09-20<td>2019-05-31<td>Duplikat KP<td>Nie<td><button class="dokumenty-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_dokumentami.html'">Dokumenty</button><td><button class="decyzje-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_decyzjami.html'">Decyzje</button><td><button class="wyswietl-zarzadzanie-sprawami" onclick="window.location.href='przegladanie_sprawy.html'">Wyświetl</button><td><button class="edytuj-zarzadzanie-sprawami">Edytuj</button><td><button class="usun-zarzadzanie-sprawami">Usuń</button>
            <tr><td>3<td>526452<td>5134<td>ZT<td>19/563<td>Nowak<td>Joanna<td>1965-03-20<td>2019-05-31<td>Utworzenie KP<td>Tak<td><button class="dokumenty-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_dokumentami.html'">Dokumenty</button><td><button class="decyzje-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_decyzjami.html'">Decyzje</button><td><button class="wyswietl-zarzadzanie-sprawami" onclick="window.location.href='przegladanie_sprawy.html'">Wyświetl</button><td><button class="edytuj-zarzadzanie-sprawami">Edytuj</button><td><button class="usun-zarzadzanie-sprawami">Usuń</button>
            <tr><td>4<td>321000<td>3123<td>VF<td>19/432<td>Horak<td>Maria<td>1983-04-20<td>2019-05-31<td>Utworzenie KP<td>Tak<td><button class="dokumenty-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_dokumentami.html'">Dokumenty</button><td><button class="decyzje-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_decyzjami.html'">Decyzje</button><td><button class="wyswietl-zarzadzanie-sprawami" onclick="window.location.href='przegladanie_sprawy.html'">Wyświetl</button><td><button class="edytuj-zarzadzanie-sprawami">Edytuj</button><td><button class="usun-zarzadzanie-sprawami">Usuń</button>
            <tr><td>5<td>543154<td>3242<td>TB<td>19/653<td>Smith<td>Andrew<td>1995-03-20<td>2019-05-31<td>Utworzenie KP<td>Nie<td><button class="dokumenty-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_dokumentami.html'">Dokumenty</button><td><button class="decyzje-zarzadzanie-sprawami" onclick="window.location.href='zarzadzanie_decyzjami.html'">Decyzje</button><td><button class="wyswietl-zarzadzanie-sprawami" onclick="window.location.href='przegladanie_sprawy.html'">Wyświetl</button><td><button class="edytuj-zarzadzanie-sprawami">Edytuj</button><td><button class="usun-zarzadzanie-sprawami">Usuń</button>
        </table>
    </div>
</body>

</html>
