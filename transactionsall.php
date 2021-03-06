<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>All Transactions </title>
</head>

<body>
    <style>
        body {
            background-image: url("backimg.jpg");
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;

        }

        body:before {
            content: "";
            position: absolute;
            /* background: url('./world-map.png'); */
            background-size: cover;
            z-index: -1;
            height: 20%;
            width: 20%;
            transform: scale(6);
            transform-origin: top left;
            filter: blur(2px);
        }
    </style>


    <!-- logo + navbar  -->
    <!-- NEW ADDED NAVBAR  -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h2>Welcome to the National Bank of INDIA</h2>
                </a>
                <!-- <button type="button" class="btn col-lg-1 pt-2 my-1 btn-danger" data-toggle="modal"
                    data-target="#myModal">About</button> -->
                <a class="col-lg-1 pt-2 my-1" target="_blank"
                    href="https://www.rbi.org.in/Scripts/FAQDisplay.aspx"><button type="button"
                        class="btn btn-danger">Help</button></a>
            </div>
        </nav>
    </div>
    <div class="mt-3 pl-3"><a class="text-decoration-none" href="index.html"><i class="fas fa-arrow-left"></i> Back To
            Home</a></div>

    <!-- transactions table -->
    <div class="container p-3 text-white">
        <h2>Transactions List </h2>
        <p>Here you can see all the transactions from the bank </p>
        <table class="table text-white">
            <thead class="thead-light">
                <tr>
                    <th class="font-weight-bolder">Transaction Id </th>
                    <th class="font-weight-bolder">Sender Name </th>
                    <th class="font-weight-bolder">Receiver Name </th>
                    <th class="font-weight-bolder">Transaction Amount</th>
                    <th class="font-weight-bolder">Transaction Date </th>
                </tr>
            </thead>
            <?php
        require 'conn.php' ;
        
        $sql = "SELECT * FROM `transactions` ";
        
        $res = $con->query($sql);
        
        if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {
              echo  '<tr><th>'.$row["trans_id"].'</th><th>'.$row["sender"].'</th><th>'.$row["receiver"].'</th><th>'.$row["amount"].'</th><th>'.$row["date"].'</th></tr> ';
             
            }
          } else {
            echo "0 results";
          }
        
        ?>


        </table>

    </div>

</body>

</html>