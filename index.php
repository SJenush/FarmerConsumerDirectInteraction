<p>
<?php 
    session_start();
    if(isset($_SESSION['Username'])){
        echo $_SESSION['Username'];
    }else{
        //echo $_SESSION['Username'];
        header("Location:login.php");
    }
?>
</p>