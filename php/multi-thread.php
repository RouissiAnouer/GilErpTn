<?php
//----------------------------------------------------------------------------------------
// Script:
//   multi-thread.php
//
// Remark:
//   This sample script shows how to process multiple snap tasks simultaneously.
// 
// Copyright(C) 2008-2010, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------
include_once("func.php");

if ( isset($_POST["url"]) )
  $t_strURL =  $_POST["url"];
else
  $t_strURL = 
    "http://www.google.com\r\n".
    "http://www.msn.com\r\n".
    "http://www.acasystems.com\r\n";

?>

<html>
<head>
<title>Multi-thread Sample - ACA WebThumb ActiveX Control</title>
</head>
<body>
<h1>Multi-thread Sample - ACA WebThumb ActiveX Control</h1>

<form action="multi-thread.php" method="post">
<table>
<tr><td valign=top>URLs: </td><td><textarea cols="70" rows="10" name="url"><?php echo $t_strURL; ?></textarea></td></tr>
<tr><td></td><td><input type="submit" name="btn" value="Snap it!"></td></tr>
</table>
</form>

<?php
if ( isset($_POST["btn"]) && "" != $t_strURL)
{
  $t_arrURLs = split("\n", $t_strURL);
  foreach ($t_arrURLs as $t_strItem) 
  {
    if ( "" == trim($t_strItem) )
      continue;
    echo "<hr><b>The snapshot from <a href='".$t_strItem."' target=_blank>".$t_strItem."</a></b>:<br><br>";
    echo "<iframe src='multi-thread-frame.php?url=" .$t_strItem . "'></iframe>";
  }
}

ShowFooter();

?>
</body>
</html>