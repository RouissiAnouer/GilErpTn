<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-  Mon Blog</title>
</head>

<body>
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
$req=$bdd->query("UPDATE `gil`.`facture_achat` SET `rect` = 'N' `responsable` = '".$l."' AND `nom` = '".$nom."' AND `prenom` = '".$prenom."' AND `centre` = '".$centre."' AND `ville` = '".$ville."' AND `gouvernat` = '".$gouvernat."' AND `quantité`= '".$quantite."' AND `PrixUnitaire` = '".$prixU."' AND `date` = '".$date."' AND `heure` = '".$heure."' AND `rect` = 'N' WHERE `facture_achat`.`id` = '".$id."';");
$req2= $bdd->prepare($req);
$req2->execute();
header('location: fact_modif.php');

?>