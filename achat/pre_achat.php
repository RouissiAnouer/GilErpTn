<?php
/**
 * Created by PhpStorm.
 * User: Anouer
 * Date: 16/03/15
 * Time: 23:00
 */
 
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset( $_SESSION['type']) ) {
	$l=$_SESSION['login'];
	$b=$_SESSION['type'];
}
else {
	header('location: ../index.html');
}		if($b == 'responsable vente'){
		header('location: ../HOME/accueil.php.php5');}
		else if($b == 'user'){
		header('location: ../HOME/accueil.php.php5');}
else{

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
<title>Achat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../administrateur/images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->

     <div class="quoteOfDay" style="color: #000"><?php echo('Bienvenue   '.$l); ?>&nbsp;&nbsp;&nbsp;&nbsp;|<a href="../deconnexion.php">Quitter</a></div>
</head>
<body id="page1" onLoad="new ElementMaxHeight();">
<!-- START PAGE SOURCE -->
<div style="-moz-border-bottom-colors: gray; border:1px solid black; color:darkgreen; font-size:150%; padding:1em;">
<center><img src="../administrateur/images/front/logo.png" width="260" height="110"></center>
</div><h1>Achat</h1>
<div>
	
	<center><table>
    <tr>
    <td><div class="shortcutHome">
		<a href="achat.php.php5"><img src="../vente/images/facture-icone-7188-64.png" width="64" height="64"><br>
		Facture Achat</a>
		</div></td>
        <td><div class="shortcutHome">
		<a href="transport.php"><img src="../vente/images/transport.jpg" width="64" height="64"><br>
		Bon De Transport</a>
		</div></td>
    </tr></table></center>
    </div>
    <hr>
<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="../administrateur/images/home.jpg" width="64" height="64"><br>
		  Accueil</a>		</p>
    </div></td></tr></table>

    </body>
    </html>
<?php } ?>