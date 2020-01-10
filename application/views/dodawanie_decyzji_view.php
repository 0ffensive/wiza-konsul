<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Dodaj decyzję</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/k_dodawanie_decyzji.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Dodaj decyzję</h1>
            <form id="dodawanie-decyzji" method="post" action="<?php echo site_url('zarzadzanie_decyzjami/dodawanie_decyzji'); ?>">
                <div class="inside-container">
                    <label for="#decyzja">Decyzja</label>
                    <select id="decyzja">
                        <option>Wybierz decyzję</option>
                        <option value="pozytywna">pozytywna</option>
                        <option value="negatywna">negatywna</option>
                        <option value="do-uzupelnienia">do uzupełnienia</option>
                    </select>
                    <label for="#uzasadnienie">Uzasadnienie</label>
                    <textarea id="uzasadnienie"></textarea>
                </div>
                <div>
					<input id="submit" name ="submit" type="submit" value="Dodaj">
                	<input id="reset" name ="reset" type="submit" value="Anuluj">
                </div>
            </form>

        </div>
    </body>
</html>
