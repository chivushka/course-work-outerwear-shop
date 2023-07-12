<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
<!--                <li><a href="index.html">Home</a></li>-->
<!--                <li class="active">Single</li>-->
                <?= $breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <?php if($gallery): ?>
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php foreach ($gallery as $item): ?>
                                        <li data-thumb="/public/images/<?=$item->img;?>">
                                            <div class="thumb-image">
                                                <img src="/public/images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <img class="img-responsive zoom-img" src="/public/images/<?=$product->img;?>" alt="" />
                        <?php endif; ?>
                        <!-- FlexSlider -->

                    </div>
                    <?php
                    $curr =\ishop\App::$app->getProperty('currency');
                    $cats = \ishop\App::$app->getProperty('cats');
                    ?>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$product->title?></h2>


                            <h5 class="item_price" id="base-price" data-base="<?=$product->price*$curr['value'];?>"><?=$curr['symbol_left']?><?=$product->price*$curr['value'];?>
                                <?=$curr['symbol_right']?></h5>
                            <?php if($product->old_price):?>
                                <del><?=$curr['symbol_left']?><?=$product->old_price*$curr['value']?><?=$curr['symbol_right']?></del>
                            <?php endif;?>
                            <p><?=$product->content?></p>
                            <?php if($mods):?>
                            <div class="available">
                                <ul>
                                    <li>Розмір<select>
                                            <option>Обрати розмір</option>
                                            <?php foreach($mods as $mod): ?>
                                                <option data-title="<?=$mod->title;?>" data-price="<?=$mod->price * $curr['value'];?>" value="<?=$mod->id;?>"><?=$mod->title;?></option>
                                            <?php endforeach; ?>
                                        </select></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <?php endif;?>
                            <ul class="tag-men">
                                <li><span>Категорія</span>
                                    <span>: <a href="category/<?=$cats[$product->category_id]['alias']?>">
                                            <?=$cats[$product->category_id]['title']?>
                                        </a></span></li>
                            </ul>
                            <div class="quantity" style="margin-top: 1em">
                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                            </div>
                            <a id="productAdd" data-id="<?=$product->id?>" href="cart/add?id=<?=$product->id?>" class="add-cart item_add add-to-cart-link">Додати у кошик</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <?php if($related):?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>З цим товаром також купують:</h3>
                        <?php foreach($related as $item):?>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="/public/images/<?=$item['img']?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="/product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>
                                    <h4>
                                        <a class="item_add add-to-cart-link"
                                           href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
                                        <span class="item_price"><?=$curr['symbol_left']?><?=$item['price']*$curr['value'];?>
                                            <?=$curr['symbol_right']?></span>
                                        <?php if($item['old_price']):?>
                                            <del><?=$curr['symbol_left']?><?=$item['old_price']*$curr['value']?><?=$curr['symbol_right']?></del>
                                        <?php endif;?>
                                    </h4>
                                </div>
                                <?php if($item['old_price']):
                                    $old=$item['old_price']*$curr['value'];
                                    $new=$item['price']*$curr['value'];
                                    $percent=($old/$new-1)*100;
                                    ?>
                                    <div class="srch">
                                        <span>-<?= floor($percent)?>%</span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif;?>
                <?php if($recentlyViewed):?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>Нещодавно переглянуті:</h3>
                            <?php foreach($recentlyViewed as $item):?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="/product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="/public/images/<?=$item['img']?>" alt="" /></a>
                                        <div class="product-bottom">
                                            <h3><a href="/product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>
                                            <h4>
                                                <a class="item_add add-to-cart-link"
                                                   href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
                                                <span class="item_price"><?=$curr['symbol_left']?><?=$item['price']*$curr['value'];?>
                                                    <?=$curr['symbol_right']?></span>
                                                <?php if($item['old_price']):?>
                                                    <del><?=$curr['symbol_left']?><?=$item['old_price']*$curr['value']?><?=$curr['symbol_right']?></del>
                                                <?php endif;?>
                                            </h4>
                                        </div>
                                        <?php if($item['old_price']):
                                            $old=$item['old_price']*$curr['value'];
                                            $new=$item['price']*$curr['value'];
                                            $percent=($old/$new-1)*100;
                                            ?>
                                            <div class="srch">
                                                <span>-<?= floor($percent)?>%</span>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-3 single-right">

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-single-->
