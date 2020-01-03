<?php
session_start();
// require "../session.php";
require "../../connection.php";

$conn = conn_db();

$id = @$_GET['id'];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $sql = "SELECT * FROM users WHERE user_id = {$id}";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE users SET users.status = 0 WHERE user_id = {$id}";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost/zoo/admin/user/list.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        header("Location: http://localhost/zoo/admin/index.php");
        die();
    }
}


?>