/**
 * Created by bushuai on 2014/12/21.
 */

$(function () {
    /**
     *
     * 1.check login and register
     * 2.login & register by using ajax
     */
    $('#reg_button').click(function () {
        var $reg_form = $('#index-form-reg');
        var $loginId = $reg_form.find('#loginId').val();
        var $loginPwd = $reg_form.find('#loginPwd').val();
        var $loginRePwd = $reg_form.find('#loginRePwd').val();
        var $email = $reg_form.find('#email').val();

        if ((!/[@#\$%\^&\*]+/.test($loginId)) && (/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test($email)) && ($loginPwd == $loginRePwd)) {
            var $url = '/Weibo/actions/user.func.php?act=reg';
            var $data = $('#index-form-reg').serialize();
            //$.post($url, $data, function ($res) {
            //    if ($res.replace(/\s+/g, '') == 'success') {
            //        location.href = '/Weibo/index.php';
            //    } else {
            //        alert('Register failed.');
            //    }
            //});
            $.ajax({
                url: $url,
                type: 'POST',
                data: $data,
                beforeSend: function () {
                    $('#reg_button').val('processing...');
                },
                success: function () {
                    $('#reg_button').val('注册成功.');
                    location.href = '/Weibo/index.php';
                }
            });
        } else {
            $('.error').fadeIn().slideUp(1500);
        }
    });
    $('#login_button').click(function () {
        var $login_form = $('#index-form-login');
        var $loginId = $login_form.find('#loginId').val();
        var $loginPwd = $login_form.find('#loginPwd').val();
        if ($loginId != '' && $loginPwd != '') {
            var $url = '/Weibo/actions/user.func.php?act=login';
            var $data = $('#index-form-login').serialize();
            //$.post($url, $data, function ($res) {
            //    if ($res.replace(/\s+/g, '') == 'success') {
            //        location.href = '/Weibo/user/index.php';
            //    } else {
            //        alert('Login failed.');
            //    }
            //
            //});
            $.ajax({
                url: $url,
                type: 'POST',
                data: $data,
                beforeSend: function () {
                    $('#login_button').val('processing');
                },
                success: function (data) {
                    if (data.replace(/\s+/g, '') == 'failed') {
                        $('.error').val('账户名或密码错误,请重新登录.').fadeIn().slideUp(1500);
                        $('#login_button').val('登录');
                    } else {
                        $('#login_button').val('登录成功.');
                        location.href = '/Weibo/user/index.php';
                    }
                }
            });
        } else {
            $('.error').fadeIn().slideUp(1500);
        }

    });

    /*
     *
     * show/hide the login(reg)-form
     * */
    $('.toggle-form').click(function () {
        $('#index-form-login').slideToggle(500);
        $('#index-form-reg').slideToggle(500);
    });
    $('.post-inner-box').bind("hover", function () {
        $(this).toggleClass("post-inner-box-hover");
    });

    /*
     *
     * */

    $('.post-action-star').click(function () {
        $(this).text('Stared');
        $(this).disable();
    });


    $('#slides').slidesjs({
        navigation: {
            active: false
        },
        pagination: {
            active: false
        },
        effect: {
            fade: {
                speed: 400
            }
        },
        play: {
            active: false,
            // [boolean] Generate the play and stop buttons.
            // You cannot use your own buttons. Sorry.
            effect: "fade",
            // [string] Can be either "slide" or "fade".
            interval: 5000,
            // [number] Time spent on each slide in milliseconds.
            auto: true,
            // [boolean] Start playing the slideshow on load.
            swap: true,
            // [boolean] show/hide stop and play buttons
            pauseOnHover: false,
            // [boolean] pause a playing slideshow on hover
            restartDelay: 2500
            // [number] restart delay on inactive slideshow
        }
    });
    /*
     *
     * switch: show/hide imagebox
     * */
    $('#slides-switch').click(function () {
        var $text = $('#slides-switch').text();
        if ($text == "PICTURE") {
            $('#slides').animate({"margin-top": "0px"});
            $(this).text("MENU");
        } else if ($text == "MENU") {
            $('#slides').animate({"margin-top": "-300px"});
            $(this).text("PICTURE");
        }
    });

    /*
     *   show/hide hot-tags bar
     * */
    $('.hot-tags').click(function () {
        $('#sidetags').animate({'width': 'toggle'});
    });

    /*
     * show/hide new post panel
     * */
    $('.write').click(function () {
        $('#post-form-write').slideToggle();
    });

    /*
     * show/hide user detail panel
     * */
    $('.detail').click(function () {
        $('#post-user-detail').slideToggle();
    });

    /**
     *
     */
    $('.logout').click(function () {
        $('#mask').fadeIn();
        //$('#is_logou');
    });

    /**
     * show single post actionbar
     */

    $('#post-detail-ft').click(function () {
        $('#post-form').animate({'width': 'toggle'});
        $('#post-detail').css('border-right', 'none');
    });

    /*
     *  publish new comment/reply
     * */
    $('.post-form-submit').click(function () {
        var $content = $('.post-form-content').val();
        var $user_id = $('#action-user-id').val();
        var $message_id = $('#post-detail-hide-id').val();
        var $type = $('.post-form-type').val();
        $.ajax({
            type: 'POST',
            url: '/Weibo/actions/message.func.php',
            data: {
                content: $content,
                user_id: $user_id,
                message_id: $message_id,
                message_type: $type,
                act: 'cmmt'
            },
            beforeSend: function () {
                $('.post-form-submit').val("processing...");
            },
            success: function (data) {
                $('.post-form-submit').val("Comment");
                $('.post-form-content').val("");
            }
        });
    });

    $('#post-detail-focus').click(function () {
        $(this).text('已关注');
    });

    /*
     * publish new post
     * */
    $('#post-form-submit').click(function () {
        var $content = $('#post-form-wbcontent').val();
        var $tag = $('#tag_id').get(0).selectedIndex + 1;
        var $user_id = $('.hide_user_id').val();
        $act = 'msg_i';
        $.ajax({
            type: 'POST',
            url: '../actions/message.func.php',
            data: {content: $content, tag_id: $tag, act: $act, user_id: $user_id},
            beforeSend: function () {
                $('#post-form-submit').val("processing...");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.readyState + XMLHttpRequest.status + XMLHttpRequest.responseText);
            },
            success: function (data) {
                location.reload();
            }
        });
    });
    /*
     *
     * show single post info
     * */
    $('.post').click(function () {
        $('#mask').fadeIn();
        $message_id = $(this).find('#message_id_hide').val();
        $.ajax({
            type: 'POST',
            url: '/Weibo/actions/message.func.php',
            data: {message_id: $message_id, act: 'ind_s'},
            dataType: 'json',
            error: function (data) {
                alert("error" + data);
            },
            success: function (data) {
                $('#post-detail-user').html(data['name']);
                $('#post-detail-description').html(data['description']);
                $('#post-detail-body').html(data['content']);
                $('#post-detail-hide-id').val(data['message_id']);
            }
        });
        $('#post-detail').fadeIn();
    });
    $('#mask').click(function () {
        $(this).fadeOut();
        $('#post-detail').fadeOut();
        $('#post-form').fadeOut();
    });

    /*
     * execute waterfall model while page is loading
     * */
    var $container = $('#posts');
    $container.masonry({
        itemSelector: '.post',
        isAnimated: true
    });

//execute ajax when scrollbar is scroll to  the bottom
//var loading = $("#loading").data("on", false);
    $(window).scroll(function () {
        //if (loading.data("on")) return;
        // var $isLoad = $(document).scrollTop() >= $(document).height() - $(window).height();
        //if ($isLoad) {
        //scroll to the bottom
        //load more data
        // loading.data("on", true).fadeIn();
        //}
        //)
        //;
        //
        //$.ajax({
        //    url: '/Weibo/actions/message.func.php',
        //    dataType: 'json',
        //    data: '',
        //    type: 'POST',
        //    success: function () {
        //
        //    }
        //});
        //var $data = null;
        //$.ajax({
        //    $url, $data,
        //    function (data) {
        //        var html = "";
        //        //adding data useing javascript
        //        //$(html).appendTo($container);
        //        //$container.masonry( 'appended', $(html), true );
        //        //document.write(data['postId']);
        //        html += "<div class='post'><div class='post-inner-box'><div class='post-avater'><img src='images/logo-32-32.png' alt='avater'/>";
        //        html += " <span class='post-author'>" + data.userId + "</span> <span class='post-publish-time'>" + data.publishTime + " </span> </div> <div class='post-content'>" + data.content + " </div>";
        //        html += " <ul class='post-meta'> <li class='post-meta-item post-action-reply'> <a href='#'>Reply</a> </li> <li class='post-meta-item post-action-comment'> <a href='#'>Comment</a> </li> </ul> </div> </div>";
        //        html += "<div class='post'><div class='post-inner-box'><div class='post-avater'><img src='images/logo-32-32.png' alt='avater'/>";
        //        html += " <span class='post-author'>" + data.userId + "</span> <span class='post-publish-time'>" + data.publishTime + " </span> </div> <div class='post-content'>" + data.content + " </div>";
        //        html += " <ul class='post-meta'> <li class='post-meta-item post-action-reply'> <a href='#'>Reply</a> </li> <li class='post-meta-item post-action-comment'> <a href='#'>Comment</a> </li> </ul> </div> </div>";
        //        html += "<div class='post'><div class='post-inner-box'><div class='post-avater'><img src='images/logo-32-32.png' alt='avater'/>";
        //        html += " <span class='post-author'>" + data.userId + "</span> <span class='post-publish-time'>" + data.publishTime + " </span> </div> <div class='post-content'>" + data.content + " </div>";
        //        html += " <ul class='post-meta'> <li class='post-meta-item post-action-reply'> <a href='#'>Reply</a> </li> <li class='post-meta-item post-action-comment'> <a href='#'>Comment</a> </li> </ul> </div> </div>";
        //
        //
        //        var $newElems = $(html).css({opacity: 0}).appendTo($container);
        //        $newElems.imagesLoaded(function () {
        //            $newElems.animate({opacity: 1});
        //            $newElems.bind("hover", function () {
        //                $(this).find(".post-inner-box").toggleClass("post-inner-box-hover");
        //            });
        //
        //            $container.masonry('appended', $newElems, true);
        //        });
        //        loading.data("on", false);
        //        loading.fadeOut();
        //    }
    });
});




