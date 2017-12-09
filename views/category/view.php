<?php

use yii\helpers\Html;
use yii\helpers\Url;

echo '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
debug($products->id);
echo '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="wrap">
                <h3>Последние продукты</h3>
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
                    <h3><?php echo $category->name;?></h3>
                    <?php if(!empty($products)):?>
                    <div class="section group">
                        <?php foreach ($products as $product):?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <h4><a href="<?php echo Url::to(['product/view', 'id' => $product->id])?>"><?php echo $product->name;?></a></h4>
                            <a href="<?php echo Url::to(['product/view', 'id' => $product->id])?>"><?php echo \yii\helpers\Html::img("@web/images/products/{$product->img}", ['alt' => $product->name])?></a>
                            <div class="price-details">
                                <div class="price-number">
                                    <p><span class="rupees">$<?php echo $product->price?></span></p>
                                </div>
                                <div class="add-cart">
                                    <h4><a href="#" data-id="<?php echo $product->id;?>" class="add-to-cart">В корзину</a></h4>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <div class="clear"></div>

                        <div>
                            <?php
                            
                                echo \yii\widgets\LinkPager::widget([
                                    'pagination' => $pages,
                                ]);?>
                        </div>
                    </div>

                    <?php else:?>
                        <h2>Здесь товаров пока нет</h2>
                    <?php endif;?>
                    <div class="clear"></div>
                    <div class="product-articles">
                        <h3>Browse All Categories</h3>
                        <ul>
                            <li>
                                <div class="article">
                                    <p><span>Aenean vitae massa dolor</span></p>
                                    <p>Phasellus in quam dui. Nunc ornare, tellus rutrum porttitor imperdiet, dui leo molestie nisl, sit amet dignissim nibh magna pharetra quam. Nunc ultrices pellentesque massa, ac adipiscing dui rutrum id. In cursus augue non erat faucibus eu condimentum dolor molestie.</p>
                                    <p><a href="#">+ Read Full article</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="article">
                                    <p><span>Phasellus sollicitudin consectetur</span></p>
                                    <p>Cras aliquam, odio ac consectetur tincidunt, eros nunc fermentum augue, quis rutrum ante lectus ac lectus. Fusce sed tellus orci, et feugiat urna. Integer et dictum leo. Nulla consectetur tempus orci sed consequat. Mauris cursus est a sapien venenatis faucibus. Etiam sagittis convallis volutpat.</p>
                                    <p><a href="#">+ Read Full article</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>