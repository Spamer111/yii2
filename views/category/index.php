<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
debug($product->id);
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="wrap">
                <h3>Latest Products</h3>
            </div>
            <div class="line"> </div>
            <div class="wrap">
                <div class="ocarousel_slider">
                    <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                        <div class="ocarousel_window">
                            <a href="#" title="img1"> <img src="/web/images/latest-product-img1.jpg" alt="" /><p>Nuncvitae</p></a>
                            <a href="#" title="img2"> <img src="/web/images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>
                            <a href="#" title="img3"> <img src="/web/images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>
                            <a href="#" title="img4"> <img src="/web/images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>
                            <a href="#" title="img5"> <img src="/web/images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>
                            <a href="#" title="img6"> <img src="/web/images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>
                            <a href="#" title="img1"> <img src="/web/images/latest-product-img1.jpg" alt="" /><p>Nuncvitae</p></a>
                            <a href="#" title="img2"> <img src="/web/images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>
                            <a href="#" title="img3"> <img src="/web/images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>
                            <a href="#" title="img4"> <img src="/web/images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>
                            <a href="#" title="img5"> <img src="/web/images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>
                            <a href="#" title="img6"> <img src="/web/images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>
                        </div>
			               <span>
			                <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
			                <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
			               </span>
                    </div>
                </div>
            </div>
        </div>



        <div class="content_bottom">
            <div class="wrap">
                <div class="content-bottom-left">
                    <div class="categories category-menu">
                        <h3>Категории</h3>
                            <ul class="catalog">
                                <?php echo \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
                            </ul>
                    </div>
                    <div class="buters-guide">
                        <h3>Buyers Guide</h3>
                        <p><span>We want you to be happy with your purchase.</span></p>
                        <p>So we're committed to giving you all the tools to make the right decision with minimum fuss. </p>
                    </div>
                    <div class="add-banner">
                        <img src="/web/images/camera.png" alt="" />
                        <div class="banner-desc">
                            <h4>Electronics</h4>
                            <a href="#">More Info</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="add-banner add-banner2">
                        <img src="/web/images/computer.png" alt="" />
                        <div class="banner-desc">
                            <h4>Computers</h4>
                            <a href="#">More Info</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="content-bottom-right">

                    <?php if(!empty($this)):?>
                    <h3>Популярные товары</h3>
                    <div class="section group">
                        <?php foreach ($hits as $hit):?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <h4><a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>"><?php echo $hit->name;?></a></h4>
                            <a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>"><?php echo \yii\helpers\Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name ])?></a>
                            <div class="price-details">
                                <div class="price-number">
                                    <p><span class="rupees">$<?php echo $hit->price;?> </span></p>
                                </div>

                                  <!--  <h4><a class="btn btn-default add-to-cart" data-id="<?php echo $hit->id;?>" href="<?php echo Url::to(['cart/add', 'id' => $hit->id])?>">В корзину</a></h4> -->
                                    <div class="add-cart">
                                        <h4><a href="#" data-id="<?php echo $hit->id;?>" class="add-to-cart">В корзину</a></h4>
                                    </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div>
                            <?php
                           
                                echo \yii\widgets\LinkPager::widget(['pagination' => $pages,]);
                            ?>
                    </div>
                    <?php endif;?>


                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>