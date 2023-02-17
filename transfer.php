<?php session_start() ?>

<!doctype html>

    <head>

        <title>transfer</title>

        <style>

            a
                {
                    text-decoration: none;
                    color: rgb(255, 255, 255); 
                    text-align:center;    
                }

            p
            {
                margin-top:4%;
                font-size: 175%;
                text-align:center;
                color:rgb(255, 255, 255);
            }

            .tramh
                {
                    text-align:center;
                    color:rgb(255, 255, 255);
                    font-size:3vw;
                }

            .amount
            {
                margin-left:auto;
                margin-right:auto;
                justify-content: center;
            }

            .btn
            {
                text-decoration: none;
                color:rgb(255, 255, 255);
                font-size: 175%;
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

    <?php $sender = $_SESSION['id']; ?>

        <form method="POST" action="transaction.php">

        <h3 class="tramh">Amount To Be Transfered</h3>
        
        <br>
        <center>
        <input type="number" id="amount" name="amount" min="0" class="amount" required>
        </center>
        <br>
        <input type="hidden" name="sender" value="<?php echo $sender ?>">
        <center>
        <h3 class="tramh">The Receiver</h3>
        </center>
        <center>
        <select name="receiver" id="receiver" required>

        <?php

            include "connect.php";
            $query="SELECT * from`customers` WHERE customer_id<>'$sender' ";
            $conn=mysqli_query($db_connect,$query);

            while($row = mysqli_fetch_assoc($conn))
            {
                echo" 
                <option value={$row['customer_id']}>".$row['customer_name']."</option>";
            } ?>
        
        
        </select>
        </center>
        <br>
        <br>
        <center>
        <button type="submit" class="btn">Transfer</button>
        </center>
        </form>

    
  
  <a href="customerlist.php"><p>Back</a></p>
    
    </body>


</html>