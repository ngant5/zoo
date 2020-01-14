<?php
    // include ("connection.php");
    function loop_array($array = array(), $parent_id = 0) {
        if (!empty($array[$parent_id])) { ?>
            <ul class="nav navbar-nav">
            <?php
            foreach($array[$parent_id] as $item) {
                ?>
                <li >
                    <a href="<?="http://localhost/zoo/page.php?id={$item['id']}&parent_id={$item['parent_id']}" ?>"><?=$item["cate_name"]?></a>
                    <?php
                        while (loop_array($array, $item['id'])) { ?>
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
        $sql = "SELECT * FROM category WHERE category.status = 1";
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
<!DOCTYPE HTML>
<html>
<head>
<title>Zoo Planet a Animals and Pets category Flat bootstrap Responsive  Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Zoo Planet Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<style>
.header-top {
    padding: 0px !important;
}
    .navbar-nav li {
        position: relative;
        display: inline-block !important;
        margin-top: 20px !important;
    }
    .navbar-nav li li {
        display: none !important;
    }
    .navbar-nav li li a {
        padding: 1px!important;
    }
    .navbar-nav li:hover li{
        display: inline-block !important;
        position: relative !important;
        clear: both;
    }
    .header-top {
        height: 200px;
    }
</style>
</head>
<body>
<!--header-->
<div class="logo">
    <img src="../logo.png" alt="">
</div>
    <div class="header">
        <div class="container">
            <div class="header-top">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand logo">
                                <h1><a href="index.php">zoo planet</a></h1>
                            </div>
                        </div>

<!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php
                            echo "<ul class='nav navbar-nav'><li><a href='http://localhost/zoo/about-us.php'>About Us</a></li></ul>";
                            echo "<ul class='nav navbar-nav'><li><a href='http://localhost/zoo/whats-up.php'>Whats Up</a></li></ul>";
                            display_menu();
                            echo "<ul class='nav navbar-nav'><li><a href='http://localhost/zoo/experience.php'>Experience</a></li></ul>";
                            echo "<ul class='nav navbar-nav'><li><a href='http://localhost/zoo/index.php'>Home</a></li></ul>";
                            ?>
                        </ul>
                    </div>
</div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>