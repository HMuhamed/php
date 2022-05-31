<?php
error_reporting(E_ERROR | E_PARSE);
$msg = $_POST['msg'];
$to = $_POST['to'];
$subject = $_POST['Subject'];
$msg = wordwrap($msg,70);
try{
    mail($to,$subject,$msg);
    throw new Exception;

}catch(Exception $e){
    echo "Nuk eshte i mundur dergimi i mesazhit per shkak se nuk kemi konfigurim te portit SMTP<br>";
}
finally{
    echo "Finally block. Aborting the message to send";
}