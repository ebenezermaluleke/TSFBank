<?php

    $dbhost= "localhost";
    $dbuser = "root";
    $dbpass ="";
    $db ="tsfbank";

    //attributes
    $from = null;
    $status = false;
    $newbalance=null;
    //get data
    if(!empty($_GET)){
        $from = $_GET['from'];
        $newbalance = $_GET['newbalance'];

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
        //select sender
        $sql = $conn->query("SELECT * FROM `customer` where C_Id='{$from}'");
        
        //check if the sender is not null
        if($sql != null){

            $updateSQL = $conn->query("UPDATE `customer` SET `C_Balance`='{$newbalance}' WHERE C_Id='{$from}' ");
               if($updateSQL){

                $response =array(
                    "Success" =>"true",
                    "message"=>"transfer received",
                    "data" =>$result
                );
               }
            
        }
        
    }

    for($x =0; $x <$sql->num_rows;$x++){
        $sql->data_seek($x);
        $result= $sql->fetch_array(MYSQLI_ASSOC);
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