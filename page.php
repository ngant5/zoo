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
                            while ($_id = mysqli_fetch_assoc($res_id)) {
                                ?>
                                <div class="container welcome">
                                    <h2><?=$_id['cate_name']?></h2>
                                        <?php
                                            $sql_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$_id['id']}";
                                            $res_content = mysqli_query($conn, $sql_content);
                                            if (mysqli_num_rows($res_content) > 0) {
                                                while ($_content = mysqli_fetch_assoc($res_content)) {
                                                    ?>
                                                        <div class="col-md-3 welcome-grid">
                                                            <img style="height: 300px;" src="./admin/uploads/<?php echo $_content['img_id']; ?>" class="img-responsive" alt="" /><br>
                                                            <div>
                                                                <button class="wel-info" type="button"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_content['content_id']}" ?>"><?=$_content['title'] ?></a></h4></button>
                                                            </div>
                                                        </div>
                                                        <div class="clear-fix"></div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                </div>
                            <?php
                            }
                        } else {
                            $sql_sub_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$id}";
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