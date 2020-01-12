<?php
include("./connection.php");
include("./common/cm-header.php");
?>
<div class="banner-header">
	<div class="container"></div>
</div>
<div class="content">
    <div class="services-section">
        <div class="container">
            <div class="welcome-grids">
                <?php
                    if (!empty($_GET['id'])) {
                        $conn = conn_db();
                        $row[] = '';
                        $id = $_GET["id"];
                        $parent_id = $_GET["parent_id"];
                        if ($parent_id == 0) {
                            $sql_id = "SELECT * FROM category WHERE parent_id = {$id}";
                            $res_id = mysqli_query($conn, $sql_id);
                            if (mysqli_fetch_assoc($res_id)) {
                                while ($_id = mysqli_fetch_assoc($res_id)) {
                                    ?>
                                    <div class="container welcome">
                                            <?php
                                                $sql_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$_id['id']}";
                                                $res_content = mysqli_query($conn, $sql_content);
                                                $_content = mysqli_fetch_assoc($res_content);
                                                if (mysqli_num_rows($res_content) > 0) { ?>
                                                    <h2><?=$_id['cate_name']?></h2>
                                                    <?php
                                                    while ($_content = mysqli_fetch_assoc($res_content)) {
                                                        if ($_id['cate_name'] == "Dinning") {
                                                            ?>
                                                            <div class="col-md-6 event-grid1">
                                                                <h4><?=$_content['title']?></h4><br>
                                                                <div style="text-align:left;"><i><?=$_content['detail']?></i></div>
                                                                <button class="btn" type="button" style="background-color:#ff9541;"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_content['content_id']}" ?>">Menu</a></h4></button>
                                                            </div>
                                                            <?php
                                                        } else {
                                                        ?>
                                                            <div class="col-md-3 welcome-grid">
                                                                <img style="height: 300px;" src="./admin/uploads/<?php echo $_content['img_id']; ?>" class="img-responsive" alt="" /><br>
                                                                <div>
                                                                    <button class="wel-info" type="button"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_content['content_id']}" ?>"><?=$_content['title'] ?></a></h4></button><br>
                                                                </div>
                                                            </div>
                                                            <div class="clear-fix"></div>
                                                        <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                    </div>
                                <?php
                                }
                            } else {
                                $sql_main = "SELECT * FROM content WHERE content.cate_id = {$id}";
                                $res_main = mysqli_query($conn, $sql_main);
                                if (mysqli_num_rows($res_main) > 0) {
                                    while ($_main = mysqli_fetch_assoc($res_main)) {
                                        ?>
                                        <div class="container">
                                            <div class="col-md-2 welcome-grid"></div>
                                            <div class="col-md-4 welcome-grid">
                                                <img style="height: 300px;" src="./admin/uploads/<?php echo $_main['img_id']; ?>" class="img-responsive" alt="" />
                                            <div>
                                                <button class="wel-info" type="button"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_main['content_id']}" ?>"><?=$_main['title'] ?></a></h4></button><br>
                                            </div>
                                            <div class="col-md-2 welcome-grid"></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        } else {
                            // $sql_sub_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$id}";
                            $sql_sub_content = "SELECT * FROM content WHERE content.cate_id = {$id}";
                            $res_sub_content = mysqli_query($conn, $sql_sub_content);
                            if (mysqli_num_rows($res_sub_content) > 0) {
                                while ($_sub_content = mysqli_fetch_assoc($res_sub_content)) {
                                    ?>
                                    <div class="container">
                                        <div class="col-md-2 welcome-grid"></div>
                                        <div class="col-md-4 welcome-grid">
                                            <img style="height: 300px;" src="./admin/uploads/<?php echo $_sub_content['img_id']; ?>" class="img-responsive" alt="" />
                                        <div>
                                            <button class="wel-info" type="button"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_sub_content['content_id']}" ?>"><?=$_sub_content['title'] ?></a></h4></button>
                                        </div>
                                        <div class="col-md-2 welcome-grid"></div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                ?>
                <?php
                    } else {
                        echo "updating...";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="./js/script.js"></script>
<?php
    include("./common/cm-footer.php");
?>