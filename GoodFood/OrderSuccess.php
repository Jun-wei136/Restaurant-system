<?php //Checking if user actually order something. If not this page is not allowed to see
session_start();
if(!isset($_SESSION["sess_pid"])){
 header("location:Order1.php");
}
else {
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Order Receipt</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
    </head>
    <body>
        <table id="main_table" class="exclude_style">
            <tr>
                <td>
                   <div class="logo">
                        <h2>GOOD FOOD</h2>
                    </div>
                </td>
                <td>
                    <div class="navbar">
                        <a href="Home.php">Home</a>
                        <a href="Menu.php">Menu</a>
                        <a href="Order.php">Order Now</a>
                        <a href="Reserve.php">Reserve Table</a>
                        <a href="Support.php">Support</a>
                    </div>
                </td>
                <?php
                //The word of SignIn and SignOut will be changing according to whether user is logged in or not//
                if(isset($_SESSION['successfulSignin']) && $_SESSION['successfulSignin']==true){
                    echo '
                    <td>
                    <div class="sign">
                    <p>Ready to exit?
                    <a href="SignOut.php">Sign Out</a>
                    </p>
                    </div>
                    </td>
                    ';
                    //If user is signed in and ordered something, information about order is searched in database to fill the fields
                    $pid = $_SESSION['sess_pid'];
                    $total = $_SESSION['sess_total'];
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "goodfood";
                    $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");

                    $sql1 = "SELECT * FROM purchase_detail WHERE order_id = '".$pid."'"; //Searching via order_id which was stored in session
                    mysqli_select_db($conn, $database);
                    $result = mysqli_query($conn, $sql1);
                    if ($result) 
                    {
                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                        $productid[] = $row['menu_id']; //As there can be multiple items in order, IDs are placed in array 
                        $quantity[] = $row['quantity']; //As there can be multiple items in order, quantities are placed in array 
                    }
                    }
                }
                else{
                    echo '
                    <td>
                    <div class="sign">
                    <p>Have an account?
                    <a href="SignIn.php">Sign In</a>
                    </p>
                    </div>
                    </td>
                    ';
                }
                ?>
            </tr>
        </table>
        <br><br>

        <center><!--This is Receipt-->
        <h1 style="font-family:Arial;">Your Order is Confirmed!</h1><br>
        <h3 style="font-family:Arial;">Your food is now cooking. Delivery will contact you via phone when it is arrived.</h3>
        <br><br>
        <table class="exclude_style" border=2 style="font-weight:normal; border-collapse:collapse; font-family:Arial;">
        <tr><td colspan=5 style="height:80px; background:#403234; color:#E2C2B3;"><h1>YOUR ORDER ID: <?php echo $pid;?></h1></td></tr>
        <tr>
            <th style="width:400px; background:#E2C2B3; color:#403234;">ITEM</th>
            <th style="width:190px; background:#E2C2B3; color:#403234;">CATEGORY</th>
            <th style="width:120px; background:#E2C2B3; color:#403234;">PRICE</th>
            <th style="width:100px; background:#E2C2B3; color:#403234;">QUANTITY</th>
            <th style="background:#E2C2B3; color:#403234;">SUBTOTAL</th>
        </tr>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "goodfood";
        $x = 0; //Creating integer x to make array searching easier
        $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
        mysqli_select_db($conn,$database);

        for($x=0; $x<count($productid);$x++){ //for loop is added here to an add item to one row in table until array count in productid is done
        $sql = "SELECT * FROM menu WHERE id = '".$productid[$x]."'"; //Getting information of each item that exists in array
        $result = mysqli_query($conn,$sql);

        if ($result) 
        {
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
        $name=$row['name'];
        $category=$row['category'];
        $price=$row['price'];
        $multiply=$price*$quantity[$x]; //Calculating subtotal of each item in array by multiplying respective prices and quantities

        print "<tr><td style='height:40px;'>".$name."</td><td>".$category."</td><td> $".$price."</td><td>".$quantity[$x]."</td><td> $".$multiply."</td></tr>";
        }
        }
        else
        {
        die ("Query=$sql failed!");
        }
        }
        mysqli_close($conn);
        ?>
        <tr><td colspan=3></td><th style="width:100px;">TOTAL</th><td>$<?php echo $total;?></td></tr>
        </table>
        </center>
</body>
</html>
<?php
}
?>