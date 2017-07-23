<?php
//----------------------------------------------------------------------------------------
// Script:
//   main.php
//
// Remark:
//   This sample script shows how to make a web thumbnail from a web page.
// 
// Copyright(C) 2008-2010, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------

define('SHOW_MEMORY_REPORT', 0); // 1: Show memory report; 0: disable
$t_iMem0 = memory_get_usage();

include_once('func.php');

// Set the save folder
// [IMPORTANT NOTE]: This sample saves the snapshot to the folder on the work dir of this script. 
// Please make sure the script has the WRITE permission in this folder.
// You can also set the value to other folder, for example: 
//   $t_strSaveFolder = "c:/temp";
$t_strSaveFolder = dirname(__FILE__);
  
// Get the parameters
$t_strURL = isset($_GET["url"]) ? $_GET["url"] : "";
$t_iWidth = isset($_GET["width"]) ? $_GET["width"] : 240;
$t_iHeight = isset($_GET["height"]) ? $_GET["height"] : 0;
?>

<html><head><title>Main Sample - ACA WebThumb ActiveX Control</title></head>
<body><h1>Main Sample - ACA WebThumb ActiveX Control</h1>

<form action="main.php" method="get">
<table>
<tr><td>URL: </td><td><input name="url" size=40 value="<?php echo $t_strURL; ?>"></td></tr>
<tr><td>Thumbnail Width: </td><td><input name="width" size=6 value="<?php echo $t_iWidth; ?>"> 0: auto calc the width.</td></tr>
<tr><td>Thumbnail Height: </td><td><input name="height" size=6 value="<?php echo $t_iHeight; ?>"> 0: auto calc the height</td></tr>
<tr><td></td><td><input type="submit" name="btn" value="Snap it!"></td></tr>
</table>
</form>


<?php
if ( isset($_GET["btn"]) )
{
  set_time_limit(120);
  
  // Set the image filename
  $t_strLargeImage = $t_strSaveFolder."/main-thumb.large.png";
  $t_strSmallImage = $t_strSaveFolder."/main-thumb.small.png";

  $t_iMem1 = memory_get_usage();
  // Create instance ACAWebThumb.ThumbMaker
  $t_xMaker = new COM("ACAWebThumb.ThumbMaker")
    or die("Start ACAWebThumb.Maker failed");
  $t_iMem2 = memory_get_usage();

  // Set your registration number here to unlock the trial limit. To purchase a license, visit http://www.acasystems.com
  //$t_xMaker->SetRegInfo( 'your-reg-code' );

  // For security reason, the JavaScript feature is disabled by default. If you want to 
  // capture from a JavaScript webpage, you should call SetJScriptEnabled to enable it.
  $t_xMaker->SetJScriptEnabled(true);
  $t_xMaker->SetJavaEnabled(true);
  $t_xMaker->SetImageEnabled(true);
 
  // Set the URL and start snap
  $t_xMaker->SetURL($t_strURL); 
  $t_iRet = $t_xMaker->StartSnap();
  $t_iMem3 = memory_get_usage();
  if ( 0 == $t_iRet )
  {
    // snap successful, save the image with full size.
    $t_bRet1 = $t_xMaker->SaveImage($t_strLargeImage);
    
    // save thumbnail
    $t_xMaker->SetThumbSize ($t_iWidth, $t_iHeight, 0);
    $t_bRet2 = $t_xMaker->SaveImage($t_strSmallImage);
    
    // show the image
    if ( $t_bRet1 && $t_bRet2)
    {
      echo "<b>The snapshot from <a href='".$t_strURL."' target=_blank>".$t_strURL."</a></b>:<br><br>";
      echo "<a href='main-thumb.large.png'><img src='main-thumb.small.png' border=1><br><br>Click here for larger preview</a>";
    }
    else
      echo GetWriteError( $t_strSaveFolder );
    if ( SHOW_MEMORY_REPORT )
    {
      $t_iMem3 = memory_get_usage();
      echo '<hr><B>Memory report</B><br>';
      echo '<li>Total used memory for PHP: '.$t_iMem3.' bytes';
      echo '<li>Total used memory for this script : '.($t_iMem3-$t_iMem0).' bytes';
    }
  }
  else
    echo "<b>Error</b>: Snap from ".$t_strURL." failed. <br>".GetErrorText($t_iRet)."<br>";
    
  // Don't forget free the object
  unset($t_xMaker);
}
ShowFooter();
?>

</body>
</html>
