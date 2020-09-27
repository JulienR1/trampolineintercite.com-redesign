<?php
session_start();

if(!isset($_POST["sendmail-btn"])){
    header("Location: /" . $_SESSION["currentPage"]);
    exit();
}

$mailIsValid = true;
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $mailIsValid = false;
}

$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$mail = $_POST["email"];
$subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
$msg = filter_var($_POST["msg"], FILTER_SANITIZE_STRING);

if(empty($name) || !$mailIsValid || empty($subject) || empty($msg)){
    $urlAppend = "mailing=error&name=$name&subject=$subject&msg=$msg&mail=";
    if($mailIsValid){
        $urlAppend .= $mail;
    }
    header("Location: /" . $_SESSION["currentPage"] . "?" . $urlAppend);
    exit();
}

$receiver = "julrousseau20@gmail.com";
$headers = "From: " . $mail;

mail($receiver, $subject, $msg, $headers);
header("Location: /" . $_SESSION["currentPage"] . "?mailing=success");
exit();