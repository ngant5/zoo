<?php
    include("./connection.php");
    include("./common/cm-header.php");
?>
<style>
    .img-page {
        width: 500px;
        display: block;
        margin-left: auto;
        margin-right: auto;
}
    }
</style>
<div class="banner-header">
	<div class="container"></div>
</div>
<div class="events">
<?php
    if (!empty($_GET['id'])) {
        $conn = conn_db();
        $g_id = $_GET["id"];
        $g_parent_id = $_GET["parent_id"];
        if ($g_parent_id == 0) {
            $sql_id = "SELECT * FROM category WHERE parent_id = {$g_id}";
            $query_id = mysqli_query($conn, $sql_id);
            if (mysqli_num_rows($query_id) > 0) {
                while ($_category = mysqli_fetch_assoc($query_id)) {
                    $sql_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$_category['id']}";
                    $query_content = mysqli_query($conn, $sql_content);
                    if (mysqli_num_rows($query_content) > 0) {
                        ?>
                        <h3><?=$_category['cate_name']?></h3>
                        <?php
                        while ($_content = mysqli_fetch_assoc($query_content)) {
                            if ($_category['cate_name'] == "Dinning") {
                                ?>
                                <div class="container">
                                    <div class="events-grids event-img">
                                        <div class="col-md-4 event-grid1">
                                            <h4><?=$_content['title']?></h4>
                                            <button class="btn" type="button" style="background-color:#ff9541;"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_content['content_id']}" ?>">Menu</a></h4></button>
                                        </div>
                                        <div class="col-md-8 event-grid">
                                            <p><?=$_content['detail']?></p>
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="container">
                                    <div class="events-grids event-img">
                                        <div class="col-md-4 event-grid">
                                            <img style="width:300px;" class="img-responsive" src="./admin/uploads/<?php echo $_content['img_id']; ?>" class="img-responsive" alt="" />
                                        </div>
                                        <div class="col-md-8 event-grid1">
                                            <h4><?=$_content['title']?></h4>
                                            <p><?=$_content['detail']?></p>
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <?php
                            }
                        }
                    }
                }
            } else {
                // content of parent category
                $sql_parent_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$g_id}";
                $query_parent_content = mysqli_query($conn, $sql_parent_content);
                if (mysqli_num_rows($query_parent_content) > 0) {
                    while ($_parent_content = (mysqli_fetch_assoc($query_parent_content))) {
                    ?>
                    <div class="container">
                        <div class="events-grids event-img">
                            <div class="col-md-4 event-grid">
                                <img style="width: 300px;" class="img-responsive" src="./admin/uploads/<?php echo $_parent_content['img_id']; ?>" class="img-responsive" alt="" />
                            </div>
                            <div class="col-md-8 event-grid1">
                                <h4><?=$_parent_content['title']?></h4>
                                <p><?=$_parent_content['detail']?></p>
                            </div>
                        </div>
                        <div class="clear-fix"></div>

                    </div>
                <?php
                    }
                }
            }
        } else {
            // content of child category
            $sql_cate = "SELECT * FROM category WHERE id = {$g_id}";
            $query_cate = mysqli_query($conn, $sql_cate);
            if (mysqli_num_rows($query_cate) > 0) {
                $_cate = mysqli_fetch_assoc($query_cate);
                // query child content
                $sql_child_content = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$g_id}";
                $query_child_content = mysqli_query($conn, $sql_child_content);
                if ($_cate['cate_name'] == "Dinning") {
                    if (mysqli_num_rows($query_child_content) > 0) {
                        while ($_child_content = mysqli_fetch_assoc($query_child_content)) {
                            ?>
                            <div class="container">
                                <div class="events-grids event-img">
                                    <div class="col-md-4 event-grid1">
                                        <h4><?=$_child_content['title']?></h4>
                                        <button class="btn" type="button" style="background-color:#ff9541;"><h4><a href="<?="http://localhost/zoo/detail.php?id={$_child_content['content_id']}" ?>">Menu</a></h4></button>
                                    </div>
                                    <div class="col-md-8 event-grid">
                                        <p><?=$_child_content['detail']?></p>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                            </div>
                            <?php
                        }
                    }

                } else {
                    if (mysqli_num_rows($query_child_content) > 0) {
                        while ($_child_content = mysqli_fetch_assoc($query_child_content)) {
                            ?>
                            <div class="container">
                                <div class="events-grids event-img">
                                    <div class="col-md-6 event-grid">
                                        <img style="width:500px; class="img-responsive" src="./admin/uploads/<?php echo $_child_content['img_id']; ?>" class="img-responsive" alt="" />
                                    </div>
                                    <div class="col-md-6 event-grid1">
                                        <h4><?=$_child_content['title']?></h4>
                                        <p><?=$_child_content['detail']?></p>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                            </div>
                            <?php
                        }
                    }
                }
            }
        }
    } else {
        ?>
        <div class="jumbotron" style="height: 500px;">
            <h1 class="display-6">Welcome to Zoo Planet!</h1>
            <p class="lead">We will update this content soon.</p>
        </div>
        <?php
    }
?>
    
</div>
<div class="events">
    <div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<script src="./js/script.js"></script>

<?php
    include("./common/cm-footer.php");
?>