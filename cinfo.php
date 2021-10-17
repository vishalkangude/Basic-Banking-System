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
    <title>All Customers </title>
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
            background-repeat: inherit;


        }

        body:before {
            content: "";
            position: absolute;
            /* background: url('./world-map.png'); */
            background-size: cover;
            z-index: -1;
            height: 20%;
            width: 20%;
            transform: scale(8);
            transform-origin: top left;
            filter: blur(1px);
        }
    </style>

    <!-- logo + navbar  -->
    <!-- NEW ADDED NAVBAR  -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h2>Welcome to the Bank Of Maharashtra</h2>
                </a>
                <!-- <button type="button" class="btn col-lg-1 pt-2 my-1 btn-danger" data-toggle="modal"
                    data-target="#myModal">About</button> -->
                <a class="col-lg-1 pt-2 my-1" target="_blank"
                    href="https://www.onlinesbi.com/"><button type="button"
                        class="btn btn-danger">Help</button></a>
            </div>
        </nav>
    </div>
    <div class="mt-3 pl-3"><a class="text-decoration-none" href="index.html"><i class="fas fa-arrow-left"></i> Back To
            Home</a></div>

    <!-- customers table  -->
    <div class="container p-5  text-white">

        <h2>All Customers name, mail-id , and option to view their profile is here.</h2>
        <p>From here you can also transfer money to customers of our bank </p>
        <table class="table text-white">
            <thead class="thead-light">
                <tr>
                    <th class="font-weight-bolder">First Name </th>
                    <th class="font-weight-bolder">Last Name </th>
                    <th class="font-weight-bolder">Mail Id </th>
                    <th class="font-weight-bolder">Actions </th>
                </tr>
            </thead>

            <?php
require 'conn.php' ;

$sql = "SELECT * FROM  `customers`  ";

$res = $con->query($sql);

if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
      echo  ' <form method="get"  action="viewcust.php" class="text-danger"><tr><th>'. $row["firstname"] .'</th><th>'.$row["lastname"].'</th><th>'.$row["mail_id"].'</th><th><div class="btn-group"><button type="submit" class="btn btn-sm btn-success "> <i class="fas fa-eye p-1"></i> View</button><input type="hidden" name="id" value="' .$row["cust_id"]. '"><div class="p-1"></div></div></th></tr></form>';
     
    }
  } else {
    echo "0 results";
  }

?>


        </table>

    </div>

</body>

</html>