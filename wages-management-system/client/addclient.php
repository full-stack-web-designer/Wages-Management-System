<?php

if(!isset($_SESSION)){
    session_start();
}

include_once('../dbconnection.php');

//Check email already exist and not
if(isset($_POST['checkemail']) && isset($_POST['clientemail']))
{
     $clientemail = $_POST['clientemail'];
     $sql = "SELECT c_email FROM client WHERE c_email = '".$clientemail."'";
     $result = $conn->query($sql);
     $row = $result->num_rows;
     echo json_encode($row);
}

// Insert Client
if(isset($_POST['clientsignup']) && isset($_POST['clientname']) && isset($_POST['clientemail']) && isset($_POST['clientpass'])){
    $clientname = $_POST['clientname'];
    $clientemail = $_POST['clientemail'];
    $clientpass = $_POST['clientpass'];
     $hashPass = password_hash($clientpass, PASSWORD_BCRYPT);
    $sql = "INSERT INTO client(c_name, c_email, c_pass) VALUES ('$clientname', '$clientemail', '$hashPass')";

    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }

}


//Client login verification
if(!isset($_SESSION['is_login'])){
        if(isset($_POST['checkLogEmail']) && isset($_POST['clientLogemail']) && isset($_POST['clientLogpass']))
        {
            $clientLogEmail = $_POST['clientLogemail'];
            $clientLogPass = $_POST['clientLogpass'];

            $sql = "SELECT c_email, c_pass FROM client WHERE c_email = '".$clientLogEmail."'";
            $result = $conn -> query($sql);
             $row1 = $result -> fetch_assoc();
            $oldpass = $row1['c_pass'];
            if(password_verify($clientLogPass, $oldpass)){
           
            $row = $result -> num_rows;

            if($row === 1)
            {
                $_SESSION['is_login'] = true;
                $_SESSION['clientLogEmail'] = $clientLogEmail;
                echo json_encode($row);
            }
            else if($row === 0)
            {
                 echo json_encode($row);
            }
        }
        }
}
?>