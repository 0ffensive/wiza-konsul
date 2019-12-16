<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Dokumenty sprawy</title>
    <meta name="decription" content="...">
    <meta name="keywords" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/k_zarzadanie_dokumentami.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>Dokumenty sprawy</h1>
        <div class="inside-container">
            <table>
                <thead>
                    <td>Id <td>Nazwa <td>Data dodania <td>Podgląd <td>
                <tbody>
                    <tr>
                        <td>1 <td>zdjecie.jpg <td>21.11.2019 <td><a href="#">link</a> <td><button>usuń</button>
                    <tr>
                        <td>2 <td>certyfikat.pdf <td>24.11.2019 <td><a href="#">link</a> <td><button>usuń</button>
            </table>
            <div>
                <button onclick="window.location.href='dodawanie_dokumentu.html'">Dodaj nowy</button>
                <button onclick="window.location.href='zalaczanie_z_istniejacych.html'">Załącz z istniejących</button>
            </div>
        </div>
    </div>
</body>

</html>
