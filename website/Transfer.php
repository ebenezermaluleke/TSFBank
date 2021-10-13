<?php
  $hostname="localhost";
    $username="root";
    $dbname="tsfbank";
    $password="";
    $usertable="customer";
    $colomnname="C_Name";

    $conn = new mysqli($hostname,$username,$password, $dbname);
    if($conn->connect_error){
        die("unable to connect to db");
    }
    $result= $conn->query("select * from $usertable");
  /*  mysql_connect($hostname,$username,$password) OR die("unable to connect to db");
    mysql_select_db($dbname);
    $query="select * from $usertable";
    $result=mysql_query($query);
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <title>TFS Bank</title>
</head>
<body>
    <div class="Deshboard-header">
        <h2>TFS Bank - Transfer money</h2>
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
            <form action="" id="Deshboard-form">
                <div class="input-field">
                    <label for="">Sender/From</label>
                    <input type="text" name="sender" id="sender" readonly required placeholder="">
                </div>
                <div class="input-field">
                    <label for="">Select Receiver</label>
                    <select name="receiver" id="receiver">
                        <option >Choose......!</option>
                        <?php
                            if($result){
                                while($row=$result->fetch_array(MYSQLI_ASSOC))
                                {
                                    $name=$row["$colomnname"];
                                    echo"<option>$name</option>";
                                    
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Available Balance</label>
                    <input type="number" placeholder="" required name="balance" readonly id="balance" >
                </div>
                <div class="input-field">
                    <label for="">Amount to transfer</label>
                    <input type="number" placeholder="0.00" required name="amount" id="amount" min="0" value="0" step="0.01" title="currency" pattern="^\d+(?:\.\d{1,2})?$" 
                    onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                </div>
                
                <div class="input-field">
                    <button id="btn-update" name="btn-update" class="btn">Transfer</button>
                </div>
                <div class="form-message"></div>
            </form>
        </div>
    </div>

   <script src="script/Transfer.js"></script>
</body>
</html>