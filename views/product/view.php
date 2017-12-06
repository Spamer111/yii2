<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<?php debug($product->id);?>

<div class="main">

    <?php  $mainImg = $product->getImage(); //получаем главную картинку ?>



    

    <!-- Карусель -->
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
        <!-- Индикаторы для карусели -->
        <ol class="carousel-indicators">
            <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Слайды карусели -->
        <div class="carousel-inner">
            <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
            <div class="active item">
                <h2>Слайд №1</h2>
                <img src="/web/images/latest-product-img1.jpg" alt="" />
                <div class="carousel-caption">
                    <h3>Заголовок 1 слайда</h3>
                    <p>Текст (описание) 1 слайда...</p>
                </div>
            </div>
            <!-- Слайд №2 -->
            <div class="item">
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                    <h3>Second slide label</h3>
                    <p>Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                </div>
            </div>
            <!-- Слайд №3 -->
            <div class="item">
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                    <h3>Third slide label</h3>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Навигация для карусели -->
        <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>




    <div class="wrap">
        <div class="preview-page">
            <div class="section group">
                <div class="cont-desc span_1_of_2">
                    <ul class="back-links">
                        <li><a href="#">Home</a> ::</li>
                        <li><a href="#">Product Page</a> ::</li>
                        <li>Product Name</li>
                        <div class="clear"> </div>
                    </ul>
                    <div class="product-details">
                        <div class="grid images_3_of_2">
                            <ul id="etalage">
                                <li>
                                    <a href="optionallink.html">
                                        <?php  $mainImg = $product->getImage(); //получаем главную картинку ?>
                                        <?php  $mainGlr = $product->getImages(); //получаем галерею картинок ?>

                                        <?php echo Html::img($mainImg->getUrl('300x'), ['alt' => $product->name,'class' => 'etalage_thumb_image'])?>
                                    </a>
                                </li>
                                <li>
                                    
                                    <?php
                                    /*
                                        foreach($mainGlr as $img){
                                            echo Html::img($img->getUrl('300x'), ['alt' => $product->name,'class' => 'etalage_thumb_image']);
                                        }
*/
                                    ?>
                                </li>

                            </ul>
                        </div>
                        <div class="desc span_3_of_2">
                            <h2><?php echo $product->name;?></h2>
                            <p><?php echo $product->content;?></>
                            <div class="price">
                                <p>Price: <span>$<?php echo $product->price;?></span></p>
                            </div>
                            <div class="available">
                                <ul>
                                    <li><span>Model:</span> &nbsp; <a href="<?php echo \yii\helpers\Url::to(['category/view', 'id' => $product->category_id])?>"><?php echo $product->category->name; ?></a></li>
                                    <li><span>Shipping Weight:</span>&nbsp; 75.58 kg</li>
                                    <li><span>Units in Stock:</span>&nbsp; 566</li>
                                </ul>
                            </div>
                            <div class="share-desc">
                                <div class="share">
                                    <p>Количиство :</p><input id="qty" type="text"  value="1" min="1" />
                                </div>
                                <div class="button"><span><a href="<?php echo Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?php echo $product->id;?>" class="add-to-cart">В корзину</a></span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="wish-list">
                                <ul>
                                    <li class="wish"><a href="#">Add to Wishlist</a></li>
                                    <li class="compare"><a href="#">Add to Compare</a></li>
                                </ul>
                            </div>
                            <div class="colors-share">
                                <div class="color-types">
                                    <h4>Available Colors</h4>
                                    <form class="checkbox-buttons">
                                        <ul>
                                            <li><input id="r1" name="r1" type="radio"><label for="r1" class="grey"> </label></li>
                                            <li><input id="r2" name="r1" type="radio"><label for="r2" class="blue"> </label></li>
                                            <li><input id="r3" name="r1" type="radio"><label class="white" for="r3"> </label></li>
                                            <li><input id="r4" name="r1" type="radio"><label class="black" for="r4"> </label></li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="social-share">
                                    <h4>Share Product</h4>
                                    <ul>
                                        <li><a class="share-face" href="#"> </a></li>
                                        <li><a class="share-twitter" href="#"> </a></li>
                                        <li><a class="share-google" href="#"> </a></li>
                                        <li><a class="share-rss" href="#"> </a></li>
                                        <div class="clear"> </div>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product_desc">
                        <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Specifications</li>
                                <li>product Tags</li>
                                <li>Product Reviews</li>
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="product-specifications">
                                    <ul>
                                        <li><span class="specification-heading">Body type</span> <span>Metal</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Spin Speed (rpm)</span> <span>0/400/800/1000/1200</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Machine weight (kg)</span> <span>75</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Wash System</span> <span>Tumble wash</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Door diameter (mm)</span> <span>300</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Dimensions (w*d*h) without packing</span> <span>595x595x850</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Power Supply</span> <span>230V, 50Hz, 16Amps</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Motor (Watts)</span> <span>440 for Wash/490 for Spin</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Drum basket</span> <span>stainless steel</span><div class="clear"></div></li>
                                        <li><span class="specification-heading">Adjustable Feet</span> <span>4 </span><div class="clear"></div></li>
                                    </ul>
                                </div>

                                <div class="product-tags">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <h4>Add Your Tags:</h4>
                                    <div class="input-box">
                                        <input type="text" value="">
                                    </div>
                                    <div class="button"><span><a href="#">Add Tags</a></span></div>
                                </div>

                                <div class="review">
                                    <h4>Lorem ipsum Review by <a href="#">Finibus Bonorum</a></h4>
                                    <ul>
                                        <li>Price : <div class="rating-stars"><div class="rating" data-rating-max="5"> </div> </div>
                                        </li>
                                        <li>Value : <div class="rating-stars"><div class="rating" data-rating-max="5"> </div> </div></li>
                                        <li>Quality : <div class="rating-stars"><div class="rating" data-rating-max="5"> </div> </div></li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <div class="your-review">
                                        <h4>How Do You Rate This Product?</h4>
                                        <p>Write Your Own Review?</p>
                                        <form>
                                            <div>
                                                <span><label>Nickname<span class="red">*</span></label></span>
                                                <span><input type="text" value=""></span>
                                            </div>
                                            <div><span><label>Summary of Your Review<span class="red">*</span></label></span>
                                                <span><input type="text" value=""></span>
                                            </div>
                                            <div>
                                                <span><label>Review<span class="red">*</span></label></span>
                                                <span><textarea> </textarea></span>
                                            </div>
                                            <div>
                                                <span><input type="submit" value="SUBMIT REVIEW"></span>
                                            </div>
                                        </form>
                                    </div>
                                    <script type="text/javascript">
                                        /* place inside document ready function */
                                        $(".rating").starRating({
                                            minus: true // step minus button
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rightsidebar span_3_of_1 sidebar">
                    <?php if(!empty($this)):?>
                    <h3>Популярные товары</h3>
                    <ul class="popular-products">
                        <?php foreach ($hits as $hit):?>
                        <li>
                            <h4><a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>"><?php echo $hit->name;?></a></h4>
                            <a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>"><?php echo \yii\helpers\Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name ])?></a>
                            <div class="price-details">
                                <div class="price-number">
                                    <p><span class="rupees line-through">$<?php echo $hit->price*0.9;?> </span> &nbsp; <span class="rupees">$<?php echo $hit->price;?> </span></p>
                                </div>
                                <div class="add-cart">
                                    <h4><a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>">More Info</a></h4>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                    



                    <div class="community-poll">
                        <h3>Community POll</h3>
                        <p>What is the main reason for you to purchase products online?</p>
                        <div class="poll">
                            <form>
                                <ul>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="1">
                                        <span class="label"><label>More convenient shipping and delivery </label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="2">
                                        <span class="label"><label for="vote_2">Lower price</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="3">
                                        <span class="label"><label for="vote_3">Bigger choice</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="5">
                                        <span class="label"><label for="vote_5">Payments security </label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="6">
                                        <span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="vote" class="radio" value="7">
                                        <span class="label"><label for="vote_7">Other.</label></span>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_top">
        <div class="wrap">
            <h3>Слайдер</h3>
        </div>
        <div class="line"> </div>
        <div class="wrap">
            <div class="ocarousel_slider">
                <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                    <div class="ocarousel_window">
                        <?php foreach ($hits as $hit):?>
                        <a href="<?php echo Url::to(['product/view', 'id' => $hit->id])?>"><?php echo \yii\helpers\Html::img("@web/images/products/{$hit->img}", ['class' => 'slaider','alt' => $hit->name ])?><p><?php echo $hit->name;?></p></a>
                        <?php endforeach;?>
                    </div>
			               <span>
			                <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
			                <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
			               </span>
                </div>
            </div>
        </div>
    </div>
</div>



