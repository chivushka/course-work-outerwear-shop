<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH?>">Головна</a></li>
                <li>Пошук по запиту "<?=h($query);?>"</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-right">
                <?php if(!empty($products)): ?>
                <div class="product-one">
                    <?php $curr =\ishop\App::$app->getProperty('currency');?>
                    <?php foreach($products as $product): ?>
                    <div class="col-md-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="product/<?=$product->alias?>" class="mask"><img class="img-responsive zoom-img"
                                     src="/public/images/<?=$product->img?>" alt="" /></a>
                            <div class="product-bottom">
                                <h3><a href="product/<?=$product->alias;?>"><?= $product->title;?></a></h3>
                                <h4>
                                    <a data-id="<?=$product->id?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id?>"><i></i></a> <span class="item_price">
                                    <?=$curr['symbol_left']?><?=$product->price*$curr['value'];?><?=$curr['symbol_right']?> </span>
                                    <?php if($product->old_price):?>
                                        <small><del><?=$curr['symbol_left']?><?=$product->old_price*$curr['value']?><?=$curr['symbol_right']?></del></small>
                                    <?php endif;?>
                                </h4>
                            </div>
                            <?php if($product->old_price):
                                $old=$product->old_price*$curr['value'];
                                $new=$product->price*$curr['value'];
                                $percent=($old/$new-1)*100;
                                ?>
                                <div class="srch">
                                    <span>-<?= floor($percent)?>%</span>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <? endforeach; ?>
                    <div class="clearfix"></div>

                </div>
                <?php endif; ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->
