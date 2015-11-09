<?php
    require_once ('../config.php');
    require_once ('../view/header.php');
    session_start ();
?>

<div id="wrapper">
    <div id="sidebar" class="column-box">
        <div class="column-inner-box">
            <h1>
                <a class="site-home-logo" href="#">PANDAi</a>
            </h1>

            <p class="sidebar-menu-item">
                <span>BORN TO BE PROUND</span>
            </p>

            <div class="sidebar-menu-item">
                <a href="index.php"><i class="tags-icon tags-icon-user"></i><span>我的微博</span></a>
            </div>
            <div class="sidebar-menu-item">
                <a href="#"><i class="tags-icon tags-icon-chart-bar"></i><span>热门微博</span></a>
            </div>
            <div class="sidebar-menu-item">
                <a href="#"><i class="tags-icon tags-icon-group"></i><span>热门博主</span></a>
            </div>
            <div class="sidebar-menu-item hot-tags">
                <a><i class="tags-icon tags-icon-th-menu"></i><span>热门分类</span></a>
            </div>
            <div class="sidebar-menu-item">
            </div>
            <div class="sidebar-menu-item">
                <input type="text" name="search" id="s" placeholder="Search" style="text-align: center;">
            </div>
            <div class="site-home-rights">

            </div>
        </div>
    </div>

    <div id="sidetags">
        <ul id="tags">
            <li><a href="#"><i class="tags-icon tags-icon-music"></i><span>音乐</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-film"></i><span>电影</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-life"></i><span>生活</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-travel"></i><span>旅行</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-sport"></i><span>运动</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-tech"></i><span>科技</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-game"></i><span>游戏</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-culture"></i><span>文化</span></a></li>
            <li><a href="#"><i class="tags-icon tags-icon-laugh"></i><span>搞笑</span></a></li>
        </ul>
    </div>
    <div id="container">
        <!-- main start -->
        <div id="slides" class="shadow">
            <img src="<?php APP_ROOT; ?>../asset/images/1.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/2.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/3.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/4.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/7.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/6.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/8.jpg" alt=""/>
            <img src="<?php APP_ROOT; ?>../asset/images/9.jpg" alt=""/>
        </div>
        <!-- posts start -->
        <div id="posts">
            <!-- post start -->
            <?php
                $sql = "select * from view_user_message_tag where user_id !=" . $_SESSION[ 'user' ][ 'user_id' ] . " order by user_id asc";
                $res = $db->query ($sql);
                while ($row = $db->fetchArray ($res)) {
                    ?>
                    <div class="post">
                        <div class="post-inner-box">
                            <div class="post-header">
                                <img src="../asset/images/logo-32-32.png" alt="avater">
                                <span class="small-date post-author">
                                    <?php echo $row[ 'name' ]; ?></span>
                                <!--                                    # -->
                                <?php //echo date ('Y-m-d', strtotime ($row[ 'publish_time' ])); ?><!-- </span>-->
                            </div>
                            <div class="post-content">
                                <?php echo $row[ 'content' ]; ?>
                            </div>
                            <input name="message_id" type="hidden" id="message_id_hide"
                                   value="<?php echo $row[ 'message_id' ]; ?>"/>
                        </div>
                    </div>
                <?php } ?>
            <div id="search-tag-result">


            </div>
            <!-- post ends -->
            <!--<div id="loading" class="loading-wrap" style="clear:both">-->
            <!--<span class="loading">加载中，请稍后...</span>-->
            <!--</div>-->
        </div>
    </div>
    <!-- posts ends -->
</div>

<div id="post-detail" class="shadow">
    <div id="post-detail-hd">
        <ul>
            <li><img src="../asset/images/logo-48-48.png" alt="user-avater"/></li>
            <li><i class="tags-icon tags-icon-user"><span id="post-detail-user"> /span></i>
            <li><i class="tags-icon tags-icon-chart-bar"><span id="post-detail-description"></span></i></li>
            <li><a id="post-detail-focus">关注</a></li>
            <input id="post-detail-hide-id" name="" type="hidden"/>
        </ul>
    </div>
    <div id="post-detail-body">

    </div>
    <div id="post-detail-ft">
        <span><i class="ali-icon icon-bianji"></i></span>
    </div>
</div>
<div id="post-form" class="shadow">
    <div id="post-form-actionbar">
        <a>评论</a>
        <a>转发</a>
    </div>
    <div id="post-form-cmt">
        <form action="" class="">
            <textarea name="post-form-cmmt-contet" class="post-form-content radius" cols="54" rows="5"></textarea>
            <input type="button" name="post-form-submit" class="post-form-submit radius" value="Comment"/>
            <input class="post-form-type" value="1" name="" type="hidden"/>
        </form>
        <div class="post-form-reply">
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
            </div>

        </div>
    </div>

    <div id="post-form-rep" style="display:none;">
        <form action="" class="">
            <textarea name="post-form-rep-contet" class="post-form-contet radius" cols="54" rows="5"></textarea>
            <input type="button" name="post-form-submit" class="post-form-submit radius" value="Repost"/>
        </form>
        <div class="post-form-reply">
            <div class="post-form-reply-msg">
                <span>bushuai : </span>
                <span>Today is a wonderful day.</span>
                <span>2014-01-01</span>
            </div>
        </div>
    </div>


</div>
<?php require_once ('../view/footer.php'); ?>
</body>
</html>