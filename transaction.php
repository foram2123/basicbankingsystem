<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Transaction</title>
    <style>

    .ann
        {
            margin-top:20%;
            margin-left:10%;
            font-size:3vw;
            color:rgb(255, 255, 255);
        }

    .backtolist
        {
            text-decoration: none;
            margin-left:10%;
            font-size:3vw;
            color:rgb(255, 255, 255);
            background:rgba(0,0,0,0);
            border:none;
        }

    body
        {
            background:linear-gradient(to right, rgba(0, 0, 255, .7),rgba(80, 0, 80, .7), rgba(255, 0, 0, .7)); 
        }

    </style>
    
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            include 'connect.php';

            $amount=$_POST['amount']; 
            $receiver=$_POST['receiver'];
            $sender = $_POST['sender'];


            $query="SELECT `customer_id` from customers WHERE customer_id=$receiver";
            $conn=mysqli_query($db_connect,$query);
            $row=mysqli_fetch_assoc($conn);
            $receiver=$row['customer_id'];


            $query="SELECT `customer_id` from customers WHERE customer_id=$sender";
            $conn=mysqli_query($db_connect,$query);
            $row=mysqli_fetch_assoc($conn);
            $sender=$row['customer_id'];


            $query="UPDATE customers SET current_balance=current_balance-$amount WHERE customer_id=$sender";
            $conn=mysqli_query($db_connect,$query);
           

            $query="UPDATE customers SET current_balance=current_balance+$amount WHERE customer_id=$receiver";
            $conn=mysqli_query($db_connect,$query);

            

            $query = "INSERT INTO `transfer` (`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount') ";
            $conn = mysqli_query($db_connect,$query);
        
        }
        ?>    
<center>
<h1 class="ann"> Transaction Completed</h1>
        </center>
        <center>
    <a href="./customerlist.php" class="back">
        <button class="backtolist">Back To Customers List</button>
    </a>
    </center>
</body>
</html>