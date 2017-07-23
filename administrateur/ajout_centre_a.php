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
$centre=$_POST['nom'];
$gouv=$_POST['gouv'];
if($centre != '' && $gouv != ''){
$insert=$bdd->query('INSERT INTO `centre` (`centre`, `gouvernat`) VALUES ("'.$centre.'", "'.$gouv.'");');
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