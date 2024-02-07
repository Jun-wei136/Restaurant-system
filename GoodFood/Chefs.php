<html>
    <head>
        <meta charset='utf-8'>
        <title>Meet Chefs</title>
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
                <td>
                <?php
                session_start();
                //The word of SignIn and SignOut will be changing according to whether user is logged in or not//
                if(isset($_SESSION['successfulSignin']) && $_SESSION['successfulSignin']===true){
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
                </td>
            </tr>
        </table>
        <br><br><br>

        <center style="padding: 50px; margin-left: 100px; margin-right: 50px;
        background-color: #E2C2B3; font-size: 17px; border-radius: 15px;">
            <h2 style="font-family: Arial;">Meet Our Chefs</h2>
            <br><br><br>
            <table style="font-family: Arial;">
                <tr>
                    <td width="360px"><img src="Images/gordon.jpg" alt="Gordon Ramsay" width="300px" height="300px"></td>
                    <td width="360px"><img src="Images/reynold.jpg" alt="Reynold Poernomo" width="300px" height="300px"></td>
                    <td width="360px"><img src="Images/suu.jpg" alt="Suu Khin" width="300px" height="300px"></td>
                </tr>
                <tr>
                    <td width="360px"><br><li>Chef Gordon Ramsay</li></td>
                    <td width="360px"><br><li>Chef Reynold Poernomo</li></td>
                    <td width="360px"><br><li>Chef Suu Khin</li></td>
                </tr>
            </table>
            <br>
        </center>

        <center><!--For going back to top of the page-->
            <br><br><br>
                <a href="#Top" style="color: #403234; font-family: Arial; font-weight: bolder; text-decoration: none; font-size: 12px;
                display: inline-block; background-color: #E2C2B3; width: 110px; height: 23px; border-radius: 30px; padding-top: 8px;">
                    BACK TO TOP
                </a>
            </center>
            <br><br>
            <hr style="border: 1px solid #E2C2B3;">
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
                                <a href="mailto:info@goodfoodrestaurant.com">info@goodfoodrestaurant.com</a> <!--Allowing user to send email-->
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
                            <a href="ASignIn.php">Sign In</a><!--For admins to Sign in-->
                            </p>
                        </div>
                    </td>
                </table>
            </center>
        </body>
    </html>