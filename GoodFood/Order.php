<html>
    <head>
        <meta charset='utf-8'>
        <title>Ordering</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        <script>
        //This function is applied for submitting to self location in one form where action of form is another location//
        function selfaction(value){
            document.forms['menuForm'].action = "<?php echo $_SERVER['PHP_SELF']; ?>"; //PHP_SELF so that no need to go to other form
            document.forms['menuForm'].submit(); //auto submit without button as it is seletion of categories
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
                    //When user is signed in, informations of user is searched via id which was stored in session and added them into fields//
                    $userid = $_SESSION['sess_id'];
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "goodfood";
                    $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");

                    $sql1 = "SELECT * FROM member WHERE id = '".$userid."'";
                    mysqli_select_db($conn, $database);
                    $result = mysqli_query($conn, $sql1);
                    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $m_email = $myrow['email'];
                    $m_phone = $myrow['phone'];
                    $m_address = $myrow['address'];
                    $m_note = "";
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
                    //If user is not signed in, all the fields will say to sign in first to order//
                    $m_email = "Please Sign In to Order";
                    $m_phone = "Please Sign In to Order";
                    $m_address = "Please Sign In to Order";
                    $m_note = "Please Sign In to Order";
                }
                ?>
            </tr>
        </table>

        <center>       <!--Going to another page to continue ordering process-->
        <form id="menuForm" action="Order1.php" method="post"
        style="margin-top:25px; padding: 0px; border-radius: 0px; width:1200px; heigth:580px;">
        <div id="div1" style="width:700px; max-height:580px; overflow-y:scroll;"> <!--Allow scrolling in table-->
        <table class="exclude_style"
        style="background:#403234; color:#F7F3F5; font-weight:normal; border:3px solid #705103; border-collapse:collapse; width:100%;">

            <tr><th style = "text-align: center; height:120px; width:150px; background:#403234; border:3px solid #705103;"><h2>MENU</h2></th>

            <th colspan=2 style="background:#403234; border:3px solid #705103;">
            <select name = "f_category" onchange="selfaction(this.value);" style="width: 180px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:10px;">
                                        <!--Applying function which action is PHP_SELF-->
            <!--php echo "selected" is used here in every line because even if after selecting and the table changes,
            the field still remains at "All Category"-->
            <option value="All Category"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="All Category") echo "selected"; ?>
            >All Category</option>

            <option value="Appetizers"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Appetizers") echo "selected"; ?>
            >Appetizers</option>

            <option value="Soups"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Soups") echo "selected"; ?>
            >Soups</option>

            <option value="Salads"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Salads") echo "selected"; ?>
            >Salads</option>

            <option value="Main Courses"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Main Courses") echo "selected"; ?>
            >Main Courses</option>

            <option value="Pasta"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Pasta") echo "selected"; ?>
            >Pasta</option>

            <option value="Burgers and Sandwiches"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Burgers and Sandwiches") echo "selected"; ?>
            >Burgers and Sandwiches</option>

            <option value="Desserts"
            <?php if(isset($_POST["f_category"]) && $_POST["f_category"]=="Desserts") echo "selected"; ?>
            >Desserts</option>
            </select>
            </th></tr>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "goodfood";
        $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");

        if(isset($_POST["f_category"])){
            $select = $_POST["f_category"];

            //ASC is added in all sql to sort items by name//
            if($select == "All Category"){
                $sql = "SELECT * FROM menu ORDER BY name ASC"; //To show everything on table 
            }else{
                $sql = "SELECT * FROM menu WHERE category = '".$select."' ORDER BY name ASC"; //To show items of selected category
            }
        }else{
            $sql = "SELECT * FROM menu ORDER BY name ASC"; //This needs to be added to show table when page is started to open while user hasn't selected
        }

        $query=$conn->query($sql);
        $iterate=0; //Setting $iterate at 0
        while($row=$query->fetch_array()){
        ?>
        <tr>
            <td style="border:3px solid #705103;"><img src="<?php echo $row['pic'];?>" controls width="150px" height="150px"></td>
            <td style="border:3px solid #705103;"><?php echo $row['name'];?><br><br>Category: <?php echo $row['category'];?><br><br>
            Price: $<?php echo $row['price'];?></td>
            <td style="border:3px solid #705103; width:130px;">
                Select <input type="checkbox" value="<?php echo $row['id'];?>||<?php echo $iterate;?>" name="productid[]" style="accent-color:#705103;"><br><br>
                Quantity <input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>" style="width:28px; text-align:center;">
            </td>
        </tr>
        <?php
        $iterate++; //Increasing $iterate which allows multiple items to be orderd
        }
        ?>
    </table>
    </div>
    <div>
    <table id="formtable" style="width:500px; height:580px;"> <!--This form applies HTML validation "required"-->
  
        <tr><td>Your Email Address</td></tr>
        <tr><td><input type="text" name="customer" value="<?php echo $m_email;?>" readonly required></td></tr><!--readonly to unable user to change email-->

        <tr><td>Phone Number to Contact</td></tr>                               <!--Validating phone number to only be 10 digit integer-->
        <tr><td><input type="text" name="phone" value="<?php echo $m_phone;?>" required pattern="[0-9]{10}" title="Enter a 10-digit Phone No."></td></tr>

        <tr><td>Current Living Address</td></tr>
        <tr><td><textarea name="address" rows="5" cols="45" required
        style="font-family: Arial; border: #F7F3F5; border-radius: 20px; padding-left:10px; 
        padding-top: 15px; width: 350px; text-align:left;"><?php echo $m_address;?></textarea></td></tr>

        <tr><td>Order Note(Optional)</td></tr>
        <tr><td><textarea name="note" rows="5" cols="45"
        style="font-family: Arial; border: #F7F3F5; border-radius: 20px; padding-left:10px; 
        padding-top: 15px; width: 350px; text-align:left;"><?php echo $m_note;?></textarea></td></tr>

        <tr><td><button type="submit"class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Order</button></td></tr>

    </table>
    <div>
    </form>
    </center>
</body>
</html>