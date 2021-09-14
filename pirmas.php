<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="pirmas.php" method="get">
<input type="text" name="elementas">
<button type="submit" name="prideti">Pridėti elementą</button>
<br>
    </form>


<?php

// 1. Sukurkite funkciją, kurią iškvietus, masyvą galima papildyti norimu elementu. 
// Masyvas išsaugomas į COOKIE.
// Informacija paimama iš input laukelio. Funkcija iškviečiama paspaudus mygtuką.

function skaiciavimoFunkcija(){
    if(isset($_GET["elementas"]) && !empty($_GET["elementas"])) {
    $elementas=$_GET["elementas"];
    $rezultatas=$elementas;

    if (isset($_COOKIE["elementas"])) {
    $elementuMasyvas=explode("|", $_COOKIE["elementas"]);
    echo $_COOKIE["elementas"];
} else {
  $elementuMasyvas=array();  
}

array_push($elementuMasyvas, $elementas);

setcookie("elementas", implode("|", $elementuMasyvas), time()+3600, "/");

    } else {
        echo $_COOKIE["elementas"];
        $rezultatas= "Laukelis tuščias.";
    }

    echo "<br>Jūs pridėjote:<br>";
    echo $rezultatas;
   

}

if (isset($_GET["prideti"])){
    skaiciavimoFunkcija();

}







?>
</body>
</html>