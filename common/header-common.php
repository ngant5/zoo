<?php
    // include ("connection.php");
    function loop_array($array = array(), $parent_id = 0) {
        if (!empty($array[$parent_id])) { ?>

            <ul id="navigation">
            <?php
            foreach($array[$parent_id] as $item) {
                ?>

                <li>
                    <a href="<?=$item['id']?>"><?=$item['cate_name']?></a>
                    <?php
                while (loop_array($array, $item['id'])) { ?>
                <li>
                    <a href="<?=$item['id']?>"><?=$item['cate_name']?></a>
                </li>
                <?php
                }
                ?>
                </li>
                <?php
            }
            ?>
            </ul><?php
            }
        }
    function display_menu() {
        $conn = conn_db();
        $sql = "SELECT * FROM category";
        $query = mysqli_query($conn, $sql);
        $array = array();

        if (mysqli_num_rows($query)) {
            while ($row = mysqli_fetch_array($query)) {
                $array[$row['parent_id']][] = $row;
            }
            loop_array($array);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../asset/css/all.min.css">
<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/mobile.css">
<link rel="stylesheet" href="../asset/css/style.css">
<script src="../asset/js/bootstrap.min.js"></script>
<script src="../asset/js/function.js"></script>
<script src="../asset/js/jquery-1.11.1.min.js"></script>
<script src="../asset/js/jquery.slim.min.js"></script>
<script src="../asset/js/mobile.js"></script>
<script src="../asset/js/popper.min.js"></script>

<title>WINT ZOO</title>
<style>
    .nav-zoo ul li {
        list-style:none;
        position: relative;
    }
    .nav-zoo ul li li {
        position: absolute;
        display: none;
    }
    .nav-zoo ul li:hover li{
        display: inline-block;
    }
</style>

<div id="header">
    <h1>
        <a href="http://localhost/zoo/index.php"><img style="width:150px;" src="http://localhost/zoo/logo.jpg" alt="Logo">
            <span>Beautiful and Natural Animal Kingdom</span>
        </a>
    </h1>
    <ul id="navigation" class="nav-zoo">
    <?php
        display_menu();
    ?>
    </ul>
</div>

