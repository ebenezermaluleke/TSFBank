<!---<?php
  /*  $hostname="";
    $username="";
    $dbname="";
    $password="";
    $usertable="";
    $colomnname="";

    mysql_connect($hostname,$username,$password) OR ()die("unable to connect to db");
    mysql_select_db($dbname);
    $query="select * from $usertable";
    $result=mysql_query($query);
*/
?>
---->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <title>TFS Bank</title>
</head>
<body>
    <div class="Deshboard-header">
        <h2><a href="index.php">TFS Bank</a></h2>
        <ul>
            <li><a href="ViewCustomer.php">View Customers</a></li>
            <li><a href="History.php">Transfer History</a></li>
        </ul>

    </div>

    <div class="container">
        <div class="Deshboard-menus">
            <ul>
                <a href="ViewCustomer.php"><li>View Customers</li></a>
                <a href="History.php"><li>Transfer History</li></a>
            </ul>
        </div>

        <div class="content">
            <h2>Welcome to TFS Bank Transfer</h2>
        </div>
    </div>

</body>
</html>