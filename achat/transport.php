<?php

/**
 * Created by PhpStorm.
 * User: Anouer
 * Date: 18/03/15
 * Time: 23:18
 */
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
		if($b == 'responsable vente'){
		header('location: ../HOME/accueil.php.php5');}
		else if($b == 'user'){
		header('location: ../HOME/accueil.php.php5');}
else{
echo('connecter en tant que '.$l);
 $reponse = $bdd->query('SELECT max(id) as idmax FROM `transport`');
	$donnees = $reponse->fetch();
	$select2=$bdd->query('SELECT `centre` FROM `utilisateur` WHERE `login` = "'.$l.'"');
	$req1=$bdd->query('SELECT `centre` FROM `centre`');
	$select3=$bdd->query('SELECT `login` FROM `utilisateur` WHERE `type` = "responsable achat"');
	$select4=$bdd->query('SELECT * FROM `operation` WHERE `etat` ="actif" ORDER BY `ID` DESC limit 1');
	$operation=$select4->fetch();
	$date = date("Y-m-d");
	$heure = date("H:i:s");
?>
<style>
input[type=text]:focus {border-color:#333; }
label{color: #B4886B;
font-size:medium;
font-weight: bold;
display: block;
width: 120px;
float: left;
}
thead th {
	
	color: #FFFFFF;
	font-size: 5px;
	font-weight: bold;
	border-left: 1px solid #000;
	border:solid #000 1px;
}
thead tr {color: #FFFFFF;
	font-size: 5px;
	font-weight: bold;
	border-left: 1px solid #000;}
label{
	color: #000000;
	font-size: medium;
	font-weight: bold;
	display: block;
}
</style>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
       <title>Achat</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
        <link href="../administrateur/images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
    </head><form>
    <table><tr><td style="width:900">&nbsp;&nbsp;</td><td style="width:200"><p style="width:90%" align="right">
    <input formaction="../deconnexion.php" type="submit" style="color: #ffffff;background-color: cadetblue" value="deconnexion" ></p></td><td><p style="width:90%" align="right">
    <input formaction="pre_achat.php" type="submit" value="Retour"></p></td></tr></table>
   
  </p></form>
    <?php if(empty($operation)){
		echo('
  <div style="-moz-border-bottom-colors: gray;  color:darkgreen; font-size:150%; padding:1em;">
<center><img src="../administrateur/images/front/logo.png" width="260" height="110"></center>
</div><h1>Bon De Transport</h1>'); }else {?>
    
  <div style="-moz-border-bottom-colors: gray;  color:darkgreen; font-size:150%; padding:1em;">
<center><img src="../administrateur/images/front/logo.png" width="260" height="110"></center>
</div><h1>Bon De Transport</h1>
           
      <div><p style="width:80%" align="right" class="underline">N: <?php echo($donnees['idmax']+1); ?></p></div>
<form action="transport_a.php" method="post">
<input type="hidden" value="<?php echo($l);?>" name="resp">
<input type="hidden" value="<?php echo($donnees['idmax']+1); ?>" name="id">
<?php Print($date);?><br><?php
Print($heure);
$time=$date.' '.$heure;
?><input type="hidden" name="date" value="<?php echo($time); ?>">
<table align="center"><tr><td><label>Transporteur :</label><input type="text" name="transp" required></td>
				<td><label>CIN :</label><input type="text" maxlength="8" name="cin" required></td>
                </tr>
                <tr>
                <td><label>Trajet De :</label><input type="text" name="de" required></td>
                <td><label> A :</label><input type="text" name="a" required></td>
                </tr>
                <tr></table>
                <table align="center"><tr><td><label>Matricule :</label><input type="text" name="mat" maxlength="11" required></td></tr></table>
<table style="border:1px solid black;" align="center"><thead><tr><th><label>Nbre de caisses</label></th><th><label>produit</label></th><th><label>quantite</label></th><th><label>poids Net</label></th><th><label>Observation</label></th></tr></thead>
<tr><th><input type="text" name="caisse" required></th><th><input type="text" name="produit" required></th><th><input type="text" name="quantite" required></th><th><input type="text" name="poid" required></th><th><input type="text" name="observ" required></th></tr>
</table>
<table align="center"><tr><td><label style="width:140">Centre Depart</label><select name="select2">
        <?php while($req2=$select2->fetch()){
   	      echo('<option>'.$req2['centre'].'</option>'); }?>
        </select></td>
				<td width="150">&nbsp;&nbsp;</td>
                <td><label style="width:140">Centre Reception</label><select name="centre"><?php  while($req3=$req1->fetch()){
   	      echo('<option>'.$req3['centre'].'</option>'); } ?></select></td>
                </tr>
                <tr><td>&nbsp;&nbsp;</td></tr><tr>
                <td><label style="width:140">Responsable</label><?php echo($l);?></td>
                <td width="150">&nbsp;&nbsp;</td>
                <td><label style="width:140">Responsable</label><select name="select"><?php  while($req4=$select3->fetch()){
   	      echo('<option>'.$req4['login'].'</option>'); } ?></select></td>
                </tr>
                </table>
                <table align="center"><tr><td><label>SIGNATURE</label></td><td style="width:350">&nbsp;&nbsp;</td><td><label style="width:240">SIGNATURE DESTINATAIRE</label></td></tr></table>
                <table height="100"><tr><td>&nbsp;&nbsp;</td></tr></table>
                <table height="100" align="center"><tr><td><label style="width:240">SIGNATURE TRANSPORTEUR</label></td></tr></table>
                <center><table><tr><td> <input type="reset" value="retablir"></td><td><input type="submit" value="valider"></td></tr></table></center>
                

</form>
 <?php } }?>