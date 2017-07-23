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
		header('location: ../vente/vente.php.php5');}
		else if($b == 'user'){
		header('location: ../HOME/accueil.php.php5');}
else{
echo('connecter en tant que '.$l);
$id=$_GET['id'];
?>
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml">
   <head>
       <title>Achat</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
        <link rel="shortcut icon" href="../stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
    </head>
    <div dir="ltr">
    <form>
    <table><tr><td style="width:900">&nbsp;&nbsp;</td><td style="width:200"><p style="width:90%" align="right">
    <input formaction="../deconnexion.php" type="submit" style="color: #ffffff;background-color: cadetblue" value="déconnexion" ></p></td><td><p style="width:90%" align="right">
    <input formaction="../consultation/consultation.php" type="submit" value="Retour"></p></td></tr></table>
   
  </p></form></div>
   <form> 
    
<div style="-moz-border-bottom-colors: gray; border: 1px solid black; color: darkgreen; font-size: 150%; padding: 1em; text-align: right;"><table><tr><td align="center" width="300"> <?php 
	 $reponse = $bdd->query('SELECT max(id) as idmax FROM `facture_achat`');
	$donnees = $reponse->fetch();
	$select=$bdd->query('SELECT * FROM `stock`');
	$req=$select->fetch();
	$select2=$bdd->query('SELECT `centre` FROM `centre`');
	
	  
	  
	   ?>
<div align="left">عدد : <?php echo($id); ?></div><div align="left"> <br> <?php
$date = date("Y-m-d");
$heure = date("H:i:s");
Print($date);?><br><?php
Print($heure);

?>
<input type="hidden" name="id" value="<?php echo($id); ?>">
<input type="hidden" name="date" value="<?php echo($date); ?>"><input type="hidden" name="heure" value="<?php echo($heure); ?>"></p>
   	  <p align="left">
   	    <select name="select2">
        <?php while($req2=$select2->fetch()){
   	      echo('<option>'.$req2['centre'].'</option>'); }?>
        </select>
   	  </p></div></td><td width="100"></td><td width="100"></td><td align="center" width="250"> <div>   <img src="tÃ©lÃ©chargement.jpg" width="125" height="63" alt="hghghgh" longdesc="tÃ©lÃ©chargement.jpg">
      <p class="medium">المجمع المهني المشترك للخضر</p>
      <p class="medium"><input type="text" placeholder="إسم العملية" required></p>
     </div></td></tr></table>
 
  <p style="text-decoration: underline; font-weight: 400; text-align: center; font-size: 350%;">بطاقة قبول</p>
  <p style="text-align: right; font-size: x-large; color: #000; font-weight: bold;">    توصلت من السيد
    : 
    <input type="text" name="nom" placeholder="الإسم" required>
    <input name="prenom" type="text" lang="ar" placeholder="اللقب" required>
  </p>
  <p style="text-align: right; font-size: x-large; color: #000; font-weight: bold;">   فلاح بمنطقة :
      <input type="text" name="adresse" required> 
      ولاية      
      <select name="select">
        <option selected>سليانة</option>
        <option>بنزرت</option>
        <option>الكاف</option>
        <option>سيدي بوزيد</option>
        <option>باجة</option>
        <option>جندوبة</option>
      </select>
      صاحب بطاقة التعريف الوطنية عدد :
      <input name="cin" type="text" maxlength="8" required>
    </p>
  <blockquote>
    <p style="text-align: right; font-size: x-large; color: #000; font-weight: bold;">   كمية :
      <input type="text" name="quantite" required>
    كغ   من <input type="text" placeholder="منتوج" required> الإستهلاك بسعر فردي قدره :
    <input name="prixU" type="text" required>
    الكيلوغرام .</p>
    <p style="text-align: right; font-size: medium; color: #000; font-weight: bold;">&nbsp;</p>
  </blockquote>

</div>
<div style="border: 1px solid black;"> <table><tr><td><div> <p dir="ltr" class="medium">الإمضاء</p></div></td><td width="500"></td><td width="500"></td><td width="250"></td><td width="100"><p dir="rtl" class="medium">إمضاء الفلاح</p></td></tr> 
<tr><td style="border:1px solid black;" height="70" width="100">&nbsp;</td><td width="500"></td><td width="500"></td><td width="250"></td>&nbsp;<td style="border:1px solid black;" height="70" width="100">&nbsp;</td></tr></table> 

<div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>العنوان : 37 شارع الطيب المهيري, 1002 تونس البلفدير ص ب178</p>
<p>البريد الإلكتروني :gil@gil.com.tn</p>
<p>الهاتف :462 846 71 - 887 843 71 - 056 793 71 (00216) </p>
<p>فاكس :686 801 71</p>
<p dir="ltr">MF :</p>
</div></div>
<div>
  <p style="text-align: right" class="underline">Rectifier</p>
  <p style="text-align: center"> 
    <input type="submit" value="Modifier" formaction="fact_modif_a.php.php5" formmethod="post">&nbsp;&nbsp;<input type="reset" value="Rétablir" formmethod="post">   
  </p>
</div>
</form>
<?php
}
?>
<div id="smallRight"> Designed by <a href="#">Rouissi Anouer & Ben Ayed Ayoub</a><br>
  &copy; 2015 Projet De Fin D'Etude </div>