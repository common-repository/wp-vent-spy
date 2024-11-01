<?php
include 'cURL.php';
$tmp = cURLget_webpage("http://www.onykage.com/vspy/validater.php?donID=".$_POST['donID']."&site=".$_POST['site']);
if ($tmp['errno'] == 0){
 $stuff = $tmp['content'];
}else{
	$stuff = "<span style=\"color: #ff0000;\"><b>There was an Error while tring to communicate with the target website.</b></span>";
}
echo $stuff;

?>