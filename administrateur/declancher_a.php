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
$date=$_POST['date'];
$nom=$_POST['nom'];
$pdt=$_POST['pdt'];
$insert=$bdd->query("INSERT INTO `operation` (`nom`, `date`, `produit`, `etat`) VALUES ('".$nom."','".$date."','".$pdt."','actif');");
?>
<script>
	window.alert('Operation declancher');
	window.location="administrateur.php"
	</script>