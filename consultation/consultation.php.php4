
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
?>
<style type="text/css">
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
table,tr,td{border:1px solid #000;}

</style>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="../stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
 </head>
 <body>
<div style="-moz-border-bottom-colors: gray; color: darkgreen; font-size: 150%; padding: 1em;">
<form action="../deconnexion.php" class="consult"> 
  <p><?php echo('connecter en tant que '.$l.' '); ?> <input type="submit" class="consul" value="deconnexion" /></p>
  <p align="center">Consultation</p>
</form>
<?php
$centre=$_POST['centre'];
$responsable=$_POST['responsable'];
$numero=$_POST['id'];
$date=$_POST['date'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$client=$_POST['nom'];
$preclient=$_POST['prenom'];
$transport=$_POST['nomtransporteur'];
$pretransport=$_POST['prenomtransporteur'];

// Si tout va bien, on peut continuer


$reponse=$bdd->query("SELECT * FROM `facture_achat` WHERE `responsable` LIKE '".$responsable."'");
$reponse2=$bdd->query("SELECT * FROM `facture_achat` WHERE `centre` LIKE '".$centre."'");
$reponse3=$bdd->query("SELECT * FROM `facture_achat` WHERE `ID` LIKE '".$numero."'");
$reponse4=$bdd->query("SELECT * FROM `facture_achat` WHERE `date` LIKE '".$date."'");
$reponse5=$bdd->query("SELECT * FROM `facture_achat` WHERE `date` >= '".$date1."' AND `date` <= '".$date2."' ");
$reponse6=$bdd->query("SELECT * FROM `facture_achat` WHERE `nom` LIKE '".$client."' AND `prenom` LIKE '".$preclient."'");
//la table du transporteur pas encore validé

echo('<p dir="rtl">فاتورات '.$responsable.'</p>');
?>
<div class="datagrid"><table>
<thead><tr>
  <th>Nom</th>
  <th>Prenom</th>
  <th>CIN</th>
  <th>Centre</th>
  <th>Ville</th>
  <th>Gouvernat</th>
  <th>Quantité</th>
  <th>PrixU</th>
  <th>Date</th>
  <th>Heure</th>
  </tr></thead>

<tbody><?php while($donnees = $reponse->fetch()){
if(!empty($donnees)){
	echo('<tr><td>'.$donnees['nom'].'</td><td>'.$donnees['prenom'].'</td><td>'.$donnees['cin'].'</td><td>'.$donnees['centre'].'</td><td>'.$donnees['ville'].'</td><td>'.$donnees['gouvernat'].'</td><td>'.$donnees['quantité'].'</td><td>'.$donnees['prixUnitaire'].'</td><td>'.$donnees['date'].'</td><td>'.$donnees['heure'].'</td></tr>');}}?>
</tbody>
</table></div>

<?php
echo('<HR>');
echo('<p dir="rtl">فاتورات '.$centre.'</p>');
?><div class="datagrid"><table><tr><thead><th>Nom</th>
  <th>Prenom</th>
  <th>CIN</th>
  <th>Centre</th>
  <th>Ville</th>
  <th>Gouvernat</th>
  <th>Quantité</th>
  <th>PrixU</th>
  <th>Date</th>
  <th>Heure</th></thead></tr><?php
while($donnees2 = $reponse2->fetch()){
if(!empty($donnees2)){
	echo('
	
	<tr><td>'.$donnees2['nom'].'</td><td>'.$donnees2['prenom'].'</td><td>'.$donnees2['cin'].'</td><td>'.$donnees2['responsable'].'</td><td>'.$donnees2['ville'].'</td><td>'.$donnees2['gouvernat'].'</td><td>'.$donnees2['quantité'].'</td><td>'.$donnees2['prixUnitaire'].'</td><td>'.$donnees2['date'].'</td><td>'.$donnees2['heure'].'</td></tr>');
}
}?></table></div><?php
echo('<HR>');
echo('<p dir="rtl">فاتورة رقم '.$numero.'</p>');
while($donnees3 = $reponse3->fetch()){
if(!empty($donnees3)){
	echo('<table border="2"><tr><td>nom</td><td>prenom</td><td>CIN</td><td>responsable</td><td>ville</td><td>gouvernat</td><td>quantité</td><td>prixUnitaire</td><td>date</td><td>heure</td></tr></br>
	
	<tr><td>'.$donnees3['nom'].'</td><td>'.$donnees3['prenom'].'</td><td>'.$donnees3['cin'].'</td><td>'.$donnees3['responsable'].'</td><td>'.$donnees3['ville'].'</td><td>'.$donnees3['gouvernat'].'</td><td>'.$donnees3['quantité'].'</td><td>'.$donnees3['prixUnitaire'].'</td><td>'.$donnees3['date'].'</td><td>'.$donnees3['heure'].'</td></tr></table>');
}
}
echo('<HR>');
echo('<p dir="rtl">فاتورات بتاريخ '.$date.'</p>');
while($donnees4 = $reponse4->fetch()){
if(!empty($donnees4)){
	echo('<table border="2"><tr><td>nom</td><td>prenom</td><td>CIN</td><td>responsable</td><td>ville</td><td>gouvernat</td><td>quantité</td><td>prixUnitaire</td><td>date</td><td>heure</td></tr></br>
	
	<tr><td>'.$donnees4['nom'].'</td><td>'.$donnees4['prenom'].'</td><td>'.$donnees4['cin'].'</td><td>'.$donnees4['responsable'].'</td><td>'.$donnees4['ville'].'</td><td>'.$donnees4['gouvernat'].'</td><td>'.$donnees4['quantité'].'</td><td>'.$donnees4['prixUnitaire'].'</td><td>'.$donnees4['date'].'</td><td>'.$donnees4['heure'].'</td></tr></table>');
}
}
echo('<HR>');
echo('<p dir="rtl">فاتورات ما بين '.$date1.' و '.$date2.'</p>');
while($donnees5 = $reponse5->fetch()){
if(!empty($donnees5)){
	echo('<table border="2"><tr><td>nom</td><td>prenom</td><td>CIN</td><td>responsable</td><td>ville</td><td>gouvernat</td><td>quantité</td><td>prixUnitaire</td><td>date</td><td>heure</td></tr></br>
	
	<tr><td>'.$donnees5['nom'].'</td><td>'.$donnees5['prenom'].'</td><td>'.$donnees5['cin'].'</td><td>'.$donnees5['responsable'].'</td><td>'.$donnees5['ville'].'</td><td>'.$donnees5['gouvernat'].'</td><td>'.$donnees5['quantité'].'</td><td>'.$donnees5['prixUnitaire'].'</td><td>'.$donnees5['date'].'</td><td>'.$donnees5['heure'].'</td></tr></table>');
}
}
echo('<HR>');
echo('<p dir="rtl">فاتورات الفلاح '.$client.' '.$preclient.'</p>');
while($donnees6 = $reponse6->fetch()){
if(!empty($donnees6)){
	echo('<table border="2"><tr><td>nom</td><td>prenom</td><td>CIN</td><td>responsable</td><td>ville</td><td>gouvernat</td><td>quantité</td><td>prixUnitaire</td><td>date</td><td>heure</td></tr></br>
	
	<tr><td>'.$donnees6['nom'].'</td><td>'.$donnees6['prenom'].'</td><td>'.$donnees6['cin'].'</td><td>'.$donnees6['responsable'].'</td><td>'.$donnees6['ville'].'</td><td>'.$donnees6['gouvernat'].'</td><td>'.$donnees6['quantité'].'</td><td>'.$donnees6['prixUnitaire'].'</td><td>'.$donnees6['date'].'</td><td>'.$donnees6['heure'].'</td></tr></table>');
}
}
echo('<HR>');
/*echo('<p dir="rtl">فاتورات نقلها'.$transport.' '.$pretransport.'</p>');
while($donnees7 = $reponse7->fetch()){
if(!empty($donnees7)){
	echo('<table border="2"><tr><td>nom</td><td>prenom</td><td>CIN</td><td>responsable</td><td>ville</td><td>gouvernat</td><td>quantité</td><td>prixUnitaire</td><td>date</td><td>heure</td></tr></br>
	
	<tr><td>'.$donnees7['nom'].'</td><td>'.$donnees7['prenom'].'</td><td>'.$donnees7['cin'].'</td><td>'.$donnees7['responsable'].'</td><td>'.$donnees7['ville'].'</td><td>'.$donnees7['gouvernat'].'</td><td>'.$donnees7['quantité'].'</td><td>'.$donnees7['prixUnitaire'].'</td><td>'.$donnees7['date'].'</td><td>'.$donnees7['heure'].'</td></tr></table>');
}
}*/

 // Termine le traitement de la requête

?></div>
</body>