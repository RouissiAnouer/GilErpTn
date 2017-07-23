<?php
function GetErrorText($pi_iErrCode)
{
  $t_strErr = '<b>Error Code</b>: '.$pi_iErrCode."<br>\r\n<b>Error String</b>: ";
  switch($pi_iErrCode)
  {
  case 0: return $t_strErr.' Return successful';
  case 1: return $t_strErr.' The snap process is time out. You can call function <a href="http://help.acasystems.com/web-thumb-activex/ithumbmaker-doc.htm#SetTimeOut"><i>SetTimeOut()</i></a> to set the time out value.';
  case 2: return $t_strErr.' The trial version is expired. You should visit <a href=http://www.acasystems.com>http://www.acasystems.com</a> to purchase a license, and then call <a href="http://help.acasystems.com/web-thumb-activex/ithumbmaker-doc.htm#SetRegInfo"><i>SetRegInfo()</i></a> before calling <i>StartSnap()</i>';
  case 3: return $t_strErr.' The network or website errors.';
  }
  return $t_strErr.' Unknown error';
}

function ShowFooter()
{
  echo ("<b>Note</b>: If you want to convert the web page included Javascript and ActiveX elements to image on Windows Server 2003/2008, you should disable <b>Internet Explorer Enhanced Security Configuration</b>. More details, <a href='http://www.acasystems.com/en/web-thumb-activex/faq-how-to-disable-internet-explorer-enhanced-security-configuration.htm?ref=8-sample-php' target=_blank>click here</a>.");
  echo ("<hr><center><a href='http://www.acasystems.com/en/web-thumb-activex/?refa=8-sample-php'>ACA WebThumb ActiveX</a> | " );
  echo ("<a href='http://help.acasystems.com/web-thumb-activex/?refa=8-sample-php'>Online Help Document</a> | "  );
  echo ("<a href='http://www.acasystems.com/en/buynow.htm?refa=8-sample-php'>Purchse License</a> <br><br> "  );
  echo ("Copyright &copy; 1999-".date('Y')." <a href='http://www.acasystems.com/?refa=8-sample-php'>ACA Systems</a>. All Rights Reserved<br>" );
  echo ("Protected by the copyright laws by international treaties.</center>" );
}

function GetWriteError($pi_strFolder)
{
  return '<div id=errinfo style="border:1px #666 solid;background:#ddd;padding:5px">
  <p><font color=#ff0000><b>ERROR:</b></font> 
  Can\'t save the snapshot to folder <font color=#ff0000><I>'.$pi_strFolder.'</I></font>. </p>
  <p>Please make sure you have assigned <font color=#ff0000><b>WRITE permission</b></font> for <font color=#ff0000><b>LOCAL SERVICE</b></font> 
  in this folder.</p>
  <p>To solve this problem, please visit <a href="http://www.acasystems.com/en/web-thumb-activex/faq-write-permission.htm?refa=8-sample-php" target=_blank>http://www.acasystems.com/en/web-thumb-activex/faq-write-permission.htm</a>.</p>
  </div>
  ';
}
?>