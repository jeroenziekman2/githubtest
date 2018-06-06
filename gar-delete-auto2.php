<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-delete-auto2.php</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1> Garage delete auto 2</h1>
<p> Op autokenteken gegevens zoeken uit de tabel auto van de database garage zodat ze verwijdered kunnen worden.</p>
<?php
// autokenteken uit het formulier halen ---------------------------------
$autokenteken = $_POST["autokentekenvak"];

//auto gevens uit de tabel halen -----------------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("select autokenteken, automerk, autotype, autokmafstand, klantid from auto where autokenteken = :autokenteken");
$autos-> execute(["autokenteken" => $autokenteken]);

//autogegevens laten zien -------------------------------------------

echo "<table>";
foreach($autos as $auto){
    echo "<tr>";
    echo "<td>" . $auto ["autokenteken"] . " </td>";
    echo "<td>" . $auto ["automerk"] . " </td>";
    echo "<td>" . $auto ["autotype"] . " </td>";
    echo "<td>" . $auto ["autokmstand"] . " </td>";
    echo "<td>" . $auto ["klantid"] . " </td>";
    echo "</tr>";
}
echo "</table><br/>";

echo "<form action='gar-delete-auto3.php' method='post'>";
//autokenteken mag niet meer gewijzigd worden
echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
//waarde o doorgegeven als er niet gechect wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "verwijder deze auto. <br />";
echo "<input type='submit'>";
echo "</form>";


?>
</body>
</html>