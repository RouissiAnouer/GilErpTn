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
$op=$_POST['op'];
$cin=$_POST['cin'];
$nom=$_POST['nom'];
$mdp=$_POST['mdp'];
$fonct=$_POST['select'];
$centre=$_POST['centre'];
$pdt=$_POST['pdt'];
$insert=$bdd->query("INSERT INTO `utilisateur` (`login`, `mdp`, `type`, `CIN`, `operation`,`centre`,`produit`) VALUES ('".$nom."', '".$mdp."', '".$fonct."', '".$cin."','".$op."','".$centre."','".$pdt."' );");
?>
<script>
	window.alert('"<?php echo($nom); ?>" est bien ajouter');
	window.location="Ajouter.php"
	</script>