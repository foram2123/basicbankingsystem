<!doctype html>

    <head>

        <title>customerlist</title>

            <style>

            .culih
                {
                    text-align:center;
                    color:rgb(255, 255, 255);
                    font-size:150%;
                }

            .culi
                {
                    border: 2px;
                    margin-left: auto; 
                    margin-right: auto;
                    margin-top: 5%;
                    width: 60%;
                    text-align:center;
                    color:rgb(0, 0, 255);
                    border:1px solid;
                    font-size:large;
                    border-collapse: collapse;
                    background-color: #ffffff;
                }

            td
            {
                color: rgb(0, 0, 255); 
                border:1px solid;
                padding: 5px;
            }
            
            th
            {
                border:1px solid;
                color: rgb(255, 255, 255); 
                background-color: #0000ff;
                font-weight: bold;
                font-size: 135%;
                padding: 5px;    
            }

            tr:hover 
            {
                background-color: rgba(0, 255, 255, 0.3);                 
            }

            .aroot
                {
                    text-decoration: none;
                    color: rgb(255, 255, 255);                     
                }

            .tds
            {
                 text-decoration: none;
                color: rgb(0, 0, 255); 
            }    

            body
            {
                background:linear-gradient(to right, rgba(0, 0, 255, .7),rgba(80, 0, 80, .7), rgba(255, 0, 0, .7));  
            }

            p{
                margin-top:4%;
                font-size: 125%;
                text-align:center;
            }

        </style>

    </head>

    <body>

        <h3 class="culih">Customer List</h3>

        <table class="culi">
           
        <tr>

        <th>Customer Id</th>
        <th>Customer Name</th>
        

        </tr>
       <?php

        include "connect.php";
        $query="SELECT customer_id, customer_name from`customers`";
        $conn=mysqli_query($db_connect,$query);

        while($row = mysqli_fetch_assoc($conn)){
            echo"
            <tr>
            <td><a href='view.php?id={$row['customer_id']}' class='tds'>".$row['customer_id']."</a></td>
            <td><a href='view.php?id={$row['customer_id']}' class='tds'>".$row['customer_name']."</a></td>
            </tr>";
        }
             
        
        ?>
</table> <br>

<a href="index.php" class="aroot"><p>Back To Homepage</a></p>
    </body>
  
</html>