<?php
//----------------------------------------------------------------------------------------
// Script:
//   multi-thread-frame.php
//
// Remark:
//   This sample script is used for Multi-Thread sample
// 
// Copyright(C) 2008-2010, All Rights Reserved
// http://www.acasystems.com
//----------------------------------------------------------------------------------------

if(isset($_GET["url"]))
{
  echo "<img src='online-thumb.php?url=".$_GET["url"]."&width=240'>";
}
?>