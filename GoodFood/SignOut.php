<!--This is aimed for signing out of both admins and members-->
<?php
session_start();
$_SESSION['successfulSignin'] = false;?>
<script>
    window.alert('Signed Out Successfully'); //Signed out message
    window.location.href='Home.php'; //Relocating to home page
</script>
<?php
session_destroy(); //Destroying every session to make sure user is fully signed out
exit();
?>