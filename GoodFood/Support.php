<html>
    <head>
        <meta charset='utf-8'>
        <title>Feedback</title>
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
                session_start();
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
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $id = $_SESSION['sess_id'];
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'goodfood';

        $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

        $query = "SELECT * FROM member WHERE id='".$id."'";
        mysqli_select_db($conn, $database);
        $result = mysqli_query($conn, $query);
        $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $email = $myrow['email']; //Getting user's email to add insert into database

        if($id==""){ //If user is not signed in
            ?>
            <script>
            window.alert('Please sign in to support us!');
            window.location.href='SignIn.php';
            </script>
            <?php
        }
        else
        {
            $query1 = "INSERT INTO feedback(email,subject,message) 
            VALUES('".$email."','".$_POST['m_subject']."','".$_POST['m_message']."')";
            mysqli_query($conn, $query1);
            ?>
            <script>
            window.alert('Thank you so much for your support!'); //Success message
            </script>
            <?php
        }
        mysqli_close($conn);
        }
        ?>

        <center>                                <!--PHP_SELF so that no need to go to other page-->
        <form name="Feedback" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="height:441px; padding:0px;">
                <table id="formtable" style="height:100%; width:100%; margin-left:0px; font-family:Arial;">
                    <tr><td><h3>FEEDBACK FORM</h3></td></tr>
                    <tr><td><input type="text" name="m_subject" placeholder="Subject(Optional)"></td></tr>
                    <tr><td><textarea name="m_message" rows="10" cols="45" placeholder="Message"
                    style="font-family:Arial; width:350px; border:#F7F3F5; border-radius:20px;
                    padding-top:13px; padding-left:10px; background:#F7F3F5;" required></textarea></td></tr>
                    <tr><td style="text-align: center;"><button type="submit">Submit</button></td></tr>
                </table>
            </form>
        </center>

        <br><br><br>
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