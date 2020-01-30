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
            <h1>Dodawanie decyzji</h1>
            <form id="dodawanie-decyzji" method="post" action="<?php echo site_url('zarzadzanie_decyzjami/dodawanie_decyzji'); ?>">
                <div class="inside-container">
                    <label for="#decyzja">Decyzja</label>
                    <select id="rodzaj" name="rodzaj">
                        <option value="" hidden>Wybierz</option>
                        <option value="Pozytywny" <?php echo (set_value('rodzaj') == NULL? "" : (set_value('rodzaj') == "Pozytywny" ? "selected" : "" )); ?>>Pozytywna</option>
                        <option value="Negatywny" <?php echo (set_value('rodzaj') == NULL? "" : (set_value('rodzaj') == "Negatywny" ? "selected" : "" )); ?>>Negatywna</option>
                        <option value="Do uzupełnienia" <?php echo (set_value('rodzaj') == NULL? "" : (set_value('rodzaj') == "Do uzupełnienia" ? "selected" : "" )); ?>>Do uzupełnienia</option>
                    </select>
                    <?php echo form_error('rodzaj','<div class="error-message">*','</div>');?>
                    <label for="#uzasadnienie">Uzasadnienie</label>
                    <textarea rows="5" id="uzasadnienie" name="uzasadnienie" maxlength="255"><?php echo set_value('uzasadnienie')?></textarea>
                </div>
                <div>
					<input type="submit" name="submit" value="Zatwierdź">
				    <input type="submit" name="submit" value="Anuluj">
                </div>
            </form>

        </div>
    </body>
</html>
