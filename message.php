<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_reservation.php";

//initial config
DatabaseConnect();
$message = new TReservation($GLOBALS['connection']);
if(!isset($_SESSION["MessageCounter"])){
    $_SESSION["MessageCounter"]=0;
}
if(!isset($_SESSION["lastMessage"])){
    $_SESSION["lastMessage"]=array(
        "fullname"=>"",
        "persons"=>"",
        "phone"=>"",
        "email"=>"",
        "time"=>""
    );
}

if($_SESSION["MessageCounter"]<=MSG_LIMIT
&& isset($_POST["fdate"])
&& isset($_POST["ftablesize"])
&& isset($_POST["fname"])
&& isset($_POST["fmail"])
&& isset($_POST["fphone"])){
    //below execution limit
    if($_SESSION["lastMessage"]["time"]!==htmlspecialchars($_POST["fdate"])
    && $_SESSION["lastMessage"]["persons"]!==htmlspecialchars($_POST["ftablesize"])
    && $_SESSION["lastMessage"]["fullname"]!==htmlspecialchars($_POST["fname"])
    && $_SESSION["lastMessage"]["email"]!==htmlspecialchars($_POST["fmail"])
    && $_SESSION["lastMessage"]["phone"]!==htmlspecialchars($_POST["fphone"])){
    if($message->insert(htmlspecialchars($_POST["fname"]),
        htmlspecialchars($_POST["ftablesize"]),
        htmlspecialchars($_POST["fphone"]),
        htmlspecialchars($_POST["fmail"]),
        htmlspecialchars($_POST["fdate"]))){
            include "confirm.php";
        }
        else{
            //message already exists
            $_SESSION["errorMessage"] = "Your message was already registered";
            include "error.php";
            
        }
    }
    else{
        //message already exists
        $_SESSION["errorMessage"] = "Your message was already registered";
        include "error.php";
    }
}
else{
    //when execution limit exceeded
    $_SESSION["errorMessage"] = "Message limit exceeded";
    include "error.php";
}

?>