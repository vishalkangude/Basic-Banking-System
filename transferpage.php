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
    <title>TransferPage</title>
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
            transform: scale(5);
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

    <!-- container for amount transfer data form  -->
    <div class="container my-4 p-3 bg-dark text-white rounded shadow-lg centered border border-secondary">
        <h2>Send money to Another Customer.</h2>
        <form action="transferpage.php" method="POST">
            <div class="form-group">
                <label for="">Select Sender :</label>
                <select class="form-control" name="sender">
                    <option value="">Sender Account</option>
                    <?php
                                        require "conn.php";
                                        $sql = "SELECT firstname , lastname , cust_id FROM  `customers`  ";
                                        $res = $con->query($sql);
                                        if ($res->num_rows > 0) {
                                            // output data of each row
                                            while($row = $res->fetch_assoc()) {
                                            echo  ' <option value=" '. $row["cust_id"] . ' ">'.$row["cust_id"].'  '. $row["firstname"].' '.$row["lastname"] .'</option> ' ;
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                            ?>

                </select>
            </div>

            <div class="form-group">
                <label for="">Select Receiver</label>
                <select class="form-control" name="receiver">
                    <option value="">Receiver Account</option>
                    <?php
                                require "conn.php";
                                $sql = "SELECT firstname , lastname , cust_id FROM  `customers`  ";

                                $res = $con->query($sql);

                                if ($res->num_rows > 0) {
                                    // output data of each row
                                    while($row = $res->fetch_assoc()) {
                                    echo  ' <option value="'.$row["cust_id"].'">'.$row["cust_id"].' '. $row["firstname"].' '.$row["lastname"] .'</option> ' ;
                                    }
                                } else {
                                    echo "0 results";
                                }
                                
                                ?>
                </select>

            </div>

            <div class="form-group">
                <label for="">Enter Amount : </label>
                <input class="form-control" type="text" placeholder="Amount " name="amt">
            </div>
            <button class="btn btn-primary" type="submit">Transfer</button>
        </form>
    </div>






    <!-- form for sender and receiver info and amount  -->
    <?php 
            if(isset($_POST['sender'])){
                    require "conn.php";
                    $sender = $_POST['sender'];
                    $rec =  $_POST['receiver'];
                    $amt = $_POST['amt'];

                     
                    // echo $amt ;
                    // echo $sender ;
                    // echo $rec ;
                    $sql = "SELECT *   FROM  `customers` WHERE cust_id=$sender  ";

                    $res = $con->query($sql);

                    if ($res->num_rows > 0) {
                        // output data of each row
                        while($row = $res->fetch_assoc()) {
                            $sbalance = $row["balance"];
                            $sname = $row["firstname"];
                            $sname .= $row["lastname"] ;
                         }
                        }
                        $samt = $sbalance - $amt ;
                    
                    $sql = "UPDATE customers SET balance = $samt WHERE cust_id=$sender ";
                    $sres = $con->query($sql);
                    
                    $sql = "SELECT * FROM customers WHERE cust_id = $rec ";
                    $res = $con->query($sql);

                    if ($res->num_rows > 0) {
                        // output data of each row
                        while($row = $res->fetch_assoc()) {
                            $rbalance = $row["balance"];
                            $rname = $row["firstname"] ;
                            $rname .= $row["lastname"] ;
                        }
                        }

                    $ramt = $rbalance + $amt ;
                    $sql = "UPDATE customers SET balance = $ramt WHERE cust_id=$rec ";
                    $rres= $con->query($sql);

                    if($sres and $rres == 1){
                        echo('<script>alert("Successfull !! Transfer Completed !!! Thank you Visit Again.");</script>');

                        $sql = "INSERT INTO `transactions`( `sender`, `receiver`, `amount`, `date`) VALUES ('$sname' , '$rname' ,'$amt' , current_timestamp()); ";    
                        $res = $con->query($sql);      
                         
                        
                    }
                    
                    // echo "Sender Balance ".$samt ;
                    // echo "Receiver Balance".$ramt ;
            }else{
                
            }
                    
                    ?>



</body>

</html>