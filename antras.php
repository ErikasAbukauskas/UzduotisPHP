<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="antras.php" method="get">
    <button type="submit" name="patvirtinti">Sukurti elementa</button>
</form>

<?php
// 2. Sukurkite funkciją, kuri mygtuko paspaudimu, sukuria div elementą su klase "elementas-{index}". {index} = elemento numeris
//tokiu principu susikuria elementas-1, elementas-2 ir t.t

    function sukurtiElementa() {
        
        //reikes panaudoti cookies, nes be jo svetaine automatiskai periskrauna ir kintamieji netenka reiksmes
        //o masyvai tampa tusti
        // tikslas kad paspaudus mygtuka susikuria elementas
        //paspaudziame mygtuka, pasipildo masyvas, masyvas isiraso i cookie
        //kito paspaudimo metu pasiemama sena cookie reiksme ir porcesas kartojasi

        //jeigu sita mygtuka isivaizduotume kaip skaitikli
        //kiekviena karta paspaudes mygtuka prie kazkokio kintamojo pridesiu +1
        // ir sita reiksme irasysiu i cookie

        if(!isset($_COOKIE["skaitiklis"])) {

            $skaitiklis = 1;

            echo "<div class = 'elementas0'>";
            echo "Elementas0";
            echo "</div>";

        } else {

            $skaitiklis = intval($_COOKIE["skaitiklis"]);
            $skaitiklis++;

            for($i =0; $i < $skaitiklis; $i++) {
                echo "<div class = 'elementas".$i."'>";
                echo "Elementas".$i;
                echo "</div>";
            }
        }
       
        setcookie("skaitiklis", $skaitiklis, time() + 3600, "/");
        // return "Labas";
    }

       



    if(isset($_GET["patvirtinti"])) {
        sukurtiElementa();
    }


?>
</body>
</html>