<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
$op=$_POST['oper'];
$heure=$_POST['heure'];
$id=$_POST['id'];
$cin=$_POST['cin'];
$centre=$_POST['select2'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$ville=$_POST['adresse'];
$gouvernat=$_POST['select'];
$quantite=$_POST['quantite'];
$prixU=$_POST['prixU'];
$date=$_POST['date'];
$montant=$prixU*$quantite;
$insert='INSERT INTO `facture_achat` VALUES ("'.$id.'","'.$nom.'","'.$prenom.'","'.$cin.'","'.$centre.'","'.$ville.'","'.$gouvernat.'","'.$quantite.'","'.$prixU.'","'.$date.'","'.$heure.'","'.$l.'","N","'.$montant.'","actif","'.$op.'")';
$req = $bdd->prepare($insert);
$req->execute();
/////////////////////////
$select= $bdd->query('SELECT `quantité` FROM `stock`');
$stock=$select->fetch();
$somme=$stock['quantité']+$quantite;
$update="UPDATE `stock` SET `quantité` = '".$somme."', `last_date` = '".$date."',`heure`='".$heure."' WHERE `stock`.`fact` = 1;";
$req2= $bdd->prepare($update);
$req2->execute();
 
header('location: achat.php.php5');

?>




