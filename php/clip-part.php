<?php
//----------------------------------------------------------------------------------------
// Script:
//   clip-part.php
//
// Remark:
//   This sample script shows how to take a snapshot of a long HTML and 
//   break it up into multiple images. 
// 
// Copyright(C) 2008-2010, ACASystems, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------
set_time_limit(120);
include_once('func.php');

// Set the save folder
// [IMPORTANT NOTE]: This sample saves the snapshot to the folder on the work dir of this script. 
// Please make sure the script has the WRITE permission in this folder.
// You can also set the value to other folder, for example: 
//   $t_strSaveFolder = "c:/temp";
$t_strSaveFolder = dirname(__FILE__);
  
// Get the parameters
$t_strURL = isset($_GET["url"]) ? $_GET["url"] : "http://www.acasystems.com";
$t_iWidth = isset($_GET["width"]) ? intval($_GET["width"]) : 240;
$t_iHeight = isset($_GET["height"]) ? intval($_GET["height"]) : 0;
$t_iPartHeight = 600; // The height of part image.
?>

<html><head><title>Clip-Part Sample - ACA WebThumb ActiveX Control</title></head>
<body><h1>Clip-Part Sample - ACA WebThumb ActiveX Control</h1>

<form action="clip-part.php" method="get">
<table>
<tr><td>URL: </td><td><input name="url" size=40 value="<?php echo $t_strURL; ?>"></td></tr>
<tr><td>Thumbnail Width: </td><td><input name="width" size=6 value="<?php $t_iWidth; ?>"> 0: auto calc the width.</td></tr>
<tr><td>Thumbnail Height: </td><td><input name="height" size=6 value="<?php $t_iHeight; ?>"> 0: auto calc the height</td></tr>
<tr><td></td><td><input type="submit" name="btn" value="Snap it!"></td></tr>
</table>
</form>

<?php
if ( isset($_GET["btn"]) )
{
  // Create instance ACAWebThumb.ThumbMaker
  $t_xMaker = new COM("ACAWebThumb.ThumbMaker")
    or die("Start ACAWebThumb.Maker failed");

  // Set your registration number here to unlock the trial limit. To purchase a license, visit http://www.acasystems.com
  //$t_xMaker->SetRegInfo( 'your-reg-code' );
    
  // Set the URL and start snap
  $t_xMaker->SetURL($t_strURL); 
  $t_iRet = $t_xMaker->StartSnap();
  if ( 0 == $t_iRet )
  {
    // snap successful, Ready to save
    $t_lWholeWidth = $t_xMaker->GetThumbWidth();
    $t_lWholeHeight = $t_xMaker->GetThumbHeight();
    $t_iCount = ceil($t_lWholeHeight/$t_iPartHeight);
    for($i = 0; $i<$t_iCount;$i++)
    {
      $t_iPartTop = $i * $t_iPartHeight;
      $t_iPartHeight = min( ($t_lWholeHeight - $t_iPartTop), $t_iPartHeight );
      
      // Set the image filename
      $t_strLargeImage = $t_strSaveFolder."/main-thumb.large.part".($i+1).".png";
      $t_strSmallImage = $t_strSaveFolder."/main-thumb.small.part".($i+1).".png";
      
      // Set the clip rectange
      $t_xMaker->SetClipRect(0, $t_iPartTop, $t_lWholeWidth, $t_iPartHeight);
      
      // save the image with full size.
      $t_xMaker->SetThumbSize (0, 0, 0);
      $t_bRet1 = $t_xMaker->SaveImage($t_strLargeImage);
      
      // save thumbnail
      $t_xMaker->SetThumbSize ($t_iWidth, $t_iHeight, 0);
      $t_bRet2 = $t_xMaker->SaveImage($t_strSmallImage);
      
      // show the image
      if ( $t_bRet1 && $t_bRet2)
      {
        echo "<hr>The snapshot from <a href='".$t_strURL."' target=_blank>".$t_strURL."</a><br><b>Part ".($i+1)."/".$t_iCount."</b><br>";
        echo "<a href='main-thumb.large.part".($i+1).".png'><img src='main-thumb.small.part".($i+1).".png' border=1><br>Click here for larger preview</a><br>";
      }
      else
      {
        echo GetWriteError( $t_strSaveFolder );
        break;
      }
    }
  }
  else
    echo "<b>Error</b>: Snap from ".$t_strURL." failed. <br>".GetErrorText($t_iRet)."<br>";
}

ShowFooter();
?>

</body>
</html>