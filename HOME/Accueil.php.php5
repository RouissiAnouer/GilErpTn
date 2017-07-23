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
}


?>
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
<center><img src="images/front/logo.png" width="260" height="110"></center>
</div>

	<div>
	
	<center>
      <table><tr><td><a href="../consultation/consultation.php"><img src="images/recherche-73_150x100.jpg" height="150"></a><br><center>Consulter</center>
     </td>
     <td width="200"></td><td><a href="../vente/vente.php.php5"><img src="../img/panier-boutique-en-ligne.jpg" height="166"></a><br><center>Vente</center></td><td width="200"></td><td><a href="../achat/pre_achat.php"><img src="../img/vente-entreprise-150x150.gif" height="166"></a><br><center>Achat</center></td></tr></table>
   </center>
  </div>
<div class="clear"></div>
<hr>
<?php
if($b=='admin'){
	echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../administrateur/administrateur.php"><img src="../administrateur/images/admin.png" width="64" height="64"><br>
		  Admin</a>		</p>
    </div></td><td><div class="shortcutHome">
	<p><a href="../administrateur/user.php"><img src="../administrateur/images/reporting.png" width="64" height="64"><br>
		  Reporting</a>		</p></div></td></tr></table>');}
	else if($b=='user'){
		echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../administrateur/user.php"><img src="../administrateur/images/reporting.png" width="64" height="64"><br>
		  Reporting</a>		</p>
    </div></td></tr></table>');
		}
		else if($b=='responsable achat'){
		echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../consultation/consulter_achat.php"><img src="../administrateur/images/consult.png" width="64" height="64"><br>
		  Consulter</a>		</p>
    </div></td></tr></table>');
		}
		else if($b=='responsable vente'){
		echo('<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../consultation/consulter_vente.php"><img src="../administrateur/images/consult.png" width="64" height="64"><br>
		  Consulter</a>		</p>
    </div></td></tr></table>');
		}
	
?>
  

   
</body>
</html>