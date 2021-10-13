<?php

    $dbhost= "localhost";
    $dbuser = "root";
    $dbpass ="";
    $db ="tsfbank";

    //attributes
    $to = null;
    $from = null;
    $status = false;
    $newbalance=null;
    $time = date('d-m-y h-i-s');
    //get data
    if(!empty($_GET)){
        $from = $_GET['from'];
        $newbalance = $_GET['newbalance'];
        $to = $_GET['to'];
        $status = true;
    }
    $response= null;
    $result = null;
    //get==true
    if($status){
        //create connection
        $conn = new mysqli($dbhost,$dbuser, $dbpass, $db);
        if($conn->connect_error){
            die("Connection failed" . $conn->connect_error);
        }
        
        $updateSQL = $conn->query("INSERT INTO `transaction`(`T_id`, `T_sender`, `T_receiver`, `T_amount`, `T_date`) VALUES (null,'{$from}','{$to}','{$newbalance}','{$time}') ");
            if(!$updateSQL){

                $response =array(
                    "Success" =>"true",
                    "message"=>"transfer received",
                    "data" =>$result
                );
                die(json_encode($response));
            }  
    }

    $response =array(
        "Success" =>"true",
        "message"=>"",
        "data" =>$result
    );
    echo json_encode($response);
   // $conn->close();

    //select from a then send to b

?>