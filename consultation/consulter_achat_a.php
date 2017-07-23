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
$m=$_POST['nbre'];
for($i=0;$i<=$m;$i++){
	if(isset($_POST['choix_'.$i])){
       $req=$bdd->query("UPDATE `gil`.`facture_achat` SET `rect` = 'A' WHERE `facture_achat`.`id` = '".$_POST['iid'.$i]."';"); 
}

}
header('location: ./consulter_achat.php');
