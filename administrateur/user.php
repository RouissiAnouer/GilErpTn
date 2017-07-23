<?php
/**
 * Created by PhpStorm.
 * User: Rouissi
 * Date: 13/03/15
 * Time: 11:02
 */
$year=date("Y");
include('../connexion.php');
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset( $_SESSION['type'])  ) {
	$l=$_SESSION['login'];
	$b=$_SESSION['type'];
	
}
else {
	header('location: ../index.html');
}
if($b != 'admin' && $b != 'user'){
	if($b == 'responsable achat'){
		header('location: ../achat/achat.php.php5');}
		else if($b == 'responsable vente'){
		header('location: ../vente/vente.php');}
		
}else{

$reponse1 = $bdd->query("SELECT `login` FROM `utilisateur` WHERE `type` LIKE 'responsable achat' OR `type` LIKE 'responsable vente'");

?>
<style type="text/css">
select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:250px}
}

.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 8px solid #36752D; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; }.datagrid table td, .datagrid table th { padding: 13px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; color:#FFFFFF; font-size: 17px; font-weight: bold; border-left: 5px solid #36752D; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #275420; border-left: 5px solid #C6FFC2;font-size: 16px;font-weight: normal; }.datagrid table tbody .alt td { background: #DFFFDE; color: #275420; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
.consult {
	text-align: center;
}
.consult {
	text-align: right;
}
.consul {
	font-weight: bold;
}
</style>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GIL</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->

     <div class="quoteOfDay" style="color: #000"><?php echo('Bienvenue  '.$l); ?>&nbsp;&nbsp;&nbsp;&nbsp;|<a href="../deconnexion.php">Quitter</a></div>
</head>
<body id="page1" onLoad="new ElementMaxHeight();">
<!-- START PAGE SOURCE -->
<div style="-moz-border-bottom-colors: gray; border:1px solid black; color:darkgreen; font-size:150%; padding:1em;">
<center><img src="../administrateur/images/front/logo.png" width="260" height="110"></center>
</div><h1>Stock De Regulation - Saison <?php print($year); ?></h1>

<?php 
$op=$bdd->query("SELECT * from `facture_achat`  where `etat`='actif'");
$countc=$bdd->query("SELECT count(distinct(`centre`)) as centre FROM `facture_achat`  where `etat`='actif'");
$countd=$bdd->query("SELECT count(distinct(`date`)) as date FROM `facture_achat`  where `etat`='actif'");
$count1=$countc->fetch();
$count2=$countd->fetch();
$centre=$bdd->query("SELECT distinct(`centre`) as centre FROM `facture_achat`  where `etat`='actif'");
$date=$bdd->query("SELECT distinct(`date`) as date FROM `facture_achat`  where `etat`='actif'");
$opp=$op->fetch();
if(empty($opp)){
	?><script>window.alert('pas de Operation');
    window.location="../HOME/Accueil.php.php5";
    </script><?php
} else {
 ?>
 <h2>Intervention Directe Du GIL</h2>
<h3>Ventilation Des Achats Par Centre De Collecte</h3>
<div style="width:1350">
<table class="datagrid" align="center" style="width:1200" ><tr><td style="border:2px solid #000 ; padding:10"><h1>Dates</h1></td><?php $i=0; while($centree=$centre->fetch()){
$t[$i]=$centree['centre'];
	echo '<td style="border:2px solid #000 ; padding:10"><center><h3>'.$t[$i].'</h3></center></td>';
	$i++;

}
echo '<td style="border:2px solid #000 ; padding:10"><center><h2>TOTALE</h2></center></td>';
echo '</tr>';

while($datee=$date->fetch())
{
	echo '<tr>';
echo '<td style="border:2px solid #000 ; padding:10"><h3>'.$datee['date'].'</h3></td>';	 
for($j=0;$j<$count1['centre'];$j++)
{
	$somme=$bdd->query('SELECT SUM(`quantité`) as somme from `facture_achat` where date="'.$datee['date'].'" and centre="'.$t[$j].'" and `etat`="actif"');

	$somme_f=$somme->fetch();
	echo '<td style="border:2px solid #000 ; padding:10"><center><h4>'.$somme_f['somme'].'</h4></center></td>';
}
$totale=$bdd->query('SELECT SUM(`quantité`) as totale from `facture_achat` where date="'.$datee['date'].'" and `etat`="actif"');
$totalee=$totale->fetch();
echo '<td style="border:2px solid #000 ; padding:10"><center><h2>'.$totalee['totale'].'</h2></center></td>';
	echo '</tr>';

}$centre10=$bdd->query("SELECT distinct(`centre`) as centre FROM `facture_achat`  where `etat`='actif'");
$s=0;
echo'<tr><td style="border:2px solid #000 ; padding:10"><h2>TOTALE</h2></td>';

	while($centreee=$centre10->fetch()){
$totale2=$bdd->query("SELECT SUM(`quantité`) as totale from `facture_achat` where `centre` LIKE '".$centreee['centre']."' and `etat`='actif'");
$totalee2=$totale2->fetch();
echo'<td style="border:2px solid #000 ; padding:10"><center><h2>'.$totalee2['totale'].'</h2></center></td>';
$s=$s+$totalee2['totale'];	}
echo'<td style="border:2px solid #000 ; padding:10"><center><h1>'.$s.'</h1></center></td>';
?> 
     </tr>
    </table>
     
<div class="clear"></div>
<hr>
<?php
if($b=='admin'){
	echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../administrateur/administrateur.php"><img src="../administrateur/images/admin.png" width="64" height="64"><br>
		  Admin</a>		</p>
    </div></td><td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="images/home.jpg" width="64" height="64"><br>
		  Acceuil</a>		</p>
    </div></td></tr></table>');
}else if($b=='user'){
		echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="images/home.jpg" width="64" height="64"><br>
		  Acceuil</a>		</p>
    </div></td></tr></table>');
		}
	?>
</body></html> <?php }} ?>


