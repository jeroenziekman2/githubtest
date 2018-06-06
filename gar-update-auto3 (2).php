<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    auto wijzigen in de tabel
    klant van de database garage.
</p>
<?php
//klantgegevens uit het formulier halen
$autokenteken           = $_POST["autokentekenvak"];
$automerk         = $_POST["automerkvak"];
$autotype       = $_POST["autotypevak"];
$autokmafstand     = $_POST["autokmafstandvak"];
$klantid       = $_POST["klantidvak"];

// update klantgegevens
require_once "gar-connect.php";

$sql = $conn->prepare("
                                                  UPDATE auto SET
                                                                  autokenteken         = :autokenteken,
                                                                  automerk        = :automerk, 
                                                                  autotype     = :autotype, 
                                                                  autokmafstand       = :autokmafstand
                                                                  WHERE klantid     = :klantid
                                 ");
$sql->execute
([
    "autokenteken"       => $autokenteken,
    "automerk"     => $automerk ,
    "autotype"    => $autotype ,
    "autokmafstand" => $autokmafstand,
    "klantid"   => $klantid
]);

echo "De auto is gewijzigd. <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>