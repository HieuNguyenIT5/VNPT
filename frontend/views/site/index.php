<?php

use backend\models\Products;
use backend\models\Brand;
use backend\models\Category;


function currency_format($number)
{
    return number_format($number, 0, '', '.') . 'đ';
}
?>
<div class="container mt-4">
    <div class="wp-inner">
        <div class="main-content">
            <div class="section" id="slider-wp">
                
            </div>
            <?php 
            $list_cat = Category::find()->all();
            foreach($list_cat as $cat){
            ?>
            <div class="section content mt-4" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="?mod=products&id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></h3>
                    <div class="list_trademark">

                        <?php
                        $list_brand = Brand::find()->all();
                        foreach ($list_brand as $brand) {
                            echo "<a href='?mod=products&id_hang={$brand['id']}'>{$brand['name']}</a>";
                        }
                        ?>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        $products = Products::find()->where("id_category = {$cat['id']}")->limit(5)->all();
                        foreach ($products as $item) { ?>
                            <li class="product">
                                <a href="" title="" class="thumb">
                                    <img src="uploads/<?php echo $item['image'] ?>" />
                                </a>
                                <div class="product-content">
                                    <a href="" title="" class="product-name"><?php echo $item['name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['promotional_price']) ?></span>
                                        <span class="old"><?php echo currency_format($item['price']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
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
            <?php } ?>
        </div>
    </div>
</div>