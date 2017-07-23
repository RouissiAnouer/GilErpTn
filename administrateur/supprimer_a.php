<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) ) {
	$l=$_SESSION['login'];
}
else {
	header('location: ../index.html');
}

include('../connexion.php');
$cin=$_POST['cin'];
$nom=$_POST['nom'];



$suppr=$bdd->query('DELETE FROM `utilisateur` WHERE `login` = "'.$nom.'" AND `CIN` = "'.$cin.'"');

?>
<script>
	window.alert('"<?php echo($nom); ?>" est supprimer');
	window.location="supprimer.php"
	</script>