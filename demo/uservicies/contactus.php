<?php
date_default_timezone_set('America/New_York');
$hora = time();
$date = date('d/m/Y F h:i:s',$hora);
$name = $_POST['name'];
$senderMail = $_POST['email'];
$receivingMail = 'gruporeyes@uservicescorporate.com';
$description = $_POST['message'];
$fields = strlen($name)*strlen($senderMail)*strlen($description);
if($fields != true){
  echo "<script type='text/javascript'>alert('COMPLETE THE FIELDS'); location.href = 'contact.html'</script>";
}else{
// Tittle
$títtle = 'Information Request';
// Menssage
$message = '
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Information Request</title>
</head>
<body>
  <div style="background: linear-gradient(-50deg, #B41D31 33%, rgba(0, 0, 0, 0) 33%), linear-gradient(-50deg, #EEEEEE 66%, #39386E 66%); height: 30px;"></div>
  <h3 align="center"><b>New Message - Date: '.$date.' From: '.$name. ' - Email: '.$senderMail.'</b></h3>
  <h4 align="center"><b>Reason - Information </br></b></h4>
  <table style="border: 1px solid #ddd; text-align: left; border-collapse: collapse;  width: 100%;">
  <tr>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;">Descripcion</th>
  </tr>
  <tr>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;">'.$description.'</td>
  </tr>
</table>
  <div style="background: linear-gradient(-50deg, #B41D31 33%, rgba(0, 0, 0, 0) 33%), linear-gradient(-50deg, #EEEEEE 66%, #39386E 66%); height: 30px;"></div>
</body>
</html>
';

// headers Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// additional headers
$headers .= 'From: RequestUSC-'.$date.'@uservicescorporate.com';
// Send Mail
mail($receivingMail, $títtle, $message, $headers);
echo "<script type='text/javascript'>alert('YOUR MAIL IS SENT SATISFACTORY'); location.href = 'contact.html'</script>";
}
?>