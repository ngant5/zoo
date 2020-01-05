<?php
session_start();
// require "../session.php";
require "../../connection.php";

$conn = conn_db();

$id = @$_GET['id'];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $sql = "SELECT * FROM category WHERE id = {$id}";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE category SET category.status = 0 WHERE id = {$id}";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost/zoo/admin/menu/list.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        header("Location: http://localhost/zoo/admin/index.php");
        die();
    }
}


?>