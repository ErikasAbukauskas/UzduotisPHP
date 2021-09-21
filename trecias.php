<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Susikurti asociatyvų masyvą "Klientai".
    Kintamieji:
    vardas
    pavarde
    asmens kodas
    prisijungimo data
    adresas
    elpastas.

    Masyve turi būti 200 klientų. Duomenis užpildyti savo nuožiūrą.
    Visą "Klientai" objektų masyvą atvaizduoti lentelėje <table>.
    Visas klientų masyvas saugomas COOKIE. 

    Papildomai: Sukurti galimybę pridėti klientą į masyvą bei ištrinti.-->

</head>
<body>

    <form action="index.php" method="get">

        <input type="text" value="101" name="id"/>
        <input type="text" value="naujas_vardas" name="vardas"/>
        <input type="text" value="nauja_pavarde" name="pavarde"/>
        <input type="text" value="naujas_asmens_kodas" name="asmens_kodas"/>
        <input type="text" value="nauja_prisijungimo_data" name="prisijungimo_data"/>
        <input type="text" value="naujas_adresas" name="adresas"/>
        <input type="text" value="naujas_elpastas" name="elpastas"/>

        <button type="submit" name="patvirtinti"> Patvitinti </button>

    </form>

    <form action="index.php" method="get">
        <input type="text" value="1" name="t_id"/>
        <button type="submit" name="trinti"> Trinti </button>

    </form>

<?php 

    if(isset($_GET["trinti"])) {
        $t_id = $_GET["t_id"];

        if(isset($_COOKIE["klientai"])) {
            $klientai = $_COOKIE["klientai"];

        
            $klientai = explode("|", $klientai);


            if(isset($klientai[$t_id])) { 
            unset($klientai[$t_id]); 

            }

            $klientai_tekstas = implode("|", $klientai);
            setcookie("klientai", $klientai_tekstas, time() + 3600, "/");

            header("Location: index.php");

        }

        echo "Trinamo elemento id: " . $t_id;
    }


    if(isset($_GET["patvirtinti"])) {

        $id = $_GET["id"];
        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $asmens_kodas = $_GET["asmens_kodas"];
        $prisijungimo_data = $_GET["prisijungimo_data"];
        $adresas = $_GET["adresas"];
        $elpastas = $_GET["elpastas"];

        $klientai_tekstas = $_COOKIE["klientai"] . "|$id,$vardas,$pavarde,$asmens_kodas,$prisijungimo_data,$adresas,$elpastas";


        setcookie("klientai", $klientai_tekstas, time() + 3600, "/");

        header("Location: index.php");

    }


    if(!isset($_COOKIE["klientai"])) {

        $klientai = array ();

        for($i=0; $i < 7; $i++) {
           
            $klientas = array (

                "id" => $i + 1,
                "vardas" => "vardas" .($i + 1),
                "pavarde" => "pavarde" .($i + 1),
                "asmens_kodas" => rand(3, 6).rand(0,99).rand(1,12).rand(1,31).rand(0,9999),
                "prisijungimo_data" => rand(1950, 2021). "-". rand(1,12). "-" .rand(1,31),
                "adresas" => "adresas" .($i + 1),
                "elpastas" => "vardas".($i + 1)."pavarde".($i + 1)."@pastas.lt"
            );

            array_push($klientai, $klientas);
        }
        
    } else {

        $klientai = $_COOKIE["klientai"];

        $klientai = explode("|", $klientai);

        for($i = 0; $i < count($klientai); $i++) {
            $klientai[$i] = explode("," , $klientai[$i]); 
        }
    }

    echo "<table>";



        $indeksas = 0;

        foreach($klientai as $eilute) {
    
            echo "<tr>";

                echo "<td>";
                echo $indeksas;
                echo "</td>";

                foreach($eilute as $stulpelis) {

                    echo "<td>";

                        echo $stulpelis;

                    echo "</td>";
                }

            echo "</tr>";
            $indeksas++;
            
        }

    echo "</table>";

    for($i = 0; $i < count($klientai); $i++) {
        $klientai[$i] = implode(",",$klientai[$i]); 
    }

    $klientai_tekstas = implode("|",$klientai);

    if(!isset($_COOKIE["klientai"])) {
        setcookie("klientai", $klientai_tekstas, time() + 3600, "/");
    }

?> 
    
</body>
</html>