<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" action="get">
<button type="submit" name="patvirtinti">Sukurti elementa</button>
</form>



<?php
// 2. Sukurkite funkciją, kuri mygtuko paspaudimu, sukuria div elementą su klase "elementas-{index}". {index} = elemento numeris

function sukurimas (){
    if (!isset($_COOKIE["skaitiklis"])){
        $skaitiklis=1;
        echo "<div class='Elementas-0'>Elementas-0</div>";

    } else {
        
        $skaitiklis=intval($_COOKIE["skaitiklis"]);
        $skaitiklis++;


        for ($i=0; $i<$skaitiklis; $i++){
        echo "<div class='Elementas-".$i."'>Elementas-".$i."</div>";
        }
}
        setcookie("skaitiklis", $skaitiklis, time() +3600, "/");

    }



if (isset($_GET["patvirtinti"])){
    sukurimas();
   
    }


?>
</body>
</html>