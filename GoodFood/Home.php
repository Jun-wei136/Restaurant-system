<html>
    <head>
        <meta charset='utf-8'>
        <title>Good Food</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        <script>
            //function for changing images when cursor is on it//
            function changeImage(x){
                x.src = "Images/Menu2.jpg"
            }
        
            function restoreImage(x){
                x.src = "Images/Menu.jpg"
            }

            //Applying Java redirection//
            function redirectToOrderPage(){
               window.location.href = "Order.php";
            }

            function redirectToMenuPage(){
               window.location.href = "Menu.php";
            }

            function redirectToReservePage(){
               window.location.href = "Reserve.php";
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

        <table>
            <tr>
                <td>
                    <img src="Images/penne arrabbiata.webp"
                    alt="This is a photo of penne arrabiata" width="830px">
                </td>
                <td style="background-color: #dcce9de1; width: 100%; padding: 30px;">
                    <h1>TRY OUT!
                    <br>
                    Our Brand New Dish</h1>
                    <br><br>
                    <h1 style="font-style: italic; color: #df3636f0;">"PENNE ARRABBIATA"</h1>
                    <br><br><br>
                    <p style="font-family: Arial;">Al dente penne pasta infused with a zesty blend of crushed red peppers, garlic, and sun-ripened tomatoes, creating a spicy tomato sauce that will leave you craving more.<br> 
                       Prepare to delight in the perfect balance of heat and tanginess, crafted to perfection for those who love a fiery culinary adventure.</p>
                    <br><br>
                    <p><button onclick="redirectToOrderPage()">Order Now</p>
                </td>
            </tr>
        </table>
        <br><br><br>

        <table>
            <tr>
                <td style="background-color: #8db88bdc; width: 100%; padding: 30px;">
                    <h1>EVERYONE LOVES IT!
                    <br>
                    Our Signature Dish</h1>
                    <br><br>
                    <h1 style="font-style: italic; color: #84633cd7;">"GRILLED SALMON WITH LEMON BUTTER SAUCE"</h1>
                    <br><br>
                    <p style="font-family: Arial;">Immerse yourself in the delicate harmony of flame-kissed salmon fillet, expertly seasoned and topped with a luscious lemon butter sauce that adds a citrusy tang to each delectable bite.<br>
                       Elevate your dining experience with this exquisite dish that will leave your taste buds swimming in pure bliss.</p>
                    <br><br>
                    <p><button onclick="redirectToOrderPage()">Order Now</p>
                </td>
                <td>
                    <img src="Images\Grilled Salmon with Lemon.jpg"
                    alt="This is a photo of grilled salmon" width="830px">
                </td>
            </tr>
        </table>
        <br><br><br>

        <table>
            <tr>
                <td style="transition: 5s ease-in-out;">
                    <img src="Images\Menu.jpg"
                    alt="This is a photo of several dishes" width="830px" onmouseover="changeImage(this)" onmouseout="restoreImage(this)">
                </td>
                <td style="background-color: #E2C2B3; width: 100%;">
                    <h1 style="font-family: Arial;">CHECK EVERY ITEM!
                    <br><br>
                    See Our Full Menu Here...</h1>
                    <br><br><br>
                    <p><button onclick="redirectToMenuPage()">Full Menu</p>
                </td>
            </tr>
        </table>
        <br><br><br>

        <table>
            <tr>
                <td>
                    <img src="Images/Table.jpg"
                    alt="This is a photo of a dining table" width="700px">
                </td>
                <td style="background-color: #896c4fe8; width: 100%; padding: 30px;">
                    <h1 style="font-family: Arial;">Ready To Secure Your Spot For An Unforgettable Dining Experience?
                    <br>
                    Reserve Your Table Now And <br>Guarantee A Seat At Our Restaurant.</h1>
                    <br><br><br>
                    <p><button style="width: 150px;" onclick="redirectToReservePage()">Reserve Now</p>
                </td>
            </tr>
        </table>
        <br><br><br><br><br>
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