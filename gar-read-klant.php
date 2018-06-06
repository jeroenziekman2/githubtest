<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>garage read klant</h1>
<p>dit zijn alle gegevens uit de tabel klant can de database garage</p>

<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18-4-2018
 * Time: 11:43
 */
require_once "gar-connect.php";
$sql = $conn->prepare("select              klantid,
                                                    klantnaam,
                                                    klantadres,
                                                    klantpostcode,
                                                    klantplaats
                                                    from klant");
$sql->execute();

echo"<table>";
foreach ($sql as $rij){

    echo "<tr>";
    echo"<td>" . $rij["klantid"] . "</td>";
    echo"<td>" . $rij["klantnaam"] . "</td>";
    echo"<td>" . $rij["klantadres"] . "</td>";
    echo"<td>" . $rij["klantpostcode"] . "</td>";
    echo"<td>" . $rij["klantplaats"] . "</td>";
}
echo"</table>";
echo "<a href = 'gar-menu.php'> terug naar het menu</a>"
?>
</body>
</html>
