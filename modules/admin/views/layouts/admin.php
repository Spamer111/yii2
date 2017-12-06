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
    <title>Админка | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/web/css/simplebox.css" >
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
            <!--
            <h3>Категории</h3>
            <div id="jquery-accordion-menu" class="jquery-accordion-menu white">
                <ul id="demo-list">
                    <?php echo \app\components\MenuWidget::widget(['tpl' => 'menu']); //вывод виджета, tpl - параметр который определяет
            // какой вид виджета мы выводим?>
                </ul>
            </div>
        -->


            <div class="clear"></div>
        </div>
        <div class="navigation">
            <a class="toggleMenu" href="#">Menu</a>

            <ul class="nav">
                <li>
                    <a href="<?php echo \yii\helpers\Url::home()?>">Home</a>
                </li>

                <li>
                    <a href="#">Категорий</a>
                    <ul>
                        <li>
                            <a href="<?php echo Url::to(['category/index'])?>">Список категорий</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['category/create'])?>">Добавить категорию</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Товары</a>
                    <ul>
                        <li>
                            <a href="<?php echo Url::to(['product/index'])?>">Список товаров</a>

                        </li>
                        <li>
                            <a href="<?php echo Url::to(['product/create'])?>">Добавить товар</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onclick="return getCart()">Корзина</a>
                </li>
                <li>
                    <?php if(!Yii::$app->user->isGuest): // если это не гость?>
                        <a href="<?php echo Url::to(['/site/logout'])?>"><?php echo Yii::$app->user->identity['username']?> (Выход)</a>
                    <?php endif;?>
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
<div class="container">.

    <!-- Вывод флеш сообщения при удачном заказе-->
    <?php if (Yii::$app->session->hasFlash('success')): // пореряем если есть метод hasFlash с ключем success, то выводим с одним оформлением?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            <?= Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif;?>
    <!-- Вывод флеш сообщения при неудачном заказе-->
    <?php if (Yii::$app->session->hasFlash('error')): // пореряем если есть метод hasFlash с ключем error, то выводим с другим оформлением?>?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            <?= Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>
    <!-- Конец вывода флеш сообшений-->

<?php
//Выводим контент который распологаеться по адресу views/...
echo $content;
?>
    </div>
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


<a href="#" id="toTop"> </a>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

