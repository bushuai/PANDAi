<?php
    require_once ('../config.php');
    require_once (APP_PATH . 'view/header.php');
    session_start();
    $username = $_SESSION[ 'user' ][ 'login_id' ];
?>

<div id="header" class="transparent">
    <h1>
        <a href="#"> PANDAi</a>
    </h1>
    <ul id="header-menu">
        <li>
            <a class="write"><i class="tags-icon tags-icon-plus"></i><span>写微博</span></a>
        </li>
        <li>
            <a href="mainboard.php"><i class="tags-icon tags-icon-home"></i><span>微博大厅</span></a>
        </li>
        <li>
            <a class="detail"><i class="tags-icon tags-icon-th-menu"></i><span>账户设置</span></a>
        </li>
        <li>
            <a class="logout"><i class="tags-icon tags-icon-cog"></i><span>退出</span></a>
        </li>
    </ul>
</div>
<div id="wrapper">
    <div id="container">
        <div id="post-form-write" class="shadow">
            <div id="post-form-write-hd">
                所思,所想...
            </div>
            <form id="post-form-form" action="#">
                <textarea name="" id="post-form-wbcontent" cols="50" rows="5"></textarea>
                <select name="tag" id="tag_id">
                    <?php
                        $sql = 'select * from t_message_tag';
                        $res = $db->query ($sql);
                        while ($row = $db->fetchArray ($res)) {
                            ?>
                            <option value="<?php echo $row[ 'tag_id' ]; ?>"><?php echo $row[ 'tag_name' ]; ?></option>
                        <?php } ?>
                </select>
                <input type="submit" id="post-form-submit" value="发布"/>
            </form>
        </div>
        <div id="post-user-detail">
            <ul id="user-detail">
                <li class="user-detail-item"><i
                        class="tags-icon tags-icon-user"><span><?php echo $_SESSION[ 'user' ][ 'name' ]; ?></span></i>
                </li>
                <li class="user-detail-item"><i
                        class="tags-icon tags-icon-location"><span><?php echo $_SESSION[ 'user' ][ 'region' ]; ?></span></i>
                </li>
                <li class="user-detail-item"><i
                        class="tags-icon tags-icon-chart-bar"><span><?php echo $_SESSION[ 'user' ][ 'description' ]; ?></span></i>
                </li>
                <li class="user-detail-item"><i
                        class="tags-icon tags-icon-th-menu"><span><?php echo $_SESSION[ 'user' ][ 'phone' ]; ?></span><span class="hide_user_id" style="display:none;"><?php echo $_SESSION['user']['user_id'];?></span> </i>
                </li>
            </ul>
        </div>
        <div id="wb-card-info">
            <div class="bloger-info">
                <a href="#" alt="logo"><img src="../asset/images/logo-48-48.png" alt="logo"></a>

                <p class="card-item">
                    <i class="tags-icon tags-icon-user">   <?php echo $username; ?></i>
                </p>

                <p class="card-item">
                    <i class="tags-icon tags-icon-chart-bar"><?php echo $_SESSION[ 'user' ][ 'description' ]; ?></i>
                    <i class="tags-icon tags-icon-location"><?php echo $_SESSION[ 'user' ][ 'region' ]; ?></i>
                </p>

                <p class="card-item">
                </p>
            </div>
        </div>
        <?php

            $sql = 'select * from VIEW_USER_MESSAGE_TAG where user_id = ' . $_SESSION[ 'user' ][ 'user_id' ] . ' order by message_id desc';
            $res = $db->query ($sql);
            while ($row = $db->fetchArray ($res)) {
                ?>
                <div class="wb-card">
                    <div class="card-warp">
                        <div class="card-body">
                            <?php echo $row[ 'content' ]; ?>
                        </div>
                        <ul class="card-meta">
                            <li class="card-action">
                                <a class="post-action-readnum"
                                   style="cursor:pointer"> #  <?php echo $row[ 'tag_name' ]; ?></a>
                            </li>
                            <li class="post-action-reply">
                                <a href="#">转发 <?php echo $row[ 'repoNum' ]; ?></a>
                            </li>
                            <li class="post-action-comment">
                                <a href="#">评论 <?php echo $row[ 'cmmtNum' ]; ?></a>
                            </li>
                            <li class="post-action-praised">
                                <a href="#">赞 <?php echo $row[ 'parisedNum' ]; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php
            } ?>
        <div id="pagination">
            <ul>
                <li><a href="#">上一页</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a>...</li>
                <li><a href="#">10</a></li>
                <li><a href="#">下一页</a></li>
            </ul>
        </div>
    </div>
    <!-- post ends -->
</div>
<div id="logout-panel">
    <ul>
        <li>确定退出吗?</li>
        <li><input type="button" id="logout-true" value="确定"/><input type="button" id="logout-canel" value="取消"/></li>
    </ul>
</div>
<!-- main ends -->
<?php require_once ('../view/footer.php'); ?>
</body>
</html>