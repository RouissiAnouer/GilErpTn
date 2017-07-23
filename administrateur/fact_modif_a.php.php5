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
$req="UPDATE `facture_achat` SET `responsable` = '".$l."' , `nom` = '".$nom."' , `prenom` = '".$prenom."' , `centre` = '".$centre."' , `ville` = '".$ville."' , `gouvernat` = '".$gouvernat."' , `quantité`= '".$quantite."' , `PrixUnitaire` = '".$prixU."' , `date` = '".$date."' , `heure` = '".$heure."' , `rect` = 'N' WHERE `id` = '".$id."';";
$req2= $bdd->prepare($req);
$req2->execute();
header('location: fact_modif.php');

?>