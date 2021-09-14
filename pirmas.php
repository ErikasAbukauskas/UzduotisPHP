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

function pridetiElementa(){
   if(isset($_GET["elementas"]) && !empty($_GET["elementas"])) {

    $elementas = $_GET["elementas"];

    //neturetu buti tuscias. T.y tuscias tik tol kol nera sausainuko
    //kai sausainiukas yra, sitas elementas turetu buti sausainiuko reiksme paversta i masyva

    if(isset($_cookie["elementas"])) {
        $elementuMasyvas = explode("|", $_COOKIE["elementas"]);

    } else {
        $elementuMasyvas = array();
    }
    
    array_push( $elementuMasyvas, $elementas );


    //masyva isaugotas i COOKIE. I cookie mes galime isaugoti tikrai teksta
    //explode - pavercia teksta i masyva
    //implode - funkcija masyva pavercia i teksta

    setcookie("elementas",implode("|", $elementuMasyvas), time() + 3600, "/");
    echo $_COOKIE["elementas"];

   }
}
    

    //toks kodas veikia tik paspaudus mygtuka
    if(isset($_GET["prideti"])) {
        pridetiElementa();
    }


?>
</body>
</html>