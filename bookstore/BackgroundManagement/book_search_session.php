<?php
if(isset($_POST['button'])) {
    session_start();
    $_SESSION['seltype'] = $_POST['seltype'];
    $_SESSION['search'] = $_POST['search'];
    header("Location:book_search.php");
}

?>