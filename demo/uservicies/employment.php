<?php
date_default_timezone_set('America/New_York');
$hora = time();
$date = date('d/m/Y F h:i:s',$hora);
$name = $_POST['name'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$senderMail = $_POST['email'];
$receivingMail = "gruporeyes@uservicescorporate.com";
$description = $_POST['description'];
$fields = strlen($name)*strlen($senderMail)*strlen($phone)*strlen($birthday)*strlen($address)*strlen($description);
if($fields != true){
	echo "<script type='text/javascript'>alert('COMPLETE THE FIELDS'); location.href = 'onlineservices.html'</script>";
}else{
// Tittle
$títtle = 'Apply For Employment';
// Message
$message = '
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Apply For Employment</title>
</head>
<body>
  <div style="background: linear-gradient(-50deg, #B41D31 33%, rgba(0, 0, 0, 0) 33%), linear-gradient(-50deg, #EEEEEE 66%, #39386E 66%); height: 30px;"></div>
  <h3 align="center"><b>New Message - Date: '.$date.'</b></h3>
  <h4 align="center"><b>Reason - Apply For Employment </br></b></h4>
  <table style="border: 1px solid #ddd; text-align: left; border-collapse: collapse;  width: 100%;">
  <tr>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;">Name</th>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;">Email</th>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;">Phone</th>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;">Birthday</th>
  </tr>
  <tr>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;">'.$name.'</td>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;">'.$senderMail.'</td>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;">'.$phone.'</td>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;">'.$birthday.'</td>
  </tr>
  <tr>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;" colspan="12">Address</th>
  </tr>
  <tr>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;" colspan="12">'.$address.'</td>
  </tr>
  <tr>
    <th style="padding: 15px;  border: 1px solid #ddd; text-align: left;" colspan="12">Descripcion</th>
  </tr>
  <tr>
    <td style="padding: 15px;  border: 1px solid #ddd; text-align: left;" colspan="12">'.$description.'</td>
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
$headers .= 'From: ApplyForEmploymentUSC@uservicescorporate.com';
// Send Mail
mail($receivingMail, $títtle, $message, $headers);
echo "<script type='text/javascript'>alert('YOUR MAIL IS SENT SATISFACTORY'); location.href = 'onlineservices.html'</script>";
}
?>