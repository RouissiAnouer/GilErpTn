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
$up=$bdd->query("UPDATE `facture_achat` SET `etat` = 'non actif' where `operation` = '".$nom."'");
$select=$bdd->query("SELECT * FROM `operation` WHERE `nom` LIKE '".$nom."' AND `etat` = 'actif' ");
$req=$select->fetch();
if (!empty($req)){
	
$update=$bdd->query("UPDATE `operation` SET `date_fin` = '".$date."',`etat` = 'non actif' WHERE `nom` = '".$nom."' AND `etat` = 'actif';");
?>
<script>
	window.alert('Operation terminer');
	window.location="administrateur.php"
	</script>
    <?php } ?>