<?php

if(!isset($_SESSION)){
    session_start();
}

include_once('../dbconnection.php');

// Insert Contact us detail
if(isset($_POST['clientEmail']) && isset($_POST['client_name']) && isset($_POST['client_email']) && isset($_POST['project_num']) && isset($_POST['message'])){
    $client_name = $_POST['client_name'];
     $client_email = $_POST['client_email'];
    $project_num = $_POST['project_num'];
    $message = $_POST['message'];
    $sql = "INSERT INTO contactus(name, project_num, contact_email, contact_desc) VALUES ('$client_name', '$project_num', '$client_email', '$message')";

    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }

}
