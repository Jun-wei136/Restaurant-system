<html>
    <head>
        <meta charset='utf-8'>
        <title>Viewing Menu</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        <script>
            function redirectToOrderPage(){
               window.location.href = "Order.php";
            }
        </script>
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
                session_start();
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
        <br><br><br>

        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "goodfood";
        $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
        ?>
        <center>
        <!--This table has fixed category sessions which use the same codes so I will only write comments for the first session-->
        <table class="exclude_style"
        style="background:#403234; color:#A77C37; font-weight:normal; border:5px solid #705103; border-collapse:collapse;">

            <!--Table session for "appetizers"-->
            <tr><th colspan=3 style = "text-align: center; height:120px;"><h1>FOOD MENU</h1></th></tr>
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>APPETIZERS</h2></th></tr>
            <tr>
            <?php
            $show = 0; //Setting $show at 0 which will increase everytime an item is added to table
            $sql = "SELECT * FROM menu WHERE category = 'appetizers'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){ //Since $show is set at 0, condition must not be 0
                    echo '</tr><tr>'; //Jumping to a new row after every 3 items is added to table
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++; //Increasing of $show after adding an item
            }
            ?>
            </tr>

            <!--Table session for "soups"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>SOUPS</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'soups'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>

            <!--Table session for "salads"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>SALADS</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'salads'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>

            <!--Table session for "main courses"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>MAIN COURSES</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'main courses'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>

            <!--Table session for "pasta"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>PASTA</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'pasta'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>

            <!--Table session for "burgers and sandwiches"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>BURGERS AND SANDWICHES</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'burgers and sandwiches'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>

            <!--Table session for "desserts"-->
            <tr><th colspan=3 style = "text-align: center; height:80px; border-top:3px solid #705103;"><h2>DESSERTS</h2></th></tr>
            <tr>
            <?php
            $show = 0;
            $sql = "SELECT * FROM menu WHERE category = 'desserts'";
            $query=$conn->query($sql);
            while($row=$query->fetch_array()){
                if($show % 3 == 0 && $show!= 0){
                    echo '</tr><tr>';
                }
            ?>
            <td style="padding:20px; color:white;">
            <img src="<?php echo $row['pic'];?>" style="border:8px solid #705103;" controls width="350px" height="350px">
            <br><br><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>Price: $<?php echo $row['price'];?></td>
            <?php
            $show++;
            }
            ?>
            </tr>
            <tr><td colspan=3 style="height:100px; width:100%; border-top:3px solid #705103;">
                <button onclick="redirectToOrderPage()" style="background:#705103;">Order Now</td></tr>
        </table>
        </center>

        <br><br><br>
        <center>
            <p style="color: #687477; font-size: 16px; font-family: Arial;">"YOUR PRIVACY MATTERS TO US."<br>
               At Good Food, we are dedicated to protecting the personal information you provide.<br>
               Our privacy policy outlines how we collect, use, and safeguard your data,<br>
               ensuring your trust and confidence in our commitment to your privacy.</p>
            <br><br><br> <!--For going back to top of the page-->
            <a href="#Top" style="color: #403234; font-family: Arial; font-weight: bolder; text-decoration: none; font-size: 12px;
            display: inline-block; background-color: #E2C2B3; width: 110px; height: 23px; border-radius: 30px; padding-top: 8px;">
                BACK TO TOP
            </a>
        </center>
        <br><br>
        <hr style="border: 1px solid #E2C2B3;"> <!--Line for decoration-->
        <br>
        <center>
            <table style="color: black;">
                <tr>
                    <th></th>
                    <th>
                        <u>About us</u>
                    </th>
                    <th align="right">
                        <u>Contact us</u>
                    </th>
                </tr>
                <tr height="40px">
                    <td></td>
                    <td>
                        <div class="about">
                            <a href="History.php">Our Restaurant History</a>
                        </div>
                    </td>
                    <td align="right">
                        Phone Number:
                    </td>
                    <td align="left" style="padding-left: 5px;">
                        +1(555)123-4567
                    </td>
                </tr>
                <tr height="40px">
                    <td></td>
                    <td>
                        <div class="about">
                            <a href="Chefs.php">Our Chefs</a>
                        </div>
                    </td>
                    <td align="right">
                        Email Address: 
                    </td>
                    <td align="left" style="padding-left: 5px;">
                        <div class="about">
                            <a href="mailto:info@goodfoodrestaurant.com">info@goodfoodrestaurant.com</a> <!--Allowing users to send email-->
                        </div>
                    </td>
                </tr>
                <tr height="40px">
                    <td></td>
                    <td></td>
                    <td align="right">
                        Restaurant Location: 
                    </td>
                    <td align="left" style="padding-left: 5px;">
                        123 Main Street, 
                        Anytown, USA 12345
                    </td>
                </tr>
            </table>
            <br><br>
            <table class="exclude_style" height="70px" width="100%" style="background-color: #E2C2B3; font-family: Arial; color: black;">
                <td style="float: right; padding-left: 360px; padding-top: 25px;">Social Media Platforms:</td>
                <td>
                    <div class="endbar">
                        <a href="https://www.facebook.com/">
                            <img src="Images/fb.png" alt="Facebook" width="35px" height="35px"></img>
                        </a>
                        <a href="https://www.instagram.com/">
                            <img src="Images/instagram.png" alt="Instagram" width="35px" height="35px"></img>
                        </a>
                        <a href="https://twitter.com/">
                            <img src="Images/twitter.png" alt="Twitter" width="35px" height="35px"></img>
                        </a>
                        <a href="https://www.whatsapp.com/">
                            <img src="Images/whatsapp.png" alt="Whatsapp" width="35px" height="35px"></img>
                        </a>
                    </div>
                </td>
                <td>
                    <div class="sign">
                        <p>Are you admin?
                        <a href="ASignIn.php">Sign In</a> <!--For admins to sign in-->
                        </p>
                    </div>
                </td>
            </table>
        </center>
    </body>
</html>