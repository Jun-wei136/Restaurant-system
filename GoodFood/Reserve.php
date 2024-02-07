<html>
    <head>
        <meta charset='utf-8'>
        <title>Reserving Table</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        <script>
        window.addEventListener('DOMContentLoaded', function() {
            //Getting the current date
            var today = new Date();

            //Formating the date as YYYY-MM-DD
            var formattedDate = today.toISOString().substr(0, 10);

            //Setting the value into the field
            document.getElementById("myDateInput").value = formattedDate;
        });
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
        <br><br>

        <?php
        //Java validations are used in this form//
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $id = $_SESSION['sess_id']; //Getting user id from session
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'goodfood';

        $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

        $query = "SELECT * FROM member WHERE id='".$id."'";
        mysqli_select_db($conn, $database);
        $result = mysqli_query($conn, $query);
        $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $email = $myrow['email'];

        if($id==""){ //Validating if user is signed in. If not user will be sent to sign in page
            ?>
            <script>
            window.alert('Please sign in to reserve a table!');
            window.location.href='SignIn.php';
            </script>
            <?php
        }else{
            $query1 = "INSERT INTO reservation(email,time,date,people) 
            VALUES('".$email."','".$_POST['time']."','".$_POST['date']."','".$_POST['people']."')";
            mysqli_query($conn, $query1);
            ?>
            <script>
            window.alert('Your reservation is confirmed!');
            </script>
            <?php
        }
        mysqli_close($conn);
        }
        ?>

        <center>
        <form name="Reservation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
        style="width:1200px; height:478px; padding: 0px; border-radius:0px; background-color: #896c4fe8;">

                <table id="formtable" style="text-align: center; width: 100%; margin-left:0px; height: 100%;">

                <tr><td rowspan=5 style="padding:0px;"><img src="Images/Table.jpg"
                    alt="This is a photo of a dining table" width="700px" height="476px;"></td>

                    <td colspan=2 style="width:500px;;">TABLE RESERVATION FORM<br><br>
                    *For group of people more than 10, please contact our phone to make a reservation*</td></tr>

                    <tr><td colspan=2><select name="time" style="width: 350px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:5px;">
                    <option value="breakfast" selected>Breakfast</option>
                    <option value="brunch">Brunch</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                    </select></td></tr>

                    <tr><td colspan=2>
                    <input type="date" name="date" id="myDateInput" style="font-family:Arial"></td></tr>

                <tr><td style="text-align:right;">Number of People</td>
                    <td style="padding-left:10px;">
                    <select name="people" style="width: 100px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:5px; float:left;">
                    <option value="one" selected>One</option>
                    <option value="two">Two</option>
                    <option value="three">Three</option>
                    <option value="four">Four</option>
                    <option value="five">Five</option>
                    <option value="six">Six</option>
                    <option value="seven">Seven</option>
                    <option value="eight">Eight</option>
                    <option value="nine">Nine</option>
                    <option value="ten">Ten</option>
                    </select></td></tr>

                <tr><td colspan=2><button type="submit">Confirm</button></td></tr>
                </table>
            </form>
        </center>

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