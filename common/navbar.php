<?php
    include_once ("../connection.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

<title>WINT ZOO</title>
<style>
    #navigation ul li {
        list-style:none;
        position: relative;
    }
    #navigation ul li {
        /* background-color: pink; */
        width: 150px;
        border: 1px solid white;
        height: 50px;
        line-height: 50px;
        text-align: center;
        float: left;
        /* color: white; */
        font-size: 18px;
    }
    #navigation ul li:hover li{
        /* background-color: #ad3046; */
        display: inline-block;
    }
    ul li li {
        position: absolute;
        display: none;
    }
    ul li li:hover {
        display: inline-block;
    }


</style>
</head>
<body>

<ul id="navigation">
    <!-- <?php
        display_menu();
    ?> -->
</ul>
</body>
</html>