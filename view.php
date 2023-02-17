<?php session_start() ?>

<!doctype html>

    <head>

        <title>customerdetails</title>
        <style>
            body
            {
                background:linear-gradient(to right, rgba(0, 0, 255, .7),rgba(80, 0, 80, .7), rgba(255, 0, 0, .7)); 
            }

            a{
                text-decoration: none;
                color:rgb(255, 255, 255);
            }

            .cuinh
                {
                    text-align:center;
                    color:rgb(255, 255, 255);
                    font-size:3vw;
                }

            table
            {
                    border: 2px;
                    margin-left: auto; 
                    margin-right: auto;
                    margin-top: 5%;
                    width: 60%;
                    text-align:center;
                    color:rgb(0, 0, 255);
                    border:1px solid;
                    font-size:x-large;
                    border-collapse: collapse;
                    background-color: #ffffff;
            }

            td
            {
                
                border:1px solid;
                padding: 5px;
                font-size: 125%;
            }

            p{
                margin-top:4%;
                font-size: 125%;
                text-align:center;
                color:rgb(255, 255, 255);
            }


        </style> 

    </head>

    <body>
        <h3 class="cuinh">Customer Information</h3>
          
        <?php

        include "connect.php";
        $id=$_GET['id'];       
        $query="SELECT * from`customers` where customer_id='$id'";
        $_SESSION['id']=$id;
        $conn=mysqli_query($db_connect,$query);

        while($row = mysqli_fetch_assoc($conn))
        {
            echo"<table>
                <tr><td>CUSTOMER ID</td><td> "
                .$row['customer_id']."</td></tr>
                <tr><td>CUSTOMER NAME </td><td>"
                .$row['customer_name']."</td></tr>
                <tr><td>EMAIL ID </td>
                <td> ".$row['email_id']."</td></tr>
                <tr><td>BALANCE</td>
                <td>".$row['current_balance']."</td></tr>
                </table>";
        }
        

    ?>
    
    <br>
    <a href="transfer.php"><p>Transfer Money</p></a>

   

    

    <br>
    <a href="customerlist.php"><p>Back To Customer List</a>
    </p>
    </body>

</html>