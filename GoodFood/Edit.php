<?php     //Checking if admin is signed in or else this page is not allowed to see//
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
    <script>   //function to allow table to show items of category that is selected
        function selectMenu(value){
            document.getElementById("menuForm").submit();
        }
    </script>
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
                    <p><?=ucwords($_SESSION['sess_user']);?> |  <!--ucwords is added to make admin name uppercased-->
                    <a href="SignOut.php">Sign Out</a>
                    </p>
                    </div>
                </td>
            </tr>
        </table>

        <?php
        //PHP Validation//
        $error = "";
        $error1 = "";
        $search = "";
        $search1 = "";
        $search2 = "";
        $search3 = "";
        $s_id = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["id_search"]))  //For searching item by id
            {
                if(empty($_POST["s_id"])){
                    $search = "Enter ID to search";  
                }
                else{
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $database = 'goodfood';
                    $table_name = 'menu';

                    $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                    $query = "SELECT * FROM $table_name WHERE id='$_POST[s_id]'";
                    mysqli_select_db($conn, $database);
                    $result = mysqli_query($conn, $query);
                    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if(!$myrow){
                        $search = "Item not found in menu";
                    }else{
                        $search1 = "Found the item";


                        $s_id = $myrow['id'];  //Will later be added in hidden field to utilize
                        $s_name = $myrow['name'];
                        $s_category = $myrow['category'];
                        $s_price = $myrow['price'];
                        $s_pic = $myrow['pic'];
                    }
                }
            }

            else if(isset($_POST["name_search"]))  //For searching item by name
            {
                if(empty($_POST["s_name"])){
                    $search2 = "Enter Name to search";
                }
                else{
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $database = 'goodfood';
                    $table_name = 'menu';

                    $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                    $query = "SELECT * FROM $table_name WHERE name='$_POST[s_name]'";
                    mysqli_select_db($conn, $database);
                    $result = mysqli_query($conn, $query);
                    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if(!$myrow){
                        $search2 = "Item not found in menu";
                    }else{
                        $search3 = "Found the item";

                        $s_id = $myrow['id'];   //Will later be added in hidden field to utilize
                        $s_name = $myrow['name'];
                        $s_category = $myrow['category'];
                        $s_price = $myrow['price'];
                        $s_pic = $myrow['pic'];
                    }
                }
            }

            else if(isset($_POST["edit_button"]))  //Validation for editing
            {
                if(empty($_POST["f_name"]) || $_POST["f_category_e"] == "none" || empty($_POST["f_price"]) || (!isset($_FILES["f_pic"]) || $_FILES["f_pic"]["error"] == UPLOAD_ERR_NO_FILE))
                {
                $error = "Fill all the field";  //Making to fill all the field
                }else{
                if(!preg_match("/^[0-9.]*$/", $_POST["f_price"])){
                    $error = "Price should be only numeric value";  //Limiting price to be only integer
                }
                $target_dir = "MenuPhoto/";
                $target_file = $target_dir . $_FILES["f_pic"]["name"];
                $maxsize = 5242880;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $extensions_arr = array("png", "jpeg", "jpg");
                if(in_array($imageFileType,$extensions_arr)){
                     if(($_FILES['f_pic']['size'] >= $maxsize) || ($_FILES['f_pic']['size'] == 0)){
                        $error = "File must be less than 5MB";
                    }
                }
            }
            if($error == "") //Editing the item in menu if error free
            {
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'goodfood';
                $table_name = 'menu';
                
                $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                if($_POST["hidden_id"] == ""){ 
                    $error = "Search item first"; //If there is no id in hidden field, it means user has not search for item yet
                }else{
                    $query = "UPDATE $table_name SET name = '".$_POST['f_name']."', category = '$_POST[f_category_e]', 
                    price = '$_POST[f_price]', pic = '".$target_file."' WHERE id = '".$_POST['hidden_id']."'";

                    mysqli_query($conn, $query);
                    $error1 = "Successfully edited item";
                    mysqli_close($conn);
                }
            }
            }

            else if(isset($_POST["delete_button"])) //Deleting item from menu
            {
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'goodfood';
                $table_name = 'menu';
                
                $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

                if($_POST["hidden_id"] == ""){
                    $error = "Search item first"; //If there is no id in hidden field, it means user has not search for item yet
                }else{
                    $query = "DELETE FROM $table_name WHERE id = '".$_POST['hidden_id']."'"; //Deleting item by id which is either searched by id or name

                    mysqli_query($conn, $query);
                    $error1 = "Successfully deleted item";
                    mysqli_close($conn);
                }
            }
        }
        ?>

        <!--div1 is for table to show-->
        <div id="div1">          <!--PHP_SELF so that there is no need to go to other page--> <!--enctype for posting picture-->
        <form id="menuForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'
        style="margin-left:130px; margin-top:25px; padding: 0px; max-height:580px; overflow-y:scroll; border-radius: 0px; border: 1px solid #403234;">

        <table class="exclude_style" 
        style="background:#403234; color:#F7F3F5; font-weight:normal; border:3px solid #705103; border-collapse:collapse;">

            <tr><th style = "text-align: center; height:120px; width:150px; background:#403234; border:3px solid #705103;"><h2>MENU</h2></th>

            <th style="width:300px; background:#403234; border:3px solid #705103;">
            <select name = "f_category" onchange="selectMenu(this.value)" style="width: 180px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:10px;">
                                        <!--Applying category selecting function-->
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
        //For changing what table will show according to what category user chooses//
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "goodfood";
        $table_name = "menu";
        $conn = mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
        
        if(isset($_POST["f_category"])){
            $select = $_POST["f_category"];

            if($select == "All Category"){
                $query = "SELECT * FROM $table_name"; //To show everything on table 
            }else{
                $query = "SELECT * FROM $table_name WHERE category = '".$select."'"; //To show items of selected category
            }
        }else{
            $query = "SELECT * FROM $table_name"; //This needs to be added to show table when page is started to open while user hasn't selected
        }

        mysqli_select_db($conn,$database);
        $result = mysqli_query($conn,$query);
        if ($result) 
        {
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
        $id=$row['id'];
        $name=$row['name'];
        $category=$row['category'];
        $price=$row['price'];
        $pic=$row['pic'];

        print "<tr>";
        print "<td style='border:3px solid #705103;'>"."<img src='".$pic."'controls width='150px'
        height='150px'>"."</td>";
        print "<td style='border:3px solid #705103;'>".$id.". ".$name."<br><br>Category: ".$category."<br><br>Price: $".$price."</tr>";
        }
        print "</table>";
        }
        else
        {
        die ("Query=$query failed!");
        }
        mysqli_close($conn);
        ?>
        </table>
        </form>
    </div>

    <!--div2 is for searching, editing and deleting-->
    <div id="div2" style="float:right; margin-top:25px; margin-right:130px;">
                      <!--PHP_SELF so that there is no need to go to other page-->    <!--enctype for posting picture-->
        <form name="EditMenu" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'
        style="width:800px; height:580px; padding: 0px; border-radius:0px;">

        <!--Applying of hidden field by setting id of searched item into it and use for editing and deleting-->
        <input type="hidden" name="hidden_id" value="<?php echo $s_id; ?>"> 

                <table id="formtable" style="text-align: center; width: 100%; margin-left:0px; height: 100%; border: 1px solid #403234; border-collapse:collapse;">

                    <tr>
                        <td align=center style="border-right: 1px solid #403234;">
                            <?php if(!empty($search)){?> <!--This line will appear when there is error-->
                            <p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                            <?php echo $search; ?></p>
                            <?php } ?>
                            <?php if($search1=="Found the item"){?> <!--This line will appear when item is found-->
                            <p class = "error" style = "text-align: center; font-size: 15px; width: 350px; background: #62BD69;">
                            <?php echo $search1; ?></p>
                            <?php } ?>
                        </td>

                        <?php if(!empty($error)){?> <!--This line will appear when there is error-->
                        <td colspan=2 align=center><p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                        <?php echo $error; ?></p></td>
                        <?php } ?>
                        <?php if($error1=="Successfully edited item"){?> <!--This line will appear when item is successfully edited-->
                        <td colspan=2 align=center><p class = "error" style = "text-align: center; font-size: 15px; width: 350px; background: #62BD69;">
                        <?php echo $error1; ?></p></td>
                        <?php } ?>
                        <?php if($error1=="Successfully deleted item"){?> <!--This line will appear when item is successfully deleted-->
                        <td colspan=2 align=center><p class = "error" style = "text-align: center; font-size: 15px; width: 350px; background: #62BD69;">
                        <?php echo $error1; ?></p></td>
                        <?php } ?>
                    </tr>

                    <tr>
                        <td style="border-right: 1px solid #403234;">Search item by ID</td>

                    <td colspan=2>Food/Drink Name</td>
                    </tr>

                    <tr>
                        <td rowspan=2 style="border-right: 1px solid #403234;"><input type="text" name="s_id" placeholder="Search by ID"></td>

                        <!--Item name will automatically appear in the field when searching is done-->
                        <td colspan=2><input type="text" name="f_name" placeholder="Food/Drink Name" value="<?php echo isset($s_name) ? $s_name : ''; ?>"></td>
                    </tr>

                    <tr>
                        <td colspan=2>Category</td>
                    </tr>

                    <tr>
                        <td style="text-align: center; border-right: 1px solid #403234; border-bottom: 1px solid #403234;"><button name="id_search" type="submit">Search</button></td>

                        <!--Category will be automatically selected in the field when searching is done-->
                        <td colspan=2><select name="f_category_e" style="width: 350px; height: 40px; border: #F7F3F5; border-radius: 20px; padding-left:10px;">
                        <option value="none" selected>Select</option>
                        <option value="Appetizers"<?php echo isset($s_category) && $s_category == "Appetizers" ? "selected" : ""; ?>>Appetizers</option>
                        <option value="Soups"<?php echo isset($s_category) && $s_category == "Soups" ? "selected" : ""; ?>>Soups</option>
                        <option value="Salads"<?php echo isset($s_category) && $s_category == "Salads" ? "selected" : ""; ?>>Salads</option>
                        <option value="Main Courses"<?php echo isset($s_category) && $s_category == "Main Courses" ? "selected" : ""; ?>>Main Courses</option>
                        <option value="Pasta"<?php echo isset($s_category) && $s_category == "Pasta" ? "selected" : ""; ?>>Pasta</option>
                        <option value="Burgers and Sandwiches"<?php echo isset($s_category) && $s_category == "Burgers and Sandwiches" ? "selected" : ""; ?>>Burgers and Sandwiches</option>
                        <option value="Desserts"<?php echo isset($s_category) && $s_category == "Desserts" ? "selected" : ""; ?>>Desserts</option>
                        </select>
                    </td>
                   </tr>

                    <tr>
                        <td align=center style="border-right: 1px solid #403234;">
                            <?php if(!empty($search2)){?> <!--This line will appear when there is error-->
                            <p class = "error" style = "text-align: center; font-size: 15px; width: 350px;">
                            <?php echo $search2; ?></p>
                            <?php } ?>
                            <?php if($search3=="Found the item"){?> <!--This line will appear when item is found-->
                            <p class = "error" style = "text-align: center; font-size: 15px; width: 350px; background: #62BD69;">
                            <?php echo $search3; ?></p>
                            <?php } ?>
                        </td>

                        <td colspan=2>Price</td>
                    </tr>

                    <tr>
                        <td style="border-right: 1px solid #403234;">Search item By Name</td>
                        
                        <!--Price of item will automatically appear when searching is done-->
                        <td colspan=2><input type="text" name="f_price" placeholder="Price" value="<?php echo isset($s_price) ? $s_price : ''; ?>"></td>
                    </tr>

                    <tr>
                        <td rowspan=2 style="border-right: 1px solid #403234;"><input type="text" name="s_name" placeholder="Search by Name"></td>

                        <td colspan=2>Picture</td>
                    </tr>

                    <tr>
                        <td style="width:50px; height:50px"> <!--To show the picture of searched item-->
                            <?php if(isset($s_pic) && !empty($s_pic)) : ?>
                            <img src="<?php echo $s_pic; ?>" alt="Item Image" width="50px" height="50px">
                            <?php endif; ?>
                        </td>

                        <td>
                            <input style="border-radius:0px;" type="file" name="f_pic">
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: center; border-right: 1px solid #403234;"><button name="name_search" type="submit">Search</button></td>
                        
                        <td colspan=2 style="text-align: center;">
                        <button name="edit_button" type="submit" style="float:left; margin-left:60px;">Edit Item</button>
                        <button name="delete_button" type="submit" style="float:right; margin-right:60px;">Delete Item</button>
                    </td>
                    </tr>
                </table>
            </form>
            </div>
    </body>
</html>
<?php
}
?>