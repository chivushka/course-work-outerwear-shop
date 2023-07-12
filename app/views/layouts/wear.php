
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="/public/images/favicon-16x16.png" type="image/png"/>
    <?=$this->getMeta()?>
    <link href="/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/public/megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/public/megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/public/css/flexslider.css" type="text/css" media="screen" />
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--start-menu-->


</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">
                        <select id='currency' tabindex="4" class="dropdown drop">
                            <?php new \app\widgets\currency\Currency(); ?>
                        </select>
                    </div>
                    <div class="btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown">Акаунт&nbsp;&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if(!empty($_SESSION['user'])): ?>
                                <li><a href="#">Вітаю, <?=h($_SESSION['user']['name']);?></a></li>
                                <li><a href="/user/logout">Вихід</a></li>
                            <?php else: ?>
                                <li><a href="/user/login">Вхід</a></li>
                                <li><a href="/user/signup">Реєстрація</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="/cart/show" onclick="getCart(); return false;">
                        <div class="total">
                        <img src="/public/images/cart-1.png" alt=""/>
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <span class="simpleCart_total"><?=$_SESSION['cart.currency']['symbol_left']
                                    . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                            <?php else: ?>
                                <span class="simpleCart_total">Пустий</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="<?=PATH?>"><h1>ComfyWear</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="menu-container">
                <div class="menu">
                    <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/menu.php',
                    ]); ?>
                </div>
                </div>

                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s">
                        <input type="submit" value="">
                    </form>
<!--                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">-->
<!--                    <input type="submit" value="">-->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?=$content?>
</div>

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3><b>Слідувати</b></h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3><b>Зв'язатись</b></h3>
                <h5>+38 096 506 4521</h5>
                <p>comfy_wear@gmail.com</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-12 footer-right">
                <p>© 2022 Made by Ivanna Chernova</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Кошик</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продовжити покупки</button>
                <a href="/cart/view" type="button" class="btn btn-primary">Оформити замовлення</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистити кошик</button>
            </div>
        </div>
    </div>
</div>

<div class="preloader"><img src="/public/images/ring.svg"></div>

<?php $curr=\ishop\App::$app->getProperty('currency'); ?>
<script>
    var path = '<?=PATH;?>',
        course = <?=$curr['value'];?>,
        symboleLeft = '<?=$curr['symbol_left'];?>',
        symboleRight = '<?=$curr['symbol_right'];?>';
</script>

<script src="/public/js/jquery-1.11.0.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/validator.min.js"></script>
<script src="/public/js/typeahead.bundle.js"></script>
<!--dropdown-->
<script src="/public/js/jquery.easydropdown.js"></script>
<!--Slider-Starts-Here-->
<script src="/public/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script src="/public/megamenu/js/megamenu.js"></script>
<script src="/public/js/imagezoom.js"></script>
<script defer src="/public/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<script src="/public/js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="/public/js/main.js"></script>
<!--End-slider-script-->

<?php
//$logs = \R::getDatabaseAdapter()
//    ->getDatabase()
//    ->getLogger();
//
//debug( $logs->grep( 'SELECT' ) );
//?>
</body>
</html>






