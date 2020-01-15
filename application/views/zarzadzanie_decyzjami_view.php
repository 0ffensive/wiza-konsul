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
                <table>
                    <thead>
                        <td>Id <td>Decyzja <td>Data wydania <td>Wydana przez <td>Uzasadnienie
                    <tbody>
                        <tr>
                            <td>1 <td>Do uzupełnienia <td>21.11.2019 <td>Nowak Adam, 43 <td>Niepoprawne wymiary zdjęcia
                        <tr>
                            <td>2 <td>Do uzupełnienia <td>24.11.2019 <td>Nowak Adam, 43 <td>Niepoprawne wymiary zdjęcia znowu
				</table>
				<form method="post" action="<?php echo site_url('linki/do_dodawanie_decyzji'); ?>">
					<input type="submit" value="Dodaj nową decyzję">
				</form>
            </div>
        </div>
    </body>
</html>
