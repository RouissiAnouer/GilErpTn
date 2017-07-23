<?php
	include('../connexion.php');
/**
 * Created by PhpStorm.
 * User: Anouer
 * Date: 16/03/15
 * Time: 23:00
 */
 $req=$bdd->query("SELECT * FROM `operation` WHERE `etat` ='actif'");
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset( $_SESSION['type']) ) {
	$l=$_SESSION['login'];
	$b=$_SESSION['type'];
}
else {
	header('location: ../index.html');
}
if($b != 'admin'){
	if($b == 'responsable achat'){
		header('location: ../achat/achat.php.php5');}
		else if($b == 'responsable vente'){
		header('location: ../vente/vente.php');}
		else if ($b == 'user'){
		header('location: user.php');}
}else{

$date = date("Y-m-d");

?>
<style type="text/css">

label{color: #B4886B;
font-size:medium;
font-weight: bold;
display: block;
width: 120px;
float: left;
}
input[type=text] {padding:5px; border:2px solid #ccc; 
-webkit-border-radius: 5px;
border-radius: 5px;
}
input[type=text]:focus {border-color:#333; }

input[type=submit] {-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	color:#FFF;
	background-color:#096;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border:none;
	font-family:'Helvetica Neue',Arial,sans-serif;
	font-size:16px;
	font-weight:700;
	height:32px;
	padding:4px 16px;
	text-shadow:#FFF 0 1px 0; }
</style>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GIL</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->

     <div class="quoteOfDay" style="color: #000"><?php echo('connecter en tant que '.$l); ?>&nbsp;&nbsp;&nbsp;&nbsp;|<a href="../deconnexion.php">Quitter</a></div>
</head>
<body id="page1" onLoad="new ElementMaxHeight();">
<!-- START PAGE SOURCE -->
<div style="-moz-border-bottom-colors: gray; border:1px solid black; color:darkgreen; font-size:150%; padding:1em;">
<center><img src="images/front/logo.png" width="260" height="110"></center>
</div><h1>Fin D'Opération</h1>
<form action="arreter_a.php" method="post">
<table width="75%" align="center">	
		
		<tr>
			<td align="center"><label style="width:250" >Opération à Arreter</label><select name="nom"><?php  while($req2=$req->fetch()){
   	      echo('<option>'.$req2['nom'].'</option>'); } ?></select></td>
  </tr>
        <tr>
        	
            <td><input type="hidden" name="date" value="<?php echo($date); ?>"></td>
     	</tr>
</table>
<br><br><br><br>
<p style="width:90%" align="right"><input type="submit" value="Arrèter"></p>

</form>
<hr>
<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="administrateur.php"><img src="images/admin.png" width="64" height="64"><br>
		  Compte</a>		</p>
    </div></td></tr></table>



</body>
</html>

<?php } ?>