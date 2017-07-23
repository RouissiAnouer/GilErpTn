<?php
//----------------------------------------------------------------------------------------
// Script:
//   batch-list.php
//
// Remark:
//   This sample script shows how to load URL list from a file and then batch make 
//   the web thumbnails
// 
// Copyright(C) 2008-2010, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------
include_once('func.php');

// Set the save folder
// [IMPORTANT NOTE]: This sample saves the snapshot to the folder on the work dir of this script. 
// Please make sure the script has the WRITE permission in this folder.
// You can also set the value to other folder, for example: 
//   $t_strSaveFolder = "c:/temp";
$t_strSaveFolder = dirname(__FILE__);

$t_iThumbWidth = 240;  // The width of thumbnail. 
$t_iThumbHeight = 0;   // The height of thumbnail. 0: auto calc the height
$t_strListFile = dirname(__FILE__)."/batch-list.txt";
?>

<html>
<head>
<title>Batch-List Sample - ACA WebThumb ActiveX Control</title>
</head>
<body>
<h1>Batch-List Sample - ACA WebThumb ActiveX Control</h1>

<?php
// Read the list to array
$t_arrURLs = file($t_strListFile);
$t_iCount = count($t_arrURLs);
if ( 0 == $t_iCount)
{
  echo "<p><b>Error</b>: Read URL list from <b>".$t_strListFile."</b> failed </p>";
  exit;
}
else
  echo "<p>Read URL list from <b>".$t_strListFile."</b> successfully.</p>";

// Create instance ACAWebThumb.ThumbMaker
$t_xMaker = new COM("ACAWebThumb.ThumbMaker")
  or die("Create ACAWebThumb.ThumbMaker failed");

// Set your registration number here to unlock the trial limit. To purchase a license, visit http://www.acasystems.com
//$t_xMaker->SetRegInfo( 'your-reg-code' );
  
$t_xMaker->SetTimeOut(120); // Set the time out for each snap task
set_time_limit(120 * $t_iCount); // Set the time out for php script

for($i = 0; $i < $t_iCount; $i++) // for each url
{
  $t_strURL = trim( $t_arrURLs[$i] );
  if ( "" == $t_strURL )
    continue;
  
  $t_xMaker->SetURL($t_strURL);
  $t_iRet = $t_xMaker->StartSnap();
  if ( 0 == $t_iRet )
  {
    // snap successful. save image with full size.
    $t_strShortName =  strtr($t_strURL, "\\/:*?\"<>|.", "__________");
    
    $t_strLargeImage = $t_strSaveFolder."/".$t_strShortName ."-large.png";
    $t_xMaker->SetThumbSize (0, 0, 0);
    $t_bRet1 = $t_xMaker->SaveImage($t_strLargeImage);
    
    // save thumbnail
    $t_strSmallImage = $t_strSaveFolder."/".$t_strShortName ."-small.png";
    $t_xMaker->SetThumbSize ($t_iThumbWidth, $t_iThumbHeight, 0);
    $t_bRet2 = $t_xMaker->SaveImage($t_strSmallImage);
    
    // show the image
    if ( $t_bRet1 && $t_bRet2)
    {
      echo "<hr><b>The snapshot from <a href='".$t_strURL."' target=_blank>".$t_strURL."</a></b>:<br><br>";
      echo "<a href='".$t_strShortName ."-large.png"."'><img src='".$t_strShortName ."-small.png"."' border=1><br><br>Click here for larger preview</a>";
    }
    else
      echo GetWriteError( $t_strSaveFolder );
  }
  else
    echo "<b>Error</b>: Snap from ".$t_strURL." failed. <br>".GetErrorText($t_iRet)."<br>";
}

ShowFooter();
?>

</body>
</html>