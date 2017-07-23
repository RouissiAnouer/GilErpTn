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
$id=$_POST['id'];
$transp=$_POST['transp'];
$cin=$_POST['cin'];
$mat=$_POST['mat'];
$caisse=$_POST['caisse'];
$produit=$_POST['produit'];
$quantite=$_POST['quantite'];
$poid=$_POST['poid'];
$observ=$_POST['observ'];
$DE=$_POST['select2'];
$A=$_POST['centre'];
$res=$_POST['select'];
$date=$_POST['date'];
$insert=$bdd->query("INSERT INTO `transport` (`id`, `transporteur`, `cin`, `matricule`, `DE`, `A`, `caisse`, `produit`, `quantite`, `poidsNet`, `observation`, `resD`, `resR`, `date`) VALUES ('".$id."', '".$transp."', '".$cin."', '".$mat."', '".$DE."', '".$A."', '".$caisse."', '".$produit."', '".$quantite."', '".$poid."', '".$observ."', '".$l."', '".$res."', '".$date."')");
header('location: transport.php');