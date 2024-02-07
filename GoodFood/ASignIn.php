<html>
    <head>
        <meta charset='utf-8'>
        <title>Admin Signing in</title>
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
                    <div class="sign">
                        <p>Go back to 
                        <a href="Home.php">Home</a> <!--Letting user to go back to home page-->
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <br><br><br>

        <?php
        //PHP Validation//
        $error = "";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $aname = $_POST['a_name'];
            $apassword = $_POST['a_password'];

            if(empty($aname) && empty($apassword)){
                $error = "Fill all the fields to sign in";
            }
            else if(empty($apassword)){
                $error = "Password is required";
            }
            else if(empty($aname)){
                $error = "Email is required";
            }
            else{
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'goodfood';
            $table_name = 'admin';

            $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

            $query = "SELECT * FROM $table_name WHERE name='".$aname."' AND password='".$apassword."'"; //Checking for matching name and password
            mysqli_select_db($conn, $database);
            $result = mysqli_query($conn, $query);
            $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if(!$myrow){
                    $error = "Incorrect name or password!"; //If matching name and password is not found, it means account does not exists
                }
                else{    //If found, account exists and make session to make admin pages limited only to admins
                    session_start();
                    $_SESSION['sess_user'] = $aname; //Adding name to session so that it can be reused
                    header("Location: AOrder.php"); //First page of admin interface
                    exit();
                }

            mysqli_close($conn);
            }
        }
        ?>

        <center>                             <!--PHP_SELF so that submitting won't need to go to another page-->
            <form name="AdminSignIn" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>ADMIN SIGN IN</h1>
                <?php if(!empty($error)){?>  <!--This line will appear when there is error-->
                <p class = "error"><?php echo $error; ?></p>
                <?php } ?>
                <table id="formtable" style="text-align: left;">
                    <tr><td>User Name</td></tr>
                    <tr><td><input type="text" name="a_name" placeholder="User Name"></td></tr>
                    <tr><td>Password</td></tr>
                    <tr><td><input type="password" name="a_password" placeholder="Password"></td></tr>
                    <tr><td style="text-align: center; padding-top: 30px;"><button type="submit">Sign In</button></td></tr>
                    <tr><td style="text-align: center; padding-top: 20px;"><button type="reset">Clear</button></td></tr>
                </table>
            </form>
        </center>
    </body>
</html>