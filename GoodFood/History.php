<html>
    <head>
        <meta charset='utf-8'>
        <title>Our story</title>
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

        <center style="padding: 50px; margin-left: 320px; margin-right: 320px; padding-left: 80px; padding-right: 80px;
        background-color: #E2C2B3; font-size: 17px; border-radius: 15px;">
            <p>
                <br>
                <center>
                    <img src="Images/small rest.png" alt="This is photo of Good Food on year 2001." width="400px" height="400px"><br><br>
                    <p style="font-weight: bolder;"><u>FIRST DAY OF GOOD FOOD, FIRST STEP OF US</u></p>
                </center><br><br><br>
                Since opening our doors on June 13, 2001, Good Food has embarked on an extraordinary journey, captivating the hearts and palates of food enthusiasts far and wide. What began as a humble establishment soon transformed into a culinary destination that people couldn't resist.<br><br>
                Word of mouth played a significant role in the growth of Good Food. As patrons indulged in our mouthwatering dishes, they couldn't help but share their delightful experiences with family and friends. Our dedication to quality and the unforgettable flavors we crafted became the talk of the town, drawing more and more curious diners through our doors.<br><br>
                As our popularity soared, we recognized the need to expand our space to accommodate the growing demand. In 2005, we made the momentous decision to relocate to a larger, more spacious location, allowing us to welcome even more guests and create a truly immersive dining atmosphere. The move was met with overwhelming support from our loyal customers, and it marked a significant milestone in the history of Good Food.<br><br>
                With the expanded space, we were able to introduce exciting new elements to enhance the dining experience. A beautifully designed bar area was added, offering a curated selection of fine wines and craft cocktails to complement our delectable menu. The ambiance was carefully crafted to create a warm and inviting atmosphere that would make guests feel right at home while savoring their culinary journey.<br><br>
                In addition to physical expansion, Good Food embraced the digital age to connect with a wider audience. We launched a sleek and user-friendly website, allowing customers to explore our menu, make reservations, and stay updated on special events and promotions. Active engagement on social media platforms further helped us to foster a vibrant community of food enthusiasts who shared their love for Good Food online, spreading the word even further.<br><br>
                As our reputation grew, we began to attract attention from renowned food critics and influencers. Our unique culinary offerings and commitment to exceptional flavors caught the eye of influential tastemakers, leading to favorable reviews and features in prestigious publications. The positive exposure further solidified Good Food's status as a must-visit dining destination.<br><br>
                Through strategic partnerships and collaborations, Good Food extended its reach beyond the restaurant walls. We participated in local food festivals, showcasing our culinary expertise and forging connections with fellow food lovers and industry professionals. Our presence at these events allowed us to introduce our brand to new audiences and create lasting impressions that translated into an ever-growing customer base.<br><br>
                Today, Good Food stands as a testament to the power of passion, innovation, and an unwavering dedication to culinary excellence. Our journey from a modest establishment to a renowned restaurant has been shaped by the support and enthusiasm of our incredible customers. We remain committed to delivering unforgettable dining experiences and continuing to exceed expectations as we write the next chapter of our remarkable story.<br><br>
                Join us at Good Food, where dreams become reality on a plate, and indulge in a culinary adventure that will leave a lasting impression on your taste buds and your heart.<br><br><br><br>
                <center>
                    <img src="Images/big rest.png" alt="This is photo of Good Food on year 2023." width="400px" height="400px"><br><br>
                    <p style="font-weight: bolder;"><u>GOOD FOOD IN THE PRESENT TIME</u></p>
                </center><br><br><br><br>
                <center>
                    <img src="Images/inside.png" alt="This is photo of inside of Good Food on year 2023." width="400px" height="400px"><br><br>
                    <p style="font-weight: bolder;"><u>WELCOME TO OUR BIGGER AND FANCIER GOOD FOOD</u></p>
                </center><br>
            </p>
        </center>
        <center>
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
                        <a href="ASignIn.php">Sign In</a> <!--For admins to sign in-->
                        </p>
                    </div>
                </td>
            </table>
        </center>
    </body>
</html>