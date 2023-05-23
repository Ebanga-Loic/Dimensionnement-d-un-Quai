<!DOCTYPE html>
<html>

<head>
    <title>Formulaire de saisie</title>
</head>

<body>
    <div class="container">
        <h1>Formulaire de saisie</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="Lp">Longueur de la dalle de couronnement :</label>
            <input type="text" id="Lp" name="Lp" required>

            <label for="tpk">Surcharge uniformément répartie :</label>
            <input type="text" id="tpk" name="tpk" required>

            <label for="l">Longueur du quai :</label>
            <input type="text" id="l" name="l" required>

            <label for="lp">Largeur de la dalle de couronnement :</label>
            <input type="text" id="lp" name="lp" required>

            <label for="hp">Hauteur de la dalle de couronnement :</label>
            <input type="text" id="hp" name="hp" required>

            <label for="h1">Valeur de la marée haute :</label>
            <input type="text" id="h1" name="h1" required>

            <label for="h2">Valeur de la marée basse :</label>
            <input type="text" id="h2" name="h2" required>

            <label for="mb">Masse de bollard :</label>
            <input type="text" id="mb" name="mb" required>

            <label for="t">Effort d’accostage :</label>
            <input type="text" id="t" name="t" required>

            <label for="n">Nombre de palplanches :</label>
            <input type="text" id="n" name="n" required>

            <label for="e">Epaisseur :</label>
            <input type="text" id="e" name="e" required>

            <label for="m">Masse de 1 mètre de palplanche :</label>
            <input type="text" id="m" name="m" required>

            <label for="b">Largeur :</label>
            <input type="text" id="b" name="b" required>

            <label for="z1">Hauteur de la 1ère couche de terrain :</label>
            <input type="text" id="z1" name="z1" required>

            <label for="z2">Hauteur de la 2ème couche de terrain :</label>
            <input type="text" id="z2" name="z2" required>

            <label for="f">Fiche totale :</label>
            <input type="text" id="f" name="f" required>

            <input type="submit" value="Calculer">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Lp = floatval($_POST["Lp"]);
        $Tpk = floatval($_POST["tpk"]);
        $L = floatval($_POST["l"]);
        $lp = floatval($_POST["lp"]);
        $hp = floatval($_POST["hp"]);
        $h1 = floatval($_POST["h1"]);
        $h2 = floatval($_POST["h2"]);
        $mb = floatval($_POST["mb"]);
        $n = floatval($_POST["n"]);
        $e = floatval($_POST["e"]);
        $m = floatval($_POST["m"]);
        $b = floatval($_POST["b"]);
        $z1 = floatval($_POST["z1"]);
        $z2 = floatval($_POST["z2"]);
        $f = floatval($_POST["f"]);

        $ybeton = 2.5;
        $yw = 1.03;
        $gw = 10;

        $p = $mb / $L;

        $e=($h1+$h2)/2;
        $rho=$yw*$e;

        echo "<p>La valeur Effort d’amarrage est = " . $p . "</p>";

        if($h1>=0 && $h2<0){
            $p1=$h1*$e*$rho;
            $b1=((1/3)*$h1*$z2);

            echo "<p>La valeur de M1 est = " . $p1 . "(".$b1 ."+ f )</p>";

            $p2=$rho*$z2;
            $b2=(($z2/2)*$h1*$z2);

            echo "<p>La valeur de M2 est = " . $p2 . "(".$b2 ."+ f )</p>";

        }

        if($h1>=0 && $h2>=0){
            $p1=$h1*$e*$rho;
            $b1=((1/3)*$h1*$z2);

            echo "<p>La valeur de M1 est = " . $p1 . "(".$b1 ."+ f )</p>";

            $p2=$rho*($z2+$h2);
            $b2=($z2/2);

            echo "<p>La valeur de M2 est = " . $p2 . "(".$b2 ."+ f )</p>";

        }
        echo "<p>La valeur de la surchage uniformément répartie est = " . $Tpk . " t/m²</p>";
        $gw = 10;
        echo "<p>La valeur de la poussée hydrostatique d'eau est = " . $gw . " KN/m3</p>";
        $Pdalle=$Lp*$lp*$hp*$ybeton;

        $Ppalplanche=$n*$e*$b*$m;

        echo "<p>La valeur Poids de dalle de couronnement est = " . $Pdalle . "</p>";

        echo "<p>La valeur Poids des palplanches est = " . $Ppalplanche . "</p>";

    }
    ?>

</body>

</html>