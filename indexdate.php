<?php
include("Datebase.php");
$token ='00001111aaaa2222rrrr3333ttttxxxx';
if($_REQUEST['token']==$token){
    $sql ="insert into Date_customer(name,email,roomnumber,phonenumber,complaint) values('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['roomnumber']."','".$_REQUEST['phonenumber']."','".$_REQUEST['complaint']."')";
    $result = $link ->query($sql);

}