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
$mdp=$_POST['mdp'];
$nom=$_POST['nom'];
$cin=$_POST['cin'];
$fonct=$_POST['fonct'];
$centre=$_POST['centre'];
if($mdp == '' && $fonct != '' ){
	$modif=$bdd->query('UPDATE `utilisateur` SET `type` = "'.$fonct.'",`centre` = "'.$centre.'" WHERE `login` = "'.$nom.'" AND `CIN` = "'.$cin.'";');
}else if($fonct == '' && $mdp != ''){
$modif=$bdd->query('UPDATE `utilisateur` SET `mdp` = "'.$mdp.'",`centre` = "'.$centre.'" WHERE `login` = "'.$nom.'" AND `CIN` = "'.$cin.'";');}
else if($mdp != '' && $fonct != ''){
	$modif=$bdd->query('UPDATE `utilisateur` SET `mdp` = "'.$mdp.'", `type` = "'.$fonct.'",`centre` = "'.$centre.'" WHERE `login` = "'.$nom.'" AND `CIN` = "'.$cin.'";');}
else
{
	?>
<script>
	window.alert('introduire des modification');
	window.location="modifier.php"
	</script>
    <?php
	}

?>
<script>
	window.alert('utilisateur modifer');
	window.location="modifier.php"
	</script>