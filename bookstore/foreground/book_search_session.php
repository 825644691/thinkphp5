<?php
if(isset($_GET['submit'])){
    session_start();
    $_SESSION['keyword']=$_GET['keyword'];
    $_SESSION['sel']=$_GET['sel'];
header("Location:book_search.php");
}
?>