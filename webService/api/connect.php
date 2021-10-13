<?php

    $dbhost= "localhost";
    $dbuser = "root";
    $dbpass ="";
    $db ="tsfbank";

    //create connection
    $conn = new mysqli($dbhost,$dbuser, $dbpass, $db);
    if($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }
    $result = [];
    $sql = $conn->query("SELECT * FROM `customer`");
    /*if($sql->num_rows>0){
        while($rows = $sql->fetch_array(MYSQLI_ASSOC)){
          //echo "<br> Name:".$rows["C_Name"];
          $result[] = $rows;
        }
    }else{
        echo "0 results";
    }*/

    for($x =0; $x <$sql->num_rows;$x++){
        $sql->data_seek($x);
        $result[$x]= $sql->fetch_array(MYSQLI_ASSOC);
    }

    $response =array(
        "Success" =>"true",
        "message"=>"",
        "data" =>$result
    );
    echo json_encode($response);
   // $conn->close();

?>