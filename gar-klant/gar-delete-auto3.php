<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gar-delete-auto3.php</title>
</head>
<body>
<h1>garage delete auto 3</h1>
<p>
    Op autokenteken gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd worden.
</p>

<?php
// gegevens uit het formulier halen --------------------------
$autokenteken = $_POST{"autokentekenvak"};
$verwijderen = $_POST ["verwijdervak"];

// autogegevens verwijderen --------------------------
if($verwijderen){
    require_once "gar-connect.php";

    $sql = $conn->prepare("delete from auto where autokenteken = :autokenteken");
    $sql->execute(["autokenteken" => $autokenteken]);

    echo "De gegevens zijn verwijderd. <br />";
}
else{
    echo "De gegevens zijn niet verwijderd. <br />";
}
echo "<a href='gar-menu.php'>terug naar het menu </a>"
?>
</body>
</html>