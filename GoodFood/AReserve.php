<?php           //Checking if admin is signed in or else this page is not allowed to see//
session_start();
if(!isset($_SESSION["sess_user"])){
 header("location:Home.php");
}
else {
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
    </head>
    <body>
        <table id="main_table" class="exclude_style">
            <tr>
                <td>
                   <div class="logo">
                        <h2>GOOD FOOD ADMIN PAGE</h2>
                    </div>
                </td>
                <td>
                    <div class="navbar">
                        <a href="AOrder.php">Orders</a>
                        <a href="Add.php">Add Menu</a>
                        <a href="Edit.php">Edit Menu</a>
                        <a href="AReserve.php">Reservations</a>
                        <a href="AFeedback.php">Feedbacks</a>
                    </div>
                </td>
                    <td>
                    <div class="sign">
                    <p><?=ucwords($_SESSION['sess_user']);?> |  <!--ucwords is added to make admin name uppercased-->
                    <a href="SignOut.php">Sign Out</a>
                    </p>
                    </div>
                </td>
            </tr>
        </table>
        <br><br>

        <center>
        <table border=1 style="border-collapse:collapse; font-family:Arial; font-weight:normal;">
            <thead style="height:80px; background:#E2C2B3; color:#403234;">
                <th>No.</th>
                <th>Customer Email</th>
                <th>Time</th>
                <th>Date</th>
                <th>People</th>
            </thead>
            <tbody>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "goodfood";
            $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");

            $sql = "SELECT * FROM reservation ORDER BY id DESC"; //DESC to make last reservation appear in table first
            $query = $conn->query($sql);
            while($row = $query->fetch_array())
            {
                ?>
                <tr style="height:40px;">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo date('M d, Y', strtotime($row['date'])) ?></td> <!--Formating date to appear neatly-->
                <td><?php echo $row['people']; ?></td>
                </tr>
                <?php
            }?>
            </tbody>
        </table>
        </center>

        <br><br><br>
        <center> <!--For going back to top of the page-->
            <a href="#Top" style="color: #403234; font-family: Arial; font-weight: bolder; text-decoration: none; font-size: 12px;
            display: inline-block; background-color: #E2C2B3; width: 110px; height: 23px; border-radius: 30px; padding-top: 8px;">
                BACK TO TOP
            </a>
        </center>
        <br><br>
        <hr style="border: 1px solid #E2C2B3;"> <!--Line for decoration-->
        <br><br>
        </center>
    </body>
</html>
<?php
}
?>