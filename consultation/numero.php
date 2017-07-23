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
 <div dir="ltr">
    <form>
    <table><tr><td style="width:900">&nbsp;&nbsp;</td><td style="width:200"><p style="width:90%" align="right">
    <input formaction="../deconnexion.php" type="submit" style="color: #ffffff;background-color: cadetblue" value="deconnexion" ></p></td><td><p style="width:90%" align="right">
    <input formaction="consultation.php" type="submit" value="Retour"></p></td></tr></table>
   
  </p></form></div>
  <p align="center">Consultation</p>
</form>
 <?php 
 $numero=$_POST['num'];
 $reponse3=$bdd->query("SELECT * FROM `facture_achat` WHERE `ID` LIKE '".$numero."'");
 echo('<p dir="rtl">فاتورة رقم '.$numero.'</p>');
 ?><div class="datagrid"><table><tr><thead><th>Nom</th>
  <th>Prenom</th>
  <th>CIN</th>
  <th>Centre</th>
  <th>Responsable</th>
  <th>Ville</th>
  <th>Gouvernat</th>
  <th>Quantité</th>
  <th>PrixU</th>
  <th>Date</th>
  <th>Heure</th>
  <th>PDF</th></thead></tr><?php
while($donnees3 = $reponse3->fetch()){
if(!empty($donnees3)){
	echo('
	
	<tr><td>'.$donnees3['nom'].'</td><td>'.$donnees3['prenom'].'</td><td>'.$donnees3['cin'].'</td><td>'.$donnees3['centre'].'</td><td>'.$donnees3['responsable'].'</td><td>'.$donnees3['ville'].'</td><td>'.$donnees3['gouvernat'].'</td><td>'.$donnees3['quantité'].'</td><td>'.$donnees3['prixUnitaire'].'</td><td>'.$donnees3['date'].'</td><td>'.$donnees3['heure'].'</td><td><a href="../achat/facture.pdf"><img src="../img/téléchargement.png"></a></td></tr>');
}
}

 
 
 
 
 ?></table></div></div></body>
