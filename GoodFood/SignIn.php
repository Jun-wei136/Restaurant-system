<html>
    <head>
        <meta charset='utf-8'>
        <title>Signing in</title>
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
                    <div class="sign">
                        <p>Don't have one?
                        <a href="SignUp.php">Sign Up</a> <!--For users to create a new account-->
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <br><br><br>

        <?php
        //PHP_Validation//
        session_start();
        $error = "";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $memail = $_POST['m_email'];
            $mpassword = $_POST['m_password'];

            if(empty($memail) && empty($mpassword)){
                $error = "Fill all the fields to sign in"; //If all the field are not filled
            }
            else if(empty($mpassword)){
                $error = "Password is required"; //If password field is not filled
            }
            else if(empty($memail)){
                $error = "Email is required"; //If email field is not filled
            }
            else{
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'goodfood';
            $table_name = 'member';

            $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

            $query = "SELECT * FROM $table_name WHERE email='".$memail."' AND password='".$mpassword."'"; //Searching for account with both email and password matching
            mysqli_select_db($conn, $database);
            $result = mysqli_query($conn, $query);
            $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if(!$myrow){
                    $error = "Incorrect email or password!"; //If there is no email and password matching, it means there is no such account
                }
                else{
                    $_SESSION['successfulSignin'] = true; //If signing in is successful, setting session to be true
                    $_SESSION['sess_id'] = $myrow['id']; //Storing id for further using of it in other pages
                    header("Location: Home.php");
                    exit();
                }

            mysqli_close($conn);
            }
        }
        ?>

        <center>                         <!--PHP_SELF so that there is no need to go to other page-->
            <form name="UserSignIn" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>SIGN IN</h1>
                <?php if(!empty($error)){?>
                <p class = "error"><?php echo $error; ?></p>
                <?php } ?>
                <table id="formtable" style="text-align: left;">
                    <tr><td>Email Address</td></tr>
                    <tr><td><input type="text" name="m_email" placeholder="Email Address"></td></tr>
                    <tr><td>Password</td></tr>
                    <tr><td><input type="password" name="m_password" placeholder="Password"></td></tr>
                    <tr><td style="text-align: center; padding-top: 30px;"><button type="submit">Sign In</button></td></tr>
                    <tr><td style="text-align: center; padding-top: 20px;"><button type="reset">Clear</button></td></tr>
                </table>
            </form>
            
            <br><br><br><br>
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
                        <a href="ASignIn.php">Sign In</a><!--For admins to sign in-->
                        </p>
                    </div>
                </td>
            </table>
        </center>
    </body>
</html>