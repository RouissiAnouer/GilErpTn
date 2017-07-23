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
?>
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml">
   <head>
       <title>Achat</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
        <link href="../administrateur/images/front/logo.png" rel="shortcut icon"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
    </head><div dir="ltr">
    <form>
    <table><tr><td style="width:900">&nbsp;&nbsp;</td><td style="width:200"><p style="width:90%" align="right">
    <input formaction="../deconnexion.php" type="submit" style="color: #ffffff;background-color: cadetblue" value="deconnexion" ></p></td><td><p style="width:90%" align="right">
    <input formaction="pre_achat.php" type="submit" value="Retour"></p></td></tr></table>
   
  </p></form></div>
   <form> 
    
<div style="-moz-border-bottom-colors: gray; border: 1px solid black; color: darkgreen; font-size: 150%; padding: 1em; text-align: right;"><table><tr><td align="center" width="300"> <?php 
	 $reponse = $bdd->query('SELECT max(id) as idmax FROM `facture_achat`');
	$donnees = $reponse->fetch();
	$select=$bdd->query('SELECT * FROM `stock`');
	$req=$select->fetch();
	$select2=$bdd->query('SELECT `centre` FROM `utilisateur` WHERE `login` = "'.$l.'"');
	$select3=$bdd->query('SELECT * FROM `operation` WHERE `etat` ="actif"');
	$operation=$select3->fetch();
	$select4=$bdd->query('SELECT * FROM `utilisateur` WHERE `login` = "'.$l.'"');
	$operation2=$select4->fetch();
	if(empty($operation)){
	echo(' </p></div></td><td width="100"></td><td width="100"></td><td align="center" width="250"> <div>   <img src="tÃ©lÃ©chargement.jpg" width="125" height="63" alt="hghghgh" longdesc="tÃ©lÃ©chargement.jpg">
      <p class="medium">المجمع المهني المشترك للخضر</p>
     </div></td></tr></table>'); 
	}else{
	
	  
	  
	   ?>
<div align="left">عدد : <?php echo($donnees['idmax']+1); ?></div><div align="left"> <br> <?php
$date = date("Y-m-d");
$heure = date("H:i:s");
Print($date);?><br><?php
Print($heure);

?>
<input type="hidden" name="date" value="<?php echo($date); ?>"><input type="hidden" name="heure" value="<?php echo($heure); ?>"></p><input type="hidden" name="id" value="<?php echo($donnees['idmax']+1); ?>">
   	  <p align="left">
   	    <select name="select2">
        <?php while($req2=$select2->fetch()){
   	      echo('<option>'.$req2['centre'].'</option>'); }?>
        </select>
   	  </p></div></td><td width="100"></td><td width="100"></td><td align="center" width="250"> <div>   <img src="tÃ©lÃ©chargement.jpg" width="125" height="63" alt="hghghgh" longdesc="tÃ©lÃ©chargement.jpg">
      <p class="medium">المجمع المهني المشترك للخضر</p>
      <p class="medium"><?php echo($operation2['operation']); ?></p>
     </div></td></tr></table>
 <input type="hidden" name="oper" value="<?php echo($operation2['operation']); ?>">
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
        <option>منوبة</option>
        <option>قفصة</option>
        <option>تونس</option>
        <option>أريانة</option>
        <option>بن عروس</option>
        <option>نابل</option>
        <option>سوسة</option>
        <option>منستير</option>
        <option>قصرين</option>
         <option>توزر</option>
        <option>قبلي</option>
        <option>تطاوين</option>
        <option>مدنين</option>
        <option>قابس</option>
        <option>صفاقس</option>
        <option>قيروان</option>
        <option>مهدية</option>
        <option>زغوان</option>
      </select>
      صاحب بطاقة التعريف الوطنية عدد :
      <input name="cin" type="text" maxlength="8" required>
    </p>
  <blockquote>
    <p style="text-align: right; font-size: x-large; color: #000; font-weight: bold;">   كمية :
      <input type="text" name="quantite" required>
    كغ   من <?php echo($operation2['produit']); ?> الإستهلاك بسعر فردي قدره :
    <input name="prixU" type="text" value="<?php echo($req['PrixU']); ?>" readonly>
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
<p dir="ltr">MF :&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div></div>
<div>
 
  <p style="text-align: center"> 
    <input type="submit" value="Enregistrer" formaction="confirmachat.php.php5" formmethod="post">&nbsp;&nbsp;<input type="reset" value="Rétablir">   
  </p>
</div>
</form>
<?php
}}
?>
