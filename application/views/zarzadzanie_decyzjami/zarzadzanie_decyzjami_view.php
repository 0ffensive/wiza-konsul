<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Decyzje sprawy</title>
        <meta name="decription" content="...">
        <meta name="keywords" content="...">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/k_zarzadzanie_decyzjami.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
			<h1>Decyzje rozstrzygające sprawę</h1>
			<form method="post" action="<?php echo site_url('linki/do_zarzadzanie_sprawami'); ?>">
				<input type="submit" value="Cofnij">
			</form>
            <div class="inside-container">
                <table id="decyzje-sprawy">
                    <thead>
                        <td>L.p. <td>Decyzja <td>Data wydania <td>Wydana przez <td>Uzasadnienie
                    <tbody>
                    
                    <?php
                        $lp = 1;
                        foreach($decyzje as $key => $value){
                            echo '<tr>
                                <td>'.$lp.'
                                <td>'.$value->rodzaj.'
                                <td>'.$value->data_wydania.' 
                                <td>'.$value->wydajacy.' 
                                <td>'.$value->uzasadnienie;
                            $lp += 1;
                        }
                    ?>
                </table>
				<form method="post" action="<?php echo site_url('linki/do_dodawanie_decyzji'); ?>">
					<input type="submit" value="Dodaj nową decyzję">
				</form>
            </div>
        </div>
    </body>
</html>

