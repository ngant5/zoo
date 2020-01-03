<?php
if(empty($_SESSION['user'])) {
    header("Location: http://localhost/zoo/admin/login.php");
} 
?>

