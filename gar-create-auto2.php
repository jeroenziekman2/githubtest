<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-auto2</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    Een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php

$autokenteken       = $_POST["autokentekenvak"]; //komt niet uit her formulier
$automerk       = $_POST["automerkvak"];
$autotype        = $_POST["autotypevak"];
$autokmafstand    = $_POST["autokmafstandvak"];
$klantid        = $_POST["klantidvak"];


require_once "gar-connect.php";

$sql = $conn->prepare("INSERT INTO auto VALUES(:autokenteken, :automerk, :autotype, :autokmafstand, :klantid)");

$sql->execute([
    "autokenteken"       => $autokenteken,
    "automerk"     => $automerk,
    "autotype"    => $autotype,
    "autokmafstand" => $autokmafstand,
    "klantid"    => $klantid
]);

echo "De auto is toegevoegd <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>