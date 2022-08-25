<?php

use backend\models\Products;

if (isset($_GET['id'])) $id = $_GET['id'];
$product = Products::find()->where("id = {$id}")->one();
function currency_format($number)
{
    return number_format($number, 0, '', '.') . 'đ';
}
?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="container pt-4">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title=""><?php echo $product['name'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img id="zoom" src="../../uploads/<?php echo $product['image'] ?>" data-zoom-image="<?php echo $product['image'] ?>" />
                            </a>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name"><?php echo $product['name'] ?></h3>
                            <div class="desc">
                                <?php $list_mota = explode('.', $product['describe']);
                                foreach ($list_mota as $mt) {
                                    echo "<p>{$mt}</p>";
                                }
                                ?>
                            </div>
                            <div class="num-product">
                                <span class="title">Tình trạng: </span>
                                <span class="status"><?php
                                                        if ($product['quantity'] > 0) echo "Còn hàng";
                                                        else echo "Hết hàng";
                                                        ?></span>
                            </div>
                            <p class="price"><?php echo currency_format($product['promotional_price'] == 0 ? $product['price'] : $product['promotional_price']) ?></p>
                            <div id="num-order-wp">
                                <a title="" class="change-num" id="minus"><i class="fa fa-minus "></i></a>
                                <input type="number" name="num-order" value="1" id="num-order" , class="num-order" data-id="<?php echo $product["id"] ?>">
                                <a title="" id="plus" class="change-num"><i class="fa fa-plus "></i></a>
                            </div>
                            <div class="btn-change">
                                <a href="checkout/?id=<?php echo $product['id'] ?>&num=1" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail detail_description">
                        <?php echo $product['detail_des'] ?>
                    </div>
                </div>
                <!-- Sản phẩm cùng loại -->
                <div id="main-content-wp" class="same-category clearfix">
                    <div class="container pt-4">
                        <div class="wp-inner">
                            <div class="main-content">
                                <div id="list-product-wp">
                                    <div class="section-head">
                                        <h3 class="section-title">Cùng chuyên mục</h3>
                                    </div>
                                    <div class="section-detail">
                                        <ul class="list-item">
                                            <?php
                                            $list_pro = Products::find()->limit(5)->where("id_category = {$product['id_category']}")->all();
                                            foreach ($list_pro as $item) {
                                            ?>
                                                <li>
                                                    <a href="?id=<?= $item['id'] ?>" title="" class="thumb">
                                                        <img src="../../uploads/<?php echo $item['image'] ?>">
                                                    </a>
                                                    <a href="" title="" class="product-name"><?php echo $item['name'] ?></a>
                                                    <div class="price">
                                                        <span class="new"><?php echo currency_format($item['price']) ?></span>
                                                        <span class="old"><?php echo currency_format($item['promotional_price']) ?></span>
                                                    </div>
                                                    <div class="action clearfix">
                                                        <a href="cart/add/?id=<?=$item['id']?>&num=1" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                        <a href="?mod=cart&act=checkout" title="" class="buy-now fl-right">Mua ngay</a>
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
                        <!-- comment -->
                        <!-- <div class="section" id="comment-wp">
                    <div class="section-head">
                        <h3 class="section-title">Đánh giá sản phẩm</h3>
                    </div>
                    <div class="section-detail" id="comment">
                        <?php if (isset($_SESSION['id_user'])) { ?>
                            <textarea class="comment_text" name="" id="" cols="100" rows="6"></textarea>
                            <button class="submit">Dánh giá</button>
                            <hr>
                        <?php } ?>
                    </div>
                </div> -->
                    </div>
                </div>
            </div>
        </div>