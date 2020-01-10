<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Raport</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/i_raport.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
        
        <style>@page { size: A4 }</style>
    </head>

    <body class="A4">
        <div id="opcje-raport">
            <button id="drukuj-raport">Drukuj raport</button>
            <button id="zapisz-raport">Zapisz raport</button>            
        </div>


        <section class="sheet padding-10mm">

        <div id="data">2019-10-13 16:14:54</div>
        <h1>Raport</h1>
        <table id="info">
            <tr><td><b>Identyfikator raportu</b><td>2019/451
			<tr><td><b>Identyfikator administratora generującego</b><td>2341
            <tr><td><b>Przedział czasowy</b><td>1 dzień
            <tr><td><b>Łączna liczba przesyłek</b><td>132
            <tr><td><b>Typ zawartości przesyłek</b><td>Sprawy   
            <tr><td><b>Liczba placówek</b><td>4
            <tr><td><b>Symbole placówek</b><td>WX<br>WZ<br>TZ<br>TB    
        </table>

        <table id="dane">
            <thead><td>Symbol jednostki<td>Liczba przesyłek<td>Minimalna wielkość przesyłki<td>Maksymalna wielkość przesyłki<td>Średnia wielkość przesyłki</thead>
            <tr><td>TB<td>43<td>13<td>43<td>25.6
            <tr><td>TZ<td>21<td>21<td>21<td>25.5
            <tr><td>WX<td>32<td>14<td>32<td>25.1
            <tr><td>WZ<td>36<td>21<td>54<td>34.6
        </table>

        <div id="numer">strona 1 / 1</div>

        </section>
    
    
    </body>
      
</html>
