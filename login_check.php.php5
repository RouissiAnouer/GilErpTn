<?php
include('connexion.php');

$x=$_POST['username'];
$y=$_POST['password'];
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT login,mdp,type FROM `utilisateur` WHERE `login` = "'.$x.'" AND `mdp` = "'.$y.'"' );
$donnees = $reponse->fetch();
if(!empty($donnees)){
if($donnees['type']=="user"){
	session_start ();
	$_SESSION['login']=$x;
	$_SESSION['type']=$donnees['type'];
	header ('location: ./HOME/Accueil.php.php5');	
	}
	else if ($donnees['type']=="responsable achat"){
		session_start ();
	$_SESSION['login']=$x;
	$_SESSION['type']=$donnees['type'];
		header ('location: ./HOME/Accueil.php.php5');
	} 
	else if ($donnees['type']=="responsable vente"){
		session_start ();
	$_SESSION['login']=$x;
	$_SESSION['type']=$donnees['type'];
		header ('location: ./HOME/Accueil.php.php5');  
}
else if ($donnees['type']=="admin"){
		session_start ();
	$_SESSION['login']=$x;
	$_SESSION['type']=$donnees['type'];
		header ('location: administrateur/administrateur.php');
}
}
else
{
	?>
    <script>
	window.alert('mot de passe incorrect');
	window.location="index.html"
	</script>
    <?php
	
	

}




?>