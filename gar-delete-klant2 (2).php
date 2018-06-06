<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-delete-klant2.php</title>
</head>
<body>
    <h1> Garage delete klant 2</h1>
    <p> Op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijdered kunnen worden.</p>
    <?php
        // klantid uit het formulier halen ---------------------------------
        $klantid = $_POST["klantidvak"];

        //klantgegevens uit de tabel halen -----------------------------------
        require_once "gar-connect.php";

        $klanten = $conn->prepare("select klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid = :klantid");
        $klanten-> execute(["klantid" => $klantid]);

        //klantgegevens laten zien -------------------------------------------

    echo "<table>";
    foreach($klanten as $klant){
        echo "<tr>";
        echo "<td>" . $klant ["klantid"] . " </td>";
        echo "<td>" . $klant ["klantnaam"] . " </td>";
        echo "<td>" . $klant ["klantadres"] . " </td>";
        echo "<td>" . $klant ["klantpostcode"] . " </td>";
        echo "<td>" . $klant ["klantplaats"] . " </td>";
        echo "</tr>";
    }
    echo "</table><br/>";

    echo "<form action='gar-delete-klant3.php' method='post'>";
    //klantid mag niet meer gewijzigd worden
    echo "<input type='hidden' name='klantidvak' value=$klantid>";
    //waarde o doorgegeven als er niet gechect wordt
    echo "<input type='hidden' name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "verwijder deze klant. <br />";
    echo "<input type='submit'>";
    echo "</form>";


    ?>
</body>
</html>