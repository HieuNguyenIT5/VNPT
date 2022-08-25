<?php

use backend\models\Products;

function currency_format($number)
{
    return number_format($number, 0, '', '.') . 'đ';
}
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="container pt-4">
        <div class="wp-inner">
            <div class="main-content">
                <div class="section content mt-4" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Tất cả các sàn phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php
                            $products = Products::find()->all();
                            foreach ($products as $item) { ?>
                                <li class="product">
                                    <a href="product/detail/?id=<?= $item['id'] ?>" title="" class="thumb">
                                        <img src="uploads/<?php echo $item['image'] ?>" />
                                    </a>
                                    <div class="product-content">
                                        <a href="" title="" class="product-name"><?php echo $item['name'] ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency_format($item['promotional_price']) ?></span>
                                            <span class="old"><?php echo currency_format($item['price']) ?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="cart/add/?id=<?=$item['id']?>&num=1" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>