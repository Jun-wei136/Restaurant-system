<?php     //Checking if admin is signed in or else this page is not allowed to see//
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
                    <p><?=ucwords($_SESSION['sess_user']);?> |  <!--ucword is added to make admin name uppercased-->
                    <a href="SignOut.php">Sign Out</a>
                    </p>
                    </div>
                </td>
            </tr>
        </table>
        <br>

        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "goodfood";
        $table_name = "feedback";
        $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
        $sql = "SELECT * FROM $table_name";
        $query=$conn->query($sql);
        ?>

        <center>
        <div style="height:580px; max-height:580px; width:1200px; overflow-y:scroll; border:1px solid #000;">
            <table border=2 class="exclude_style" style="height:100%; width:100%; font-family:Arial; border-collapse:collapse;">
                <tr><td colspan=3 style="height:80px; background:#E2C2B3"><h3>FEEDBACKS FROM CUSTOMERS</h3></td></tr>
                <tr style="background:#DEDEDE;"> 
                <?php   //$show is set at 0 and it will increase everytime an item is add
                $show = 0;
                while($row=$query->fetch_array()){
                    if($show % 3 == 0 && $show!= 0){  //as $show is set at 0, the condition must not contain 0 too
                        echo '<tr style="background:#DEDEDE;">'; //Jumping to another row after every 3 items is added
                    }
                ?>
                <td style="width:400px;"> <!--Each feedback item contains it owns 3 tr-->
                    <table border=2 style="width:100%; height:100%; margin-left:0px; margin-right:0px; 
                    font-family: Arial; text-align:left; font-weight:normal; border-collapse:collapse;">
                    <tr>
                        <td style="padding-left:20px; height:40px; width:70px;">Email</td>
                        <td style="padding-left:20px;"><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-left:20px; height:40px;">Subject</td>
                        <td style="padding-left:20px;"><?php echo $row['subject']; ?></td>
                    </tr>
                    <tr>
                        <td colspan=2 style="padding-left:20px; height:150px;"><?php echo $row['message']; ?></td>
                    </tr>
                </table>
                </td>
                <?php
                $show++;  //increasing $show
                if($show % 3 == 0){
                    echo '</tr>'; //Closing line for new row
                }
            }

            if($show % 3 !=0){
                echo '</tr>';  //Closing line for the whole <tr> where feedbacks appear
            }
            ?>
            </table>
        </div>
        </center>
    </body>
</html>
<?php
}
?>