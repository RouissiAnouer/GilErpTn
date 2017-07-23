<?php
//----------------------------------------------------------------------------------------
// Script:
//   online-thumb.php
//
// Remark:
//   This sample script shows how to make a web thumbnail in the memory and output to client browser.
// 
// Parameters:
//   url: The URL that you want to capture.
//   width: The thumbnail width
//   height: The thumbnail height
//   ratiotype: The width/height ratio type. 0: keep ratio by width; 1: keep ratio by height.
//
// Example:
//   <img src="online-thumb.php?url=http://www.google.com"> or
//   <img src="online-thumb.php?url=http://www.google.com&width=320&height=240&ratiotype=0">
//
// Copyright(C) 2008-2010, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------

// Create instance ACAWebThumb.ThumbMaker
$t_xMaker = new COM("ACAWebThumb.ThumbMaker")
  or die();

// Set your registration number here to unlock the trial limit. To purchase a license, visit http://www.acasystems.com
//$t_xMaker->SetRegInfo( 'your-reg-code' );

// Get the parameters
$t_strURL = isset($_GET["url"]) ? $_GET["url"] : "http://www.google.com";
$t_iWidth = isset($_GET["width"]) ? $_GET["width"] : 320;
$t_iHeight = isset($_GET["height"]) ? $_GET["height"] : 240;
$t_iRatioType = isset($_GET["ratiotype"]) ? $_GET["ratiotype"] : 0;

// Set your registration number here to unlock the trial limit. To purchase a license, visit http://www.acasystems.com
//$t_xMaker->SetRegInfo( 'your-reg-code' );

// Set the URL and start snap
$t_xMaker->SetURL($t_strURL); 
if ( 0 == $t_xMaker->StartSnap() )
{
  // snap successful, set the thumbnail size and get image bytes
  $t_xMaker->SetThumbSize ($t_iWidth, $t_iHeight, $t_iRatioType);
  $t_arrBytes = $t_xMaker->GetImageBytes ("png"); //get image bytes
  // output the image bytes to client
  if ( count($t_arrBytes) > 0 )
  {
    header("Content-type: image/png");  // set the output header.
    foreach($t_arrBytes as $byte) 
      echo chr($byte);
  }
}
?>