<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use yii\helpers\Url;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>


    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="<?php echo \yii\helpers\Url::home()?>"><?php echo Html::img('@web/images/logo.png', ['alt' => 'TEST-SHOPPER'])?></a>
            </div>


            <div class="header_top_right">
                <div class="search_box">
                    <span>Search</span>
                    <form method="get" action="<?php echo Url::to(['category/search'])?>">
                        <input type="text" name="q" value=""><input type="submit" value="">
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        <div class="navigation">
            <a class="toggleMenu" href="#">Menu</a>
            <ul class="nav">
                <li>
                    <a href="<?php echo \yii\helpers\Url::home()?>">Home</a>
                </li>

                <li>
                    <a href="#" onclick="return getCart()">Корзина</a>
                </li>
                <li>
                    <?php if(!Yii::$app->user->isGuest): // если это не гость?>
                        <a href="<?php echo Url::to(['/site/logout'])?>"><?php echo Yii::$app->user->identity['username']?> (Выход)</a>
                       <?php endif;?>

                </li>
                <li>
                <a href="<?php echo Url::to(['/admin'])?>">Админка</a>
                </li>
                <li>
                    <a href="<?php echo Url::to(['/coments'])?>">Коментарии</a>
                </li>

            </ul>
                       

            <span class="left-ribbon"> </span>
            <span class="right-ribbon"> </span>
        </div>
        <div class="header_bottom">
            <div class="slider-text">
                <h2>Lorem Ipsum Placerat <br/>Elementum Quistue Tunulla Maris</h2>
                <p>Vivamus vitae augue at quam frigilla tristique sit amet<br/> acin ante sikumpre tisdin.</p>
                <a href="#">Sitamet Tortorions</a>
            </div>
            <div class="slider-img">
                <img src="/web/images/slider-img.png" alt="" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!------------End Header ------------>
<?php
//Выводим контент который распологаеться по адресу views/...
echo $content;
?>
<div class="footer">
    <div class="wrap">
        <div class="copy_right">
            <p>Copy rights (c). All rights Reseverd | Template by  <a href="http://w3layouts.com" target="_blank">W3Layouts</a> </p>
        </div>
        <div class="footer-nav">
            <ul>
                <li><a href="#">Terms of Use</a> : </li>
                <li><a href="#">Privacy Policy</a> : </li>
                <li><a href="contact.html">Contact Us</a> : </li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
// Подключение виджета модального окна для карзины

\yii\bootstrap\Modal::begin([
    'header' => '<h2>Карзина</h2>',
    'id' => 'cart',
    'size' =>'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                     <a href="'.Url::to(['cart/view']) .'" class="btn btn-success">Оформить заказ</a>
                     <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить карзину</button>',
]);

\yii\bootstrap\Modal::end();

?>

<a href="#" id="toTop"> </a>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

