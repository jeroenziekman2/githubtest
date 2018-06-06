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
<h1>garage update auto2</h1>
<p>op dit formulier gebruikt de klant om zijn data te wijzigen in de tabel auto van de database garage </p>
<?php
// klantid uit het formulier halen
$klantid = $_POST["klantidvak"];

// klantgegevans uit de tabel halen
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmafstand, klantid FROM auto WHERE klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens in een nieuw formulier laten zien
echo "<form action='gar-update-auto3%20(2).php' method='post'>";
foreach ($klanten as $klant)
{
    // klantid mag niet gewijzigd worden
    echo " autokenteken:";
    echo " <input type='text' name='autokentekenvak' ";
    echo " value=' " . $klant["autokenteken"] . " '> <br />";

    echo "automerk: <input type='text' ";
    echo "name = 'automerkvak' ";
    echo "value = '" .$klant["automerk"]. "' ";
    echo "> <br />";

    echo "autotype: <input type='text' ";
    echo "name = 'autotypevak' ";
    echo "value = '" .$klant["autotype"]. "' ";
    echo "> <br />";

    echo "autokmafstand: <input type='text' ";
    echo "name = 'autokmafstandvak' ";
    echo "value = '" .$klant["autokmafstand"]. "' ";
    echo "> <br />";

    echo "klantid: <input type='text' ";
    echo "name = 'klantidvak' ";
    echo "value = '" .$klant["klantid"]. "' ";
    echo "> <br />";
}
echo "<input type='submit'>";
echo "</form>";
?>