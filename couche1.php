<!DOCTYPE html>
<html>

<head>
	<title>Couche 1</title>
	

</head>

<body>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<?php
		$titre = "Vous êtes sur la couche 1";
		echo "<h1>" . $titre . "</h1>";
		?>
		<label for="value">Côte :</label>
		<input type="number" id="value0" name="value0" value="0" readonly><br><br>

		<label for="value1">Saisir une valeur positive pour la mesure :</label>
		<input type="text" id="value1" name="value1" min="1" required> (mètre)<br><br>

		<label for="position">Position de la couche :</label>
		<select name="position" id="position">
			<option value="position1">En dessous de la nappe phréatique</option>
			<option value="position2">En dessus de la nappe phréatique</option>
		</select>

		<h2>Insérez les valeurs dans le tableau :</h2>

		<table>
			<tr>
				<th>Hauteur de la couche :</th>
				<td><input type="text" name="element0">(mètre)</td>
			</tr>
			<tr>
				<th>Angle de frottement :</th>
				<td><input type="text" name="element1">(degré)</td>
			</tr>
			<tr>
				<th>Poids volumique émerge :</th>
				<td><input type="text" name="element2">(tonne/mètre cube)</td>
			</tr>
			<tr>
				<th>Poids volumique immergé :</th>
				<td><input type="text" name="element3">(tonne/mètre cube)</td>
			</tr>
		</table>

		<label for="surchage">Surchage Q :</label>
		<input type="text" id="surchage" name="surchage" min="1" required>(tonne/mètre carré)<br><br>


		<?php
		$titre = "Vous êtes sur la couche 2";
		echo "<h1>" . $titre . "</h1>";
		?>

		<label for="value1">Saisir une valeur positive pour la mesure :</label>
		<input type="text" id="value2-1" name="value2-1" min="1" required>(mètre)<br><br>
		<label for="value2">Saisir une autre valeur négative pour la mesure:</label>
		<input type="text" id="value2-2" name="value2-2" max="0" required>(mètre)<br><br>

		<label for="position">Position de la couche :</label>
		<select name="position2" id="position2">
			<option value="position2-1">En dessous de la nappe phréatique</option>
			<option value="position2-2">En dessus de la nappe phréatique</option>
		</select>

		<h2>Insérez les valeurs dans le tableau :</h2>

		<table>
			<tr>
				<th>Hauteur de la couche :</th>
				<td><input type="text" name="element2-0">(mètre)</td>
			</tr>
			<tr>
				<th>Angle de frottement :</th>
				<td><input type="text" name="element2-1">(degré)</td>
			</tr>
			<tr>
				<th>Poids volumique émerge :</th>
				<td><input type="text" name="element2-2">(tonne/mètre cube)</td>
			</tr>
			<tr>
				<th>Poids volumique immergé :</th>
				<td><input type="text" name="element2-3">(tonne/mètre cube)</td>
			</tr>
		</table>

		<?php
		$titre = "Vous êtes sur la couche 3";
		echo "<h1>" . $titre . "</h1>";
		?>

		<label for="value1">Saisir une valeur négative pour la mesure :</label>
		<input type="text" id="value3-1" name="value3-1" max="0" required>(mètre)<br><br>
		<label for="value">Mesure :</label>
		<input type="text" id="value3-2" name="value3-2" value="f" readonly><br><br>

		<label for="position">Position de la couche :</label>
		<select name="position3" id="position">
			<option value="position3-1">En dessous de la nappe phréatique</option>
			<option value="position3-2">En dessus de la nappe phréatique</option>
		</select>

		<h2>Insérez les valeurs dans le tableau :</h2>

		<table>

			<tr>
				<th>Angle de frottement :</th>
				<td><input type="text" name="element3-1">(degré)</td>
			</tr>
			<tr>
				<th>Poids volumique émerge :</th>
				<td><input type="text" name="element3-2">(tonne/mètre cube)</td>
			</tr>
			<tr>
				<th>Poids volumique immergé :</th>
				<td><input type="text" name="element3-3">(tonne/mètre cube)</td>
			</tr>
		</table>
		<label for="value1">Saisir une valeur de la limite elastique de l'acier :</label>
		<input type="text" id="sigmaE" name="sigmaE" required>(méga pascal)<br><br>



		<br>
		<input type="submit" name="submit" value="Calculer">
	</form>


	<?php
	// Récupération des valeurs de la couche 1
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$value0 = floatval($_POST["value0"]);
		$value1 = floatval($_POST["value1"]);
		$surchage = floatval($_POST["surchage"]);
		$sigmaE = floatval($_POST["sigmaE"]);
	}
	?>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Récupération des valeurs de la couche 1

		if (empty($_POST["element0"]) || empty($_POST["element1"]) || empty($_POST["element2"]) || empty($_POST["element3"])) {
			echo "<p>Veuillez saisir tous les éléments.</p>";
		} else {
			// Récupérer les éléments couche 1
			$element0 = floatval($_POST["element0"]);
			$element1 = floatval($_POST["element1"]);
			$element2 = floatval($_POST["element2"]);
			$element3 = floatval($_POST["element3"]);

			// Afficher les éléments dans un tableau couche 1
			echo "<h2>Les valeurs sont :</h2>";
			echo "<table>";
			echo "<tr><th>Hauteur de la couche </th><td>" . $element0 . "</td></tr>";
			echo "<tr><th>Angle de frottement</th><td>" . $element1 . "</td></tr>";
			echo "<tr><th>Poids volumique émerge</th><td>" . $element2 . "</td></tr>";
			echo "<tr><th>Poids volumique immergé</th><td>" . $element3 . "</td></tr>";
			echo "</table>";

			$angle_radians = deg2rad($element1); // convertir l'angle en radians
			$sin_value = sin($angle_radians); // calculer le sinus de l'angle en radians

			$ka = (1 - $sin_value) / (1 + $sin_value); //coefficient de poussée couche 1

			$kp = (1 + $sin_value) / (1 - $sin_value); //coefficient de butée couche 1
			echo "<p>le coefficient de poussée couche 1 est ka= " . $ka . "</p>";
			echo "<p>le coefficient de butée des terres couche 1 est kp= " . $kp . "</p>";
		}
	}
	?>

	<h2>Contraintes de poussées couche 1:</h2>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$position = $_POST['position'];
		if ($position == "position2") {
			$contpous0 = $ka * $element2 * $value0;
			$contpous1 = $ka * $element2 * $value1;

			echo "<p>la contrainte de poussée couche 1 𝜎ℎa1 = " . $contpous0 . "</p>"; //contrainte de poussée couche 1
			echo "<p>la contrainte de poussée  couche 1 𝜎ℎa2 = " . $contpous1 . "</p>"; //contrainte de poussée couche 1

		}
		if ($position == "position1") {
			$contpous0 = $ka * $element2 * $value0;
			$contpous1 = $ka * $element2 * $value1;
			$contpous2 = $ka * $element3 * $value0;
			$contpous3 = $ka * $element3 * $value1;

			echo "<p>la contrainte de poussée couche 1 𝜎ℎa1 est = " . $contpous0 . "</p>";
			echo "<p>la contrainte de poussée couche 1 𝜎ℎa2 est = " . $contpous1 . "</p>";
			echo "<p>la contrainte de poussée couche 1 𝜎ℎa3 est = " . $contpous2 . "</p>";
			echo "<p>la contrainte de poussée couche 1 𝜎ℎa4 est = " . $contpous3 . "</p>";
		}
	}
	?>

	<h2>Contraintes de poussées aux surcharges couche 1:</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($surchage)) {
			echo "<p>Veuillez saisir la surcharge.</p>";
		} else {
			$contsurch = $ka * $surchage;
			echo "<p>la contrainte de poussée aux surcharges couche 1 est = " . $contsurch . "</p>";
		}
	}
	?>




	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$value2_1 = floatval($_POST["value2-1"]);
		$value2_2 = floatval($_POST["value2-2"]);
	}
	?>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Vérifier si les éléments ont été saisis  couche 2

		if (empty($_POST["element2-0"]) || empty($_POST["element2-1"]) || empty($_POST["element2-2"]) || empty($_POST["element2-3"])) {
			echo "<p>Veuillez saisir tous les éléments.</p>";
		} else {
			// Récupérer les éléments couche 2
			$element2_0 = floatval($_POST["element2-0"]);
			$element2_1 = floatval($_POST["element2-1"]);
			$element2_2 = floatval($_POST["element2-2"]);
			$element2_3 = floatval($_POST["element2-3"]);

			// Afficher les éléments dans un tableau couche 2
			echo "<h2>Les valeurs sont :</h2>";
			echo "<table>";
			echo "<tr><th>Hauteur de la couche </th><td>" . $element2_0 . "</td></tr>";
			echo "<tr><th>Angle de frottement</th><td>" . $element2_1 . "</td></tr>";
			echo "<tr><th>Poids volumique émerge</th><td>" . $element2_2 . "</td></tr>";
			echo "<tr><th>Poids volumique immergé</th><td>" . $element2_3 . "</td></tr>";
			echo "</table>";

			$angle_radians2 = deg2rad($element2_1); // convertir l'angle en radians
			$sin_value2 = sin($angle_radians2); // calculer le sinus de l'angle en radians

			$ka2 = (1 - $sin_value2) / (1 + $sin_value2);

			$kp2 = (1 + $sin_value2) / (1 - $sin_value2);
			echo "<p>le coefficient de poussée couche 2 est ka= " . $ka2 . "</p>";
			echo "<p>le coefficient de butée des terres couche 2 est kp= " . $kp2 . "</p>";
		}
	}
	?>

	<h2>Contraintes de poussées couche 2:</h2>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$position = $_POST['position2'];
		if ($position == "position2-2") {
			$contpous2_0 = $ka2 * $element2_2 * abs($value2_1);
			$contpous2_1 = $ka2 * $element2_2 * abs($value2_2);

			echo "<p>la contrainte de poussée couche 2 𝜎ℎa1 = " . $contpous2_0 . "</p>";
			echo "<p>la contrainte de poussée couche 2 𝜎ℎa2 = " . $contpous2_1 . "</p>";
		}
		if ($position == "position2-1") {
			$contpous2_0 = $ka2 * $element2_2 * $value2_1;
			$contpous2_1 = $ka2 * $element2_2 * abs($value2_1) + $ka2 * $element2_3 * abs($value2_2);

			echo "<p>la contrainte de poussée couche 2 𝜎ℎa1 est = " . $contpous2_0 . "</p>";
			echo "<p>la contrainte de poussée couche 2 𝜎ℎa2 est = " . $contpous2_1 . "</p>";
		}
	}
	?>

	<h2>Contraintes de poussées aux surcharges couche 2:</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$contsurch2 = $ka2 * $surchage;
		echo "<p>la contrainte de poussée aux surcharges couche 2 est = " . $contsurch2 . "</p>";
	}
	?>




	<?php
	// Vérifier si le formulaire a été soumis couche 3
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$value3_1 = floatval($_POST["value3-1"]);
		$value3_2 = $_POST["value3-2"];
	}

	?>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Vérifier si les éléments ont été saisis  couche 3

		if (empty($_POST["element3-1"]) || empty($_POST["element3-2"]) || empty($_POST["element3-3"])) {
			echo "<p>Veuillez saisir tous les éléments.</p>";
		} else {
			// Récupérer les éléments
			$element3_1 = floatval($_POST["element3-1"]);
			$element3_2 = floatval($_POST["element3-2"]);
			$element3_3 = floatval($_POST["element3-3"]);

			// Afficher les éléments dans un tableau
			echo "<h2>Les valeurs sont :</h2>";
			echo "<table>";
			echo "<tr><th>Angle de frottement</th><td>" . $element3_1 . "</td></tr>";
			echo "<tr><th>Poids volumique émerge</th><td>" . $element3_2 . "</td></tr>";
			echo "<tr><th>Poids volumique immergé</th><td>" . $element3_3 . "</td></tr>";
			echo "</table>";

			$angle_radians3 = deg2rad($element3_1); // convertir l'angle en radians
			$sin_value3 = sin($angle_radians3); // calculer le sinus de l'angle en radians

			$ka3 = (1 - $sin_value3) / (1 + $sin_value3);

			$kp3 = (1 + $sin_value3) / (1 - $sin_value3);
			echo "<p>le coefficient de poussée couche 3 est ka= " . $ka3 . "</p>";
			echo "<p>le coefficient de butée des terres couche 3 est kp= " . $kp3 . "</p>";
		}
	}
	?>


	<h2>Contraintes de poussées couche 3:</h2>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$position = $_POST['position3'];
		if ($position == "position3-2") {
			$contpous3_0 = $ka3 * $element3_2 * $value3_1;
			$contpous3_1 = $ka3 * $element3_2 * $value3_2;

			echo "<p>la contrainte de poussée couche 3 𝜎ℎa1 = " . $contpous3_0 . "</p>";
			echo "<p>la contrainte de poussée couche 3 𝜎ℎa2 = " . $contpous3_1 . "</p>";
		}
		if ($position == "position3-1") {
			$contpous3_0 = $contpous2_1 + $ka3 * (2 / 5 * ($element3_3 * $value2_2));


			echo "<p>la contrainte de poussée couche 3 𝜎ℎa1 est = " . $contpous3_0 . "</p>";
			echo "<p>la contrainte de poussée couche 3 𝜎ℎa2 est = " . $contpous3_0 . "+" . $ka3 . "f" . "</p>";
		}
	}
	?>

	<h2>Contraintes de butées couche 3:</h2>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$contbut3_1 = $kp3 * 0;
		$contbut3_2 = $kp3 * $element3_3 . "f";


		echo "<p>la contrainte de buttée couche 3 est = " . $contbut3_2 . "</p>";
		echo "<p>la contrainte de buttée couche 3 est = " . $contbut3_1 . "</p>";
	}
	?>

	<h2>Contraintes de poussées aux surcharges couche 3:</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$contsurch3 = $ka3 * $surchage;
		echo "<p>la contrainte de poussée aux surcharges couche 3 est = " . $contsurch3 . "</p>";
	}
	?>

	<h2>Contrainte résiduelle nulle couche 3:</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$contresid3 = ($contpous3_0) / ($kp3 - $ka3);
		echo "<p>la contrainte résiduelle nulle ɛ couche 3 est = " . $contresid3 . "</p>";
	}
	?>


	<h2>Récapitulation des forces et des moments de poussées couche 1:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$braslevier1 = ($element0 + $element2_0 + $contresid3) - ($element0 - ($element0 / 3));
		$force1 = $contpous1;
		$moment1 = $force1 * $braslevier1;
		echo "<p>Le bras de levier couche 1 est b1= " . $braslevier1 . "</p>";
		echo "<p>La force couche 1 est f1= " . $force1 . "</p>";
		echo "<p>Le moment couche 1 est m1= " . $moment1 . "</p>";
	}
	?>

	<h2>Récapitulation des forces et des moments de poussées couche 2:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$braslevier2 = ($element0 + $element2_0 + $contresid3) - (($element0 + $element2_0) - ($element2_0 / 2));
		$force2 = $contpous2_0 * $element2_0;
		$moment2 = $force2 * $braslevier2;
		echo "<p>Le bras de levier couche 2 est b2= " . $braslevier2 . "</p>";
		echo "<p>La force couche 2 est f2= " . $force2 . "</p>";
		echo "<p>Le moment couche 2 est m2= " . $moment2 . "</p>";

		$braslevier2_1 = ($element2_0 + $contresid3) - ($element2_0 - $element2_0 / 3);
		$force2_1 = $contpous2_1 * (2 / 5 * $element2_0);
		$moment2_1 = $force2_1 * $braslevier2_1;
		echo "<p>Le bras de levier couche 2 est b2= " . $braslevier2_1 . "</p>";
		echo "<p>La force couche 2 est f2= " . $force2_1 . "</p>";
		echo "<p>Le moment couche 2 est m2= " . $moment2_1 . "</p>";
	}
	?>

	<h2>Récapitulation des forces et des moments de poussées couche 3:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$braslevier3 = $contresid3 / 2;
		$force3 = $contresid3 * $contpous3_0;
		$moment3 = $force3 * $braslevier3;
		echo "<p>Le bras de levier couche 3 est b3= " . $braslevier3 . "</p>";
		echo "<p>La force couche 3 est f3= " . $force3 . "</p>";
		echo "<p>Le moment couche 3 est m3= " . $moment3 . "</p>";

		$braslevier3_1 = $contresid3 / 3;
		$force3_1 = -3 / 2 * $contresid3 * $contresid3;
		$moment3_1 = $force3_1 * $braslevier3_1;
		echo "<p>Le bras de levier couche 3 est b3= " . $braslevier3_1 . "</p>";
		echo "<p>La force couche 3 est f3= " . $force3_1 . "</p>";
		echo "<p>Le moment couche 3 est m3= " . $moment3_1 . "</p>";

		$braslevier3_2 = $contresid3 / 3;
		$force3_2 = ($ka3 / 2) * ($contresid3 * $contresid3);
		$moment3_2 = $force3_2 * $braslevier3_2;
		echo "<p>Le bras de levier couche 3 est b3= " . $braslevier3_2 . "</p>";
		echo "<p>La force couche 3 est f3= " . $force3_2 . "</p>";
		echo "<p>Le moment couche 3 est m3= " . $moment3_2 . "</p>";
	}
	?>

	<h2>Récapitulation des forces et des moments des surcharges couche 1:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$brasleviersurch1 = ($element0 + $element2_0 + $contresid3) - 1;
		$forcesurch1 = $contsurch * $element0;
		$momentsurch1 = $forcesurch1 * $brasleviersurch1;
		echo "<p>Le bras de levier couche 1 est Bs1= " . $brasleviersurch1 . "</p>";
		echo "<p>La force couche 1 est Fs1= " . $forcesurch1 . "</p>";
		echo "<p>Le moment couche 1 est Ms1= " . $momentsurch1 . "</p>";
	}
	?>

	<h2>Récapitulation des forces et des moments des surcharges couche 2:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$brasleviersurch2 = ($element2_0 + $contresid3) - ($element2_0 / 2);
		$forcesurch2 = $contsurch2 * $element2_0;
		$momentsurch2 = $forcesurch2 * $brasleviersurch2;
		echo "<p>Le bras de levier couche 1 est Bs1= " . $brasleviersurch2 . "</p>";
		echo "<p>La force couche 1 est Fs1= " . $forcesurch2 . "</p>";
		echo "<p>Le moment couche 1 est Ms1= " . $momentsurch2 . "</p>";
	}
	?>

	<h2>Récapitulation des forces et des moments des surcharges couche 3:</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$brasleviersurch3 = ($contresid3 / 2);
		$forcesurch3 = $contsurch3 * $contresid3;
		$momentsurch3 = $forcesurch3 * $brasleviersurch3;
		echo "<p>Le bras de levier couche 1 est Bs1= " . $brasleviersurch3 . "</p>";
		echo "<p>La force couche 1 est Fs1= " . $forcesurch3 . "</p>";
		echo "<p>Le moment couche 1 est Ms1= " . $momentsurch3 . "</p>";
	}
	?>

	<h2>Calcul de l'effort du tirrant :</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$momentsomme = $moment1 + $moment2 + $moment2_1 + $moment3 + $moment3_1 + $moment3_2 + $momentsurch1 + $momentsurch2 + $momentsurch3;
		echo "<p>La somme des moment est  = " . $momentsomme . "</p>";

		$effort = $momentsomme / (($element0 + $element2_0 + $contresid3) - ($element0));
		echo "<p>L'effort du tirrant est = " . $effort . "</p>";
	}
	?>

	<h2>Détermination de l'effort tranchant T0 :</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$forcesomme = $force1 + $force2 + $force2_1 + $force3 + $force3_1 + $force3_2 + $forcesurch1 + $forcesurch2 + $forcesurch3;
		echo "<p>La somme des moment est  = " . $forcesomme . "</p>";

		$effortTran = $forcesomme - $effort;
		echo "<p>L'effort du tirrant est = " . $effortTran . "</p>";
	}
	?>

	<h2>Récapitulation des moments des poussées et butées des terres :</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$braslevierPouss_but = 0.5;
		$forcePouss_but = $surchage;
		$momentPouss_but = $forcePouss_but * $braslevierPouss_but;
		echo "<p>Le moment  est= " . $momentPouss_but . " b²" . "</p>";

		$braslevierPouss_but1 = 1 / 3;
		$forcePouss_but1 = $ka3 / 2;
		$momentPouss_but1 = $forcePouss_but1 * $braslevierPouss_but1;
		echo "<p>Le moment  est= " . $momentPouss_but1 . " b^3" . "</p>";

		$braslevierPouss_but2 = 0.5;
		$forcePouss_but2 = -$surchage;
		$momentPouss_but2 = $forcePouss_but2 * $braslevierPouss_but2;
		echo "<p>Le moment  est= " . $momentPouss_but2 . " b²" . "</p>";

		$braslevierPouss_but3 = 1 / 3;
		$forcePouss_but3 = -$kp3 / 2;
		$momentPouss_but3 = $forcePouss_but3 * $braslevierPouss_but3;
		echo "<p>Le moment  est= " . $momentPouss_but3 . " b^3" . "</p>";
	}
	?>

	<h2>Détermination de b</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$binconnu = sqrt($effortTran / (abs($momentPouss_but3) - $momentPouss_but1));
		echo "<p>La valeur de b l'inconnue est= " . $binconnu . "</p>";
	}
	?>

	<h2>Calcul de f0</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$f0 = $binconnu + $contresid3;
		echo "<p>La valeur de f0 est= " . $f0 . "</p>";
	}
	?>


	<h2>Détermination de la fiche</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fiche = 1.2 + $f0;
		echo "<p>La valeur de la fiche est = " . $fiche . "</p>";
	}
	?>

	<h2>Calcul du Moment fléchissant maximum</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$calculX1 = ((- ($contpous3_0 + $contresid3)) - sqrt(-4 * (- ($element0 + $element2_0 + $contresid3 - $braslevier1) * ($force3_2)) + (pow(($contpous3_0 + $contresid3), 2)))) / (2 * (- ($element0 + $element2_0 + $contresid3 - $braslevier1)));

		$calculX2 = ((- ($contpous3_0 + $contresid3)) + sqrt(-4 * (- ($element0 + $element2_0 + $contresid3 - $braslevier1) * ($force3_2)) + (pow(($contpous3_0 + $contresid3), 2)))) / (2 * (- ($element0 + $element2_0 + $contresid3 - $braslevier1)));

		echo "<p>La valeur de X1 est = " . $calculX1 . "</p>";
		echo "<p>La valeur de X2 est = " . $calculX2 . "</p>";

		if ($calculX1 > 0 && $calculX2 < 0) {
			$resultat = $calculX1;
			if ($resultat >= 0 && $resultat <= (($element0 + $element2_0) - $element2_0)) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * pow($resultat, 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
			if ($resultat >= (($element0 + $element2_0) - $element2_0) && $resultat <= $element0) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * pow($resultat, 3) - 1 / 6 * $ka * $element2 * pow(($resultat - ($element0 + $element2_0 - $element2_0)), 3) - 1 / 6 * pow(($resultat - ($element0 + $element2_0 - $element2_0)), 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
			if ($resultat >= $element0 && $resultat <= ($element0 + $element2_0)) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * ($element0 + $element2_0 - $element2_0) * ($resultat - 1 / 3 * ($element0 + $element2_0 - $element2_0)) + ($effort * ($resultat - $element0)) - 1 / 6 * ($ka) * $element2 * pow(($resultat - $element2_0), 3) - 1 / 6 * pow(($resultat - $element2_0), 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
		} else {
			$resultat = $calculX2;
			if ($resultat >= 0 && $resultat <= (($element0 + $element2_0) - $element2_0)) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * pow($resultat, 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
			if ($resultat >= (($element0 + $element2_0) - $element2_0) && $resultat <= $element0) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * pow($resultat, 3) - 1 / 6 * $ka * $element2 * pow(($resultat - ($element0 + $element2_0 - $element2_0)), 3) - 1 / 6 * pow(($resultat - ($element0 + $element2_0 - $element2_0)), 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
			if ($resultat >= $element0 && $resultat <= ($element0 + $element2_0)) {
				$momentMax = (-1 / 2 * ($surchage)) * $ka * pow($resultat, 2) - 1 / 6 * $ka * $element1 * ($element0 + $element2_0 - $element2_0) * ($resultat - 1 / 3 * ($element0 + $element2_0 - $element2_0)) + ($effort * ($resultat - $element0)) - 1 / 6 * ($ka) * $element2 * pow(($resultat - $element2_0), 3) - 1 / 6 * pow(($resultat - $element2_0), 3);
				echo "<p>La valeur du moment fléchissant est = " . $momentMax . "</p>";
			}
		}
	}
	?>

	<h2>Choix de la Palplanche</h2>
	<?php
	// Vérifier si le formulaire a été soumis couche 2
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sigmaMax = 2 / 3 * $sigmaE;
		$w = $momentMax / $sigmaMax;
		echo "<p>La valeur du module de flexion élastique W est = " . $w . "</p>";
	}
	?>

<a href="accostage.php">DISPOSITION ET CARACTERISTIQUES DES DEFENSES D’ACCOSTAGE</a>
</body>

</html>