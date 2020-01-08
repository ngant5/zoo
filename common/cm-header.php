<?php
    // include ("connection.php");
    function loop_array($array = array(), $parent_id = 0) {
        if (!empty($array[$parent_id])) { ?>
            <ul class="nav navbar-nav">
            <?php
            foreach($array[$parent_id] as $item) {
                ?>
                <li >
                    <a href="<?="http://localhost/zoo/page.php?id={$item["id"]}" ?>"><?=$item["cate_name"]?></a>
                    <?php
                        while (loop_array($array, $item['id'])) { ?>
                        <li><a href="<?="http://localhost/zoo/page.php?id={$item["id"]}" ?>"><?=$item["cate_name"]?></a></li>
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
    .navbar-nav li {
        position: relative !important;
        display: inline-block !important;
    }
    .navbar-nav li li {
        display: none !important;
        position: absolute !important;
    }
    .navbar-nav li:hover li{
        display: block !important;
    }
    .navbar-nav li:hover li a{ 
        margin-top: -20px  !important;
        margin-left: -80px !important;
    }

</style>
</head>
<body>
<!--header-->
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
                            <div class="navbar-brand">
                                <h1><a href="index.html">zoo planet</a></h1>
                            </div>
                        </div>

<!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">     
                            <?php display_menu(); ?>   
                        </ul> 
                    </div>
                    
                            
                    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="gallery.html">Gallery1</a></li>
                                    <li><a href="gallery.html">Gallery2</a></li>
                                    <li><a href="gallery.html">Gallery3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> -->
                    <!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
                </nav>

            </div>
        </div>
    </div>
    