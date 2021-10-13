<?php
 $dbhost= "localhost";
 $dbuser = "root";
 $dbpass ="";
 $db ="tsfbank";
 $colomnname="C_Name";
 //create connection
 $conn = new mysqli($dbhost,$dbuser, $dbpass, $db);
 if($conn->connect_error){
     die("Connection failed" . $conn->connect_error);
 }

 $receiver=$_GET['receiver'];
 $result = null;
 $sql = $conn->query("SELECT * FROM `customer` WHERE C_Name='{$receiver}'");

 
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

?>