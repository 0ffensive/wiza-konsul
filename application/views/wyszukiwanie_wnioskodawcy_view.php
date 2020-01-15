<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Wyszukiwanie wnioskodawcy</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/wyszukiwanie_wnioskodawcy.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Wyszukaj profil wnioskodawcy</h1>
		<div class="wyszukaj-wnioskodawce">
            <form>
                <label for="#id-w">ID wnioskodawcy</label>
                <input type="text" id="id-w">
				<label for="#nazwisko-w">Nazwisko</label>
                <input type="text" id="nazwisko-w">
                <label for="#imie-w">Imię</label>
                <input type="text" id="imie-w">
                <label for="#data-urodzenia-w">Data urodzenia</label>
                <input type="date" id="data-urodzenia-w">
                <button id="wyszukaj-profil-nowa-sprawa">Wyszukaj</button>
                <button id="wyczysc-nowa-sprawa">Wyczyść</button>  
            </form>
                         
            <table id="wyszukane-profile">
                <thead> 
                    <td>ID<td>Nazwisko<td>Imię<td>Data urodzenia<td>
                <tbody>
                    <tr>
                        <td>35145<td>Kowalski<td>Jan<td>1963-06-23<td><button>Wybierz</button>
			</table>
			<div>
				<i class="fas fa-angle-left"></i>
				<i class="fas fa-angle-right"></i>
			</div>
        </div>
    </div>
</body>
</html>
