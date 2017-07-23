<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset( $_SESSION['type'])  ) {
	$l=$_SESSION['login'];
	$b=$_SESSION['type'];
}
else {
	header('location: ../index.html');
}

include('../connexion.php');
if($b != 'admin'){
	if($b == 'responsable achat'){
		header('location: ../achat/achat.php.php5');}
		else if($b == 'responsable vente'){
		header('location: ../vente/vente.php.php5');}
		else if ($b == 'user'){
		header('location: ../HOME/accueil.php.php5');}
}else{
	$op=$bdd->query("SELECT * FROM `operation` WHERE `etat` ='actif' ORDER BY `ID` DESC");
	$opp=$op->fetch();
	$op2=$bdd->query("SELECT * FROM `operation` WHERE `etat` ='actif'");
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link href="images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
</head>

<body>
<img src="images/front/logo.png" width="260" height="110">
<div style="-moz-border-bottom-colors: gray; border:1px solid black; color:darkgreen; font-size:150%; padding:1em;">
 
      <?php echo('Bienvenue  '.$l.' '); ?>|&nbsp;&nbsp;<a href="../deconnexion.php" >&nbsp;&nbsp;<span class="underline">Quitter</span></a>
      
<?php if(!empty($opp)){ ?><div>
	
	<center><table>
    <tr>
    <td><div class="shortcutHome">
		<a href="Declancher.php"><img src="images/mission.png" width="64" height="64"><br>
		Ajouter Opération</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="Ajouter.php"><img src="images/ajouter.png" width="64" height="64"><br>
		Ajouter Utilisateur</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="Supprimer.php"><img src="images/suprimer.png" width="64" height="64"><br>
		Supprimer Utilisateur</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="modifier.php"><img src="images/modification.png" width="64" height="64"><br>
		Modifier Utilisateur</a>
		</div></td>
    </tr></table>
    <table>
    <tr>
    <td><div class="shortcutHome">
		<p><a href="ajout_centre.php"><img src="images/utilisateur.png" width="64" height="64"><br>
		  Ajouter Centre & Prix Unitaire</a>		</p>
    </div></td>
    <td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="images/home.jpg" width="64" height="64"><br>
		  Acceuil</a>		</p>
    </div></td>
    
    <td><div class="shortcutHome">
		<p><a href="../consultation/consultation.php"><img src="images/facture.png" width="64" height="64"><br>
		Factures<br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        </a></p>
		</div></td>
    </tr>
    </table></center>
  </div>
	
	<?php } else { ?><div class="clear"></div>
<div>
	
	<center><table>
    <tr>
     <td><div class="shortcutHome">
		<a href="Declancher.php"><img src="images/mission.png" width="64" height="64"><br>
		Declancher L'Opération</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="Ajouter.php"><img src="images/ajouter.png" width="64" height="64"><br>
		Ajouter Utilisateur</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="Supprimer.php"><img src="images/suprimer.png" width="64" height="64"><br>
		Supprimer Utilisateur</a>
		</div></td>
    <td><div class="shortcutHome">
		<a href="modifier.php"><img src="images/modification.png" width="64" height="64"><br>
		Modifier Utilisateur</a>
		</div></td>
    </tr></table></center>
  <center><table><tr>
    <td><div class="shortcutHome">
		<p><a href="ajout_centre.php"><img src="images/utilisateur.png" width="64" height="64"><br>
		  Ajouter Centre & Prix Unitaire</a>		</p>
    </div></td>
    <td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="images/home.jpg" width="64" height="64"><br>
		  Accueil</a>		</p>
    </div></td>
    
    <td><div class="shortcutHome">
		<p><a href="../consultation/consultation.php"><img src="images/facture.png" width="64" height="64"><br>
		Factures<br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        </a></p>
		</div></td>
    </tr>
    </table></center>
 
 <?php } ?>

<div class="clear"></div>
</div>
<table align="right">
  <?php if(!empty($opp)) { ?>
  <tr><td><p class="underline">Opération courante :<?php while($opp2=$op2->fetch()){ echo(' / '.$opp2['nom'].'&nbsp;&nbsp;'); }?></p></td></tr>
<tr><td><a href="arreter.php"><p class="underline"><img src="images/icon-supprimer.jpg"> Arreter Opération</p></a></td></tr>
<?php } else {
	?>
    </table></div>
    
</body>
</html>
<?php
}}
?>
