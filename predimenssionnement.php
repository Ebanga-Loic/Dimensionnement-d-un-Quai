<!DOCTYPE html>
<html>

<head>
	<title>Sélection de choix</title>
</head>

<body>
	<div class="selection-container">
		<h1>Sélectionnez une couche</h1>
		<form method="post">
			<label for="choix">Choix :</label>
			<select name="choix" id="choix">
				<option value="choix1">couche 1</option>
				<option value="choix2">couche 2</option>
				<option value="choix3">couche 3</option>
			</select>
			<input type="submit" name="submit" value="Appliquer">
		</form>
		<?php
		if (isset($_POST['submit'])) {
			$choix = $_POST['choix'];
			if ($choix == "choix1") {
				header("Location:couche1.php");
			} elseif ($choix == "choix2") {
				header("Location:couche2.php");
			} elseif ($choix == "choix3") {
				header("Location:couche3.php");
			} else {
				echo "<p>Choix invalide</p>";
			}
		}
		?>
	</div>
</body>

</html>