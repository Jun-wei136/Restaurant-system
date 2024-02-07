<html>
    <head>
        <meta charset='utf-8'>
        <title>Signing up</title>
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
                        <p>Have an account?
                        <a href="SignIn.php">Sign In</a><!--For members with account to sign in-->
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <br><br><br>

        <?php
        //PHP_Validation//
        $emailErr = "";
        $phErr = "";
        $addErr = "";
        $genErr = "";
        $passErr = "";
        $conErr = "";
        $success = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $memail = $mphone = $maddress = $mage = $mgender = $mpassword = $mconfirm = "";

            if(empty($_POST["m_email"])){
                $emailErr = "Email is required";
            }
            else{
                $memail = input_data($_POST["m_email"]);
                if(!filter_var($memail, FILTER_VALIDATE_EMAIL)){ //Making sure that users contain @gmail.com in field
                    $emailErr = "Invalid Email format";
                }
                else{
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $database = 'goodfood';
                    $table_name = 'member';

                    $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                    $query = "SELECT * FROM $table_name WHERE email='".$memail."'";
                    mysqli_select_db($conn, $database);
                    $result = mysqli_query($conn, $query);
                    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if($myrow){
                        $emailErr = "Email already exists";
                    }
                }
            }

            if(empty($_POST["m_number"])){
                $phErr = "Phone No. is required";
            }
            else{
                $mphone = input_data($_POST["m_number"]);
                if(!preg_match("/^[0-9]*$/", $mphone)){ //Making sure phone number is integer and contains 10 digits
                    $phErr = "Phone No. should be only numeric value";
                }
                if(strlen($mphone) != 10){
                    $phErr = "Phone No. must contain 10 digits";
                }
            }

            if(empty($_POST["m_address"])){
                $addErr = "Address is required";
            }
            else{
                $maddress = input_data($_POST["m_address"]);
            }

            $mage = input_data($_POST["m_age"]);

            if(empty($_POST["m_gender"])){
                $genErr = "Gender is required";
            }
            else{
                $mgender = input_data($_POST["m_gender"]);
            }

            if(empty($_POST["m_password"])){
                $passErr = "Password is required";
            }
            else{
                $mpassword = input_data($_POST["m_password"]);
            }

            if(empty($_POST["m_con_password"])){
                $conErr = "Password needs to be confirmed";
            }
            else{
                $mconfirm = input_data($_POST["m_con_password"]);
                if($_POST["m_password"] != $_POST["m_con_password"]){ //If password and confirmed password are not the same
                    $conErr = "Confirmed password does not match";
                }
            }

            if($emailErr == "" && $phErr =="" && $addErr == "" && $genErr == "" && $passErr == "" && $conErr == "") //Creating account if there is no error
            {
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'goodfood';
                $table_name = 'member';

                $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                $query = "INSERT INTO $table_name(email,password,age,gender,phone,address)
                VALUES('".$memail."','".$mconfirm."','".$mage."','".$mgender."','".$mphone."','".$maddress."')";
                mysqli_query($conn, $query);
                $success = "Registered new account.You can now sign in";
                mysqli_close($conn);
            }
        }
        function input_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <center>                           <!--PHP_SELF so that no need to go to other page-->
            <form name="UserSignUp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>SIGN UP</h1>
                <?php if(!empty($success)){?>
                        <p class = "error" style="background: #62BD69; width: 380px;">
                        <?php echo $success; ?></p>
                    <?php } ?>

                <table id="formtable" style="text-align: left;">

                    <tr><td>Email Address</td></tr>
                    <tr><td><input type="text" name="m_email" placeholder="Email Address"></td></tr>
                    <?php if(!empty($emailErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $emailErr; ?></p></td></tr>
                    <?php } ?>

                    <tr><td>Phone Number</td></tr>
                    <tr><td><input type="text" name="m_number" placeholder="Phone Number"></td></tr>
                    <?php if(!empty($phErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $phErr; ?></p></td></tr>
                    <?php } ?>

                    <tr><td>Address</td></tr>
                    <tr><td><textarea name="m_address" rows="5" cols="45" placeholder="Address"
                            style="font-family: Arial; border: #F7F3F5; border-radius: 20px; padding:10px; padding-top: 15px; width: 350px;"></textarea></td></tr>
                    <?php if(!empty($addErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $addErr; ?></p></td></tr>
                    <?php } ?>

                    <tr><td>Age</td></tr>
                    <tr><td><select name="m_age" style="width: 150px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:10px;">
                        <option value="18-25" selected>18-25</option>
                        <option value="26-45">26-45</option>
                        <option value="46-65">46-65</option>
                        <option value="66-85">66-85</option>
                        <option value="86 above">86 and older</option>
                        </select>
                    </td></tr>

                    <tr><td>Gender</td></tr>
                    <tr><td style="font-size:15px;">
                        <input type="radio" name="m_gender" value="male" style="width: 15px; height:15px; accent-color:#403234;">  Male   
                        <input type="radio" name="m_gender" value="female" style="width: 15px; height:15px; margin-left:20px; accent-color:#403234;">  Female   
                        <input type="radio" name="m_gender" value="other" style="width: 15px; height:15px; margin-left:20px; accent-color:#403234;">  Other   
                    </td></tr>
                    <?php if(!empty($genErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $genErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td>Password</td></tr>
                    <tr><td><input type="password" name="m_password" placeholder="Password"></td></tr>
                    <?php if(!empty($passErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $passErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td>Confirm Password</td></tr>
                    <tr><td><input type="password" name="m_con_password" placeholder="Confirm Password"></td></tr>
                    <?php if(!empty($conErr)){?> <!--This line will appear if there is no error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $conErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td style="text-align: center; padding-top: 30px;"><button type="submit">Sign Up</button></td></tr>
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
                        <a href="ASignIn.php">Sign In</a> <!--For admins to sign in-->
                        </p>
                    </div>
                </td>
            </table>
        </center>
    </body>
</html>