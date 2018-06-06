<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
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
$sql = $conn->prepare("select              autokenteken,
                                                    automerk,
                                                    autotype,
                                                    autokmafstand,
                                                    klantid
                                                    from auto");
$sql->execute();

echo"<table>";
foreach ($sql as $rij){

    echo "<tr>";
    echo"<td>" . $rij["autokenteken"] . "</td>";
    echo"<td>" . $rij["automerk"] . "</td>";
    echo"<td>" . $rij["autotype"] . "</td>";
    echo"<td>" . $rij["autokmafstand"] . "</td>";
    echo"<td>" . $rij["klantid"] . "</td>";
}
echo"</table>";
echo "<a href = 'gar-menu.php'> terug naar het menu</a>"
?>
</body>
</html>
