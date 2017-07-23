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
$prix=$_POST['prix'];
if($prix != ''){
$modif=$bdd->query('UPDATE `stock` SET `PrixU` = "'.$prix.'" WHERE `fact` = 1;');
}
else{
	?>
<script>
	window.alert('verifier vos champs');
	window.location="ajout_centre.php"
	</script>
    <?php
}
?>
<script>
	window.alert('modification bein faite');
	window.location="ajout_centre.php"
	</script>