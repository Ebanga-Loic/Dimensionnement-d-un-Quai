<!DOCTYPE html>
<html>

<head>
    <title>Calcul des forces sur un navire</title>
</head>

<body>
    <div class="container">
        <h2>Calcul des forces sur un navire</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="longueur_navire">Longueur du navire (L) :</label>
            <input type="text" id="longueur_navire" name="longueur_navire" required>

            <label for="largeur_navire">Largeur du navire (l) :</label>
            <input type="text" id="largeur_navire" name="largeur_navire" required>

            <label for="tirant_eau">Tirant d’eau (t) :</label>
            <input type="text" id="tirant_eau" name="tirant_eau" required>

            <label for="coefficient_prismatique">Coefficient prismatique (α=0,65 ou 0,7) :</label>
            <select name="coefficient_prismatique" id="coefficient_prismatique">
                <option selected>0.65</option>
                <option>0.7</option>
            </select>
            <!--<input type="number" id="coefficient_prismatique" name="coefficient_prismatique" required>-->

            <label for="masse_volumique_eau">Masse volumique de l'eau de mer :</label>
            <input type="text" id="masse_volumique_eau" name="masse_volumique_eau" value="1.03" readonly>

            <label for="vitesse_eau">Vitesse de l'eau (V) :</label>
            <input type="text" id="vitesse_eau" name="vitesse_eau" value="0.25" readonly>

            <label for="gravite">Accélération de la gravité (g) :</label>
            <input type="text" id="gravite" name="gravite" value="9.8" readonly>

            <label for="diametre_interieur">Diamètre intérieur (Dint) :</label>
            <input type="text" id="diametre_interieur" name="diametre_interieur" required>

            <label for="diametre_exterieur">Diamètre extérieur (Dext) :</label>
            <input type="text" id="diametre_exterieur" name="diametre_exterieur" required>

            <label for="longueur_defense">Longueur de la défense (Ldef) :</label>
            <input type="text" id="longueur_defense" name="longueur_defense" required>

            <label for="pas_espacement_defense">Pas d'espacement de la défense (p) :</label>
            <input type="text" id="pas_espacement_defense" name="pas_espacement_defense" required>

            <button type="submit">Calculer</button>
        </form>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Récupération des valeurs
        $L = floatval($_POST['longueur_navire']);
        $l = floatval($_POST['largeur_navire']);
        $t = floatval($_POST['tirant_eau']);
        $alpha = floatval($_POST['coefficient_prismatique']);
        $rho = floatval($_POST['masse_volumique_eau']);
        $V = floatval($_POST['vitesse_eau']);
        $g = floatval($_POST['gravite']);
        $Dint = floatval($_POST['diametre_interieur']);
        $Dext = floatval($_POST['diametre_exterieur']);
        $Ldef = floatval($_POST['longueur_defense']);
        $p = floatval($_POST['pas_espacement_defense']);

        // Calcul du Déplacement du Navire
        $D =  $L * $l * $t * $alpha * $rho;

        //Calcul de l’Energie Cinétique totale du navire
        $En = (1 / 2) * ($D / $g) * ($V * $V);
        $Ee = (1 / 2) * ((pow($t, 2) * 3.14) / 4) * $L * ($rho / $g) * pow($V, 2);
        $Et = $En + $Ee;

        //Calcul de l’Energie absorbée par la défense
        $K1 = 0.6;
        $K2 = 0.8;
        $K3 = 1;
        $K = $K1 * $K2 * $K3;
        $Ed = $Et * $K;

        //Choix de la défense
        $d = ($Dext - $Dint) * number_format(0.90 * 100, 2);
        $Fa = (2 * $Ed) / $d;

        $F = 1.2 * $Fa;
        $F’ = $F / $p;


        // Affichage des résultats
        echo '<div class="deplacement">Le Déplacement du Navire est de : ' . $D . ' t.m</div>';
        echo '<div class="energie-cinetique">L’Energie Cinétique totale du navire est de : ' . $Et . ' t.m</div>';
        echo '<div class="energie-absorbee">L’Energie absorbée par la défense est de : ' . $Ed . ' t.m</div>';
        echo '<div class="choix-defense">Le Choix de la défense est de : ' . $F . ' t</div>';
        
    }

    ?>
<a href="effort.php">EFFORTS AGISSANT SUR LE QUAI</a>
</body>

</html>