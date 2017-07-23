<?php
/**
 * Created by PhpStorm.
 * User: Rouissi
 * Date: 13/03/15
 * Time: 11:02
 */

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
if($b != 'admin'){
	if($b == 'responsable achat'){
		header('location: ../HOME/accueil.php.php5');}
		else if($b == 'responsable vente'){
		header('location: ../HOME/accueil.php.php5');}
		else if ($b == 'user'){
		header('location: ../HOME/accueil.php.php5');}
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

label {position:relative}
label:after {
    content:'<>';
    font:11px "Consolas", monospace;
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:0px;
    padding:-25 0 2px;
    border-bottom:1px solid #ddd;
    position:absolute;
    pointer-events:none;
}
label:before {
    content:'';
    right:6px; top:0px;
    width:20px; height:20px;
    background:#f8f8f8;
    position:absolute;
    pointer-events:none;
    display:block;
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

     <div class="quoteOfDay" style="color: #000"><?php echo('Bienvenue   '.$l); ?>&nbsp;&nbsp;&nbsp;&nbsp;|<a href="../deconnexion.php">Quitter</a></div>
</head>
<body id="page1" onLoad="new ElementMaxHeight();">
<!-- START PAGE SOURCE -->
<div style="-moz-border-bottom-colors: gray; border:1px solid black; color:darkgreen; font-size:150%; padding:1em;">
<center><img src="../administrateur/images/front/logo.png" width="260" height="110"></center>
</div><h1>Consultation</h1>
<?php $reponse=$bdd->query("SELECT * FROM `facture_achat` WHERE `rect` = 'A' ORDER BY `id` DESC limit 10");
$select2=$bdd->query('SELECT `centre` FROM `centre`');
?>
</div>
<div style="border:1px solid black;"><p class="consul">Critère de Recherche : <label><select onChange="apparaitre(this.value)" style="width:150"><option>Centre</option><option>Responsable</option><option>Numéro facture</option><option>Date</option><option>Client</option><option>Transporteur</option></select></label></p></div>
</div>
<div id="1"><p id="3"></p>
</div>
<div class="datagrid"><table>
<thead><tr>
<th>ID</th>
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
  <th>Pdf</th>
  <th>Edit</th>
  </tr></thead>
<tbody><?php while($donnees = $reponse->fetch()){
if(!empty($donnees)){
	echo('<tr><td>'.$donnees['id'].'</td><td>'.$donnees['nom'].'</td><td>'.$donnees['prenom'].'</td><td>'.$donnees['cin'].'</td><td>'.$donnees['centre'].'</td><td>'.$donnees['ville'].'</td><td>'.$donnees['gouvernat'].'</td><td>'.$donnees['quantité'].'</td><td>'.$donnees['prixUnitaire'].'</td><td>'.$donnees['date'].'</td><td>'.$donnees['heure'].'</td><td><a href="../achat/facture.pdf"><img src="../img/téléchargement.png"></a></td><td><a href="../administrateur/fact_modif.php?id='.$donnees['id'].'"><img src="../img/modifier.png"></a></td></tr>');}}?>
</tbody>
</table>

</div>

</body></html>

<?php
}
?>
<hr>
<table align="center"><tr><td><div class="shortcutHome">
		<p><a href="../HOME/Accueil.php.php5"><img src="../administrateur/images/home.jpg" width="64" height="64"><br>
		  Accueil</a>		</p>
    </div></td></tr></table>
<script>
function apparaitre(a){
	if(a == 'Responsable'){
var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);		
var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('Responsable :');
z.id=3;
var form=document.createElement('form');
form.action="responsable.php";
form.method="post";
var p=document.createElement('input');
var y=document.createElement('input');
p.type="text";
p.name="responsable";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(p);
form.appendChild(y);



}else if(a == 'Numéro facture'){
	var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);
	var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('Numéro de Facture :');
z.id=3;
var form=document.createElement('form');
form.action="numero.php";
form.method="post";
var p=document.createElement('input');
var y=document.createElement('input');
p.type="text";
p.name="num";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(p);
form.appendChild(y);
	
	
	}
else if(a == 'Centre') {
	var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);
	var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('Centre :');
z.id=3;
var form=document.createElement('form');
form.action="centre.php";
form.method="post";
var p=document.createElement('input');
var y=document.createElement('input');
p.type="text";
p.name="centre";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(p);
form.appendChild(y);
	
	}else if(a == 'Date') {
	var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);
	var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('De :');
var u=document.createTextNode(' A :');
z.id=3;
var form=document.createElement('form');
form.action="date.php";
form.method="post";
var p=document.createElement('input');
var b=document.createElement('input');
var y=document.createElement('input');
p.type="date";
p.name="date1";
b.type="date";
b.name="date2";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(p);
form.appendChild(u);
form.appendChild(b);
form.appendChild(y);
	
	
	}else if(a == 'Client') {
	var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);
	var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('Nom Client :');
var u=document.createTextNode('CIN :');
z.id=3;
var form=document.createElement('form');
form.action="client.php";
form.method="post";
var p=document.createElement('input');
var e=document.createElement('input');
var y=document.createElement('input');
e.type="text";
e.name="nomclient";
p.type="text";
p.name="cin";
p.maxLength="8";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(e);
form.appendChild(u);
form.appendChild(p);
form.appendChild(y);
	
	}else if(a == 'Transporteur') {
	var elm=document.getElementById(3);
	elm.parentNode.removeChild(elm);
	var x=document.getElementById(1);
var z=document.createElement('p');
var o=document.createTextNode('Nom Transporteur :');
var u=document.createTextNode('Matricule :');
z.id=3;
var form=document.createElement('form');
form.action="transporteur.php";
form.method="post";
var p=document.createElement('input');
var e=document.createElement('input');
var y=document.createElement('input');
e.type="text";
e.name="nomtr";
p.type="text";
p.name="matr";
y.type="submit";
y.value="rechercher";
x.appendChild(z);
z.appendChild(form);
form.appendChild(o);
form.appendChild(e);
form.appendChild(u);
form.appendChild(p);
form.appendChild(y);
	
	}
	
}


</script>