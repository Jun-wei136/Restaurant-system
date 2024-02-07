<!--This page is aimed to continue ordering process with the help of information sent from Order.php-->
<?php
session_start();
$host = "localhost";
$user = "root";
$passwd = "";
$database = "goodfood";
$conn = mysqli_connect($host,$user,$passwd,$database) or die("Could not connect to database");

 if(isset($_POST['productid'])){  //Checking if item is selected
   if(isset($_SESSION['successfulSignin']) && $_SESSION['successfulSignin']==true)  //Checking if user is signed in
   {
      $customer=$_POST['customer'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      $note=$_POST['note'];                                                         //Now() is used for current date and time
      $sql="insert into purchase (email, date, phone, address, note) values ('$customer', NOW(), '$phone', '$address', '$note')";

      $conn->query($sql);
      $pid=$conn->insert_id;
      $total=0; //Creating variable $total

      foreach($_POST['productid'] as $product): 
      $proinfo=explode("||",$product);
      $productid=$proinfo[0];
      $iterate=$proinfo[1];

      $sql="select * from menu where id='$productid'";
      $query=$conn->query($sql);
      $row=$query->fetch_array();

      if (isset($_POST['quantity_'.$iterate])) //Checking if quantity field is filled
      {
         $quantity = $_POST['quantity_'.$iterate]; //Getting quantity of each selected item
         if(!empty($quantity)){
             $subt=$row['price']*$_POST['quantity_'.$iterate]; //Calculating subtotal price of each selected item
             $total+=$subt;  //Calculating total price by addiing all subtotals
             $sql="insert into purchase_detail(order_id, menu_id, quantity) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."')";
             $conn->query($sql);
         } else{
             ?>
             <script>
              window.alert('Please enter quantity'); //If user does not enter quantity
              window.location.href='Order.php';
              </script>
             <?php
             exit;
          }
      }
      else
      {
         ?>
         <script>
          window.alert('Please enter quantity'); //IF user does not enter quantity
          window.location.href='Order.php';
          </script>
         <?php
         exit;
      }
      endforeach;
      $sql="update purchase set total='$total' where order_id='$pid'"; //Updating total again as each selected item is calculated one after another
      $conn->query($sql);
      session_start();
      $_SESSION['sess_pid']=$pid; //Storing order id and total in session to show again in receipt
      $_SESSION['sess_total']=$total;
      header('location:OrderSuccess.php');
   }
   else
   {
      ?>
      <script>
      window.alert('Please Sign In to Order'); //If user does not sign in
      window.location.href='Order.php';
      </script>
      <?php
   }
 }
 else
 {
 ?>
 <script>
 window.alert('Please select a product'); //If user does not select item
 window.location.href='Order.php';
 </script>
 <?php
 }
?>