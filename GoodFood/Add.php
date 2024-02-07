<?php       //Checking if admin is signed in or else this page is not allowed to see//
session_start();
if(!isset($_SESSION["sess_user"])){
 header("location:Home.php");
}
else {
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="design.css"/>
    </head>
    <body>
        <table id="main_table" class="exclude_style">
            <tr>
                <td>
                   <div class="logo">
                        <h2>GOOD FOOD ADMIN PAGE</h2>
                    </div>
                </td>
                <td>
                    <div class="navbar">
                        <a href="AOrder.php">Orders</a>
                        <a href="Add.php">Add Menu</a>
                        <a href="Edit.php">Edit Menu</a>
                        <a href="AReserve.php">Reservations</a>
                        <a href="AFeedback.php">Feedbacks</a>
                    </div>
                </td> 
                    <td>
                    <div class="sign">  
                    <p><?=ucwords($_SESSION['sess_user']); ?> | <!--ucword is added to make admin name uppercased-->
                    <a href="SignOut.php">Sign Out</a>
                    </p>
                    </div>
                </td>
            </tr>
        </table>
        <br><br><br>

        <?php
        //PHP validation for adding new item to menu making lines of red texts appear
        $nameErr = "";
        $catErr = "";
        $priceErr = "";
        $picErr = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["f_name"])){
                $nameErr = "Name is required";
            }else{
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'goodfood';
                $table_name = 'menu';

                $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                $query = "SELECT * FROM $table_name WHERE name='$_POST[f_name]'";
                mysqli_select_db($conn, $database);
                $result = mysqli_query($conn, $query);
                $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($myrow){
                    $nameErr = "Item already exists"; //Not allowing to add same item twice
                }
            }
            if($_POST["f_category"] == "none"){
                $catErr = "Category is required";
            }
            if(empty($_POST["f_price"])){
                $priceErr = "Price is required";
            }elseif(!preg_match("/^[0-9.]*$/", $_POST["f_price"])){
                    $priceErr = "Price should be only numeric value";  //Limiting price to be only integer
            }

            if(!isset($_FILES["f_pic"]) || $_FILES["f_pic"]["error"] == UPLOAD_ERR_NO_FILE){ //Validation for not adding picture
                $picErr = "Picture is required";
            }
            $target_dir = "MenuPhoto/";
            $target_file = $target_dir . $_FILES["f_pic"]["name"];
            $maxsize = 5242880;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("png", "jpeg", "jpg");
            if(in_array($imageFileType,$extensions_arr)){
                if(($_FILES['f_pic']['size'] >= $maxsize) || ($_FILES['f_pic']['size'] == 0)){
                    $picErr = "File must be less than 5MB";
                }
            }

            if($nameErr == "" && $catErr == "" && $priceErr == "" && $picErr == "") //Adding item to menu if there is no error
            {
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'goodfood';
                $table_name = 'menu';
                
                $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                $query = "INSERT INTO $table_name(name,category,price,pic)
                VALUES('$_POST[f_name]','$_POST[f_category]','$_POST[f_price]','".$target_file."')";
                mysqli_query($conn, $query);
                $success = "Successfully added new item to menu";
                mysqli_close($conn);
            }
        }
        ?>

        <center>
            <form name="AddMenu" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'><!--enctype for posting picture-->
                <h1>ADDING ITEM TO MENU</h1>
                <?php if(!empty($success)){?>      <!--This line will appear if there is successful adding-->
                        <p class = "error" style="background: #62BD69; width: 380px;">
                        <?php echo $success; ?></p>
                <?php } ?>
                <table id="formtable" style="text-align: left;">

                    <tr><td>Food/Drink Name</td></tr>
                    <tr><td><input type="text" name="f_name" placeholder="Food/Drink Name"></td></tr>
                    <?php if(!empty($nameErr)){?>   <!--This line will appear if there is error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $nameErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td>Category</td></tr>
                    <tr><td><select name="f_category" style="width: 350px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:10px;">
                        <option value="none" selected>Select</option>
                        <option value="Appetizers">Appetizers</option>
                        <option value="Soups">Soups</option>
                        <option value="Salads">Salads</option>
                        <option value="Main Courses">Main Courses</option>
                        <option value="Pasta">Pasta</option>
                        <option value="Burgers and Sandwiches">Burgers and Sandwiches</option>
                        <option value="Desserts">Desserts</option>
                        </select>
                    </td></tr>
                    <?php if(!empty($catErr)){?>    <!--This line will appear if there is error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $catErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td>Price</td></tr>
                    <tr><td><input type="text" name="f_price" placeholder="Price"></td></tr>
                    <?php if(!empty($priceErr)){?>    <!--This line will appear if there is error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $priceErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td>Picture</td></tr>
                    <tr><td><input style="border-radius:0px;" type="file" name="f_pic"></td></tr>
                    <?php if(!empty($picErr)){?>    <!--This line will appear if there is error-->
                        <tr><td><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $picErr; ?></p></tr></td>
                    <?php } ?>

                    <tr><td style="text-align: center; padding-top: 30px;"><button type="submit">Add Item</button></td></tr>
                    <tr><td style="text-align: center; padding-top: 20px;"><button type="reset">Clear</button></td></tr>
                </table>
            </form>
        </center>
        <br><br><br>
        <center>  <!--For going back to top of the page-->
            <a href="#Top" style="color: #403234; font-family: Arial; font-weight: bolder; text-decoration: none; font-size: 12px;
            display: inline-block; background-color: #E2C2B3; width: 110px; height: 23px; border-radius: 30px; padding-top: 8px;">
                BACK TO TOP
            </a>
        </center>
        <br><br>
        <hr style="border: 1px solid #E2C2B3;"> <!--Line for decoration-->
        <br><br>
        </center>
    </body>
</html>
<?php
}
?>