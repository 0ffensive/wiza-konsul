<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Dokumenty sprawy</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/k_zarzadanie_dokumentami.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <header>e-Konsulat</header>
    <div class="container">
		<h1>Dokumenty sprawy</h1>
		<form method="post" action="<?php echo site_url('linki/do_zarzadzanie_sprawami'); ?>">
			<input type="submit" value="Cofnij">
		</form>
        <div class="inside-container">
            <table>
                <thead>
                    <td>L.p. <td>Nazwa <td>Data dodania <td> <td>
                <tbody>
                    <tr>
                        <td>1 <td>Zdjęcie <td>2019-11-21 <br> 12:45:54<td><button>Podgląd</button> <td><button>Usuń</button>
                    <tr>
                        <td>2 <td>Poświadczenie zdania egzaminu z języka polskiego <td>2019-11-24 <br> 12:47:34 <td><button>Podgląd</button> <td><button>Usuń</button>
            </table>
            <div>
				<form method="post" action="<?php echo site_url('linki/do_dodawanie_dokumentu'); ?>">
					<input type="submit" value="Dodaj nowy">
				</form>
				<form method="post" action="<?php echo site_url('linki/do_zalaczanie_z_istniejacych'); ?>">
					<input type="submit" value="Załącz z istniejących">
				</form>
			</div>
        </div>
	</div>
	
	<div id="doc-preview">
		<img src="<?php echo base_url(); ?>images/Karta_Polaka_-_wniosek_wzór_strona_1.png">
		<i id="exit" class="far fa-times-circle"></i>
	</div>	
</body>

</html>
