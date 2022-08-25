<?php
$id_user = Yii::$app->user->identity->id;
$cart = $this->getCart($id_user);
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="container pt-4">
        <div class="wp-inner">
            <div id="main-content-wp" class="cart-page">
                <div class="section" id="breadcrumb-wp">
                    <div class="wp-inner">
                        <div class="section-detail">
                            <ul class="list-item clearfix">
                                <li>
                                    <a href="/VNPT/YiiDemo/home" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="" title="">Giỏ hàng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="wrapper" class="wp-inner clearfix">
                    <?php
                    if (!empty($cart)) {
                    ?>
                        <div class="section" id="info-cart-wp">
                            <div class="section-detail table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Mã sản phẩm</td>
                                            <td>Ảnh sản phẩm</td>
                                            <td>Tên sản phẩm</td>
                                            <td>Giá sản phẩm</td>
                                            <td>Số lượng</td>
                                            <td colspan="2">Thành tiền</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($cart as $itemCart) {
                                            $item = $this->getProductByid($itemCart['id_product']);
                                            $price = $this->getPrice($item);
                                            $subtotal = $price * $itemCart['quantity'];
                                            $total += $subtotal;
                                            // $pro = get_item("sanpham","masp", $item["MaSP"]);
                                        ?>
                                            <tr>
                                                <td class="masp"> <?php echo $item['id'] ?> </td>
                                                <td>
                                                    <a href="" title="" class="thumb">
                                                        <img src="/VNPT/YiiDemo/uploads/<?php echo $item['image'] ?>" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" title="" class="name-product"><?php echo $item['name'] ?></a>
                                                </td>
                                                <td class="price"><?php echo $this->currency_format($price) . "<span>$price</span>" ?></td>
                                                <td>
                                                    <input type="number" name="num-order" min=1 max=100 value="<?php echo $itemCart['quantity'] ?>" class="num-order num-order<?php echo $item['id'] ?>" data_max_num='<?php echo $item['quantity'] ?>' data-id="<?php echo $item['id'] ?>">
                                                </td>
                                                <td class="subtotal<?php echo $item['id']  ?>"><?php echo $this->currency_format($subtotal); ?></td>
                                                <td>
                                                    <a href="delete/?id=<?php echo $itemCart['id'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="clearfix">
                                                    <p id="total-price" class="fl-right" data-total="<?php echo $total ?>">Tổng giá: <span><?php echo $this->currency_format($total) ?></span></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div class="clearfix">
                                                    <div class="fl-right">
                                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="section" id="action-cart-wp">
                            <div class="section-detail">
                                <a href="order" title="" id="buy-more">Đơn hàng của tôi</a><br />
                                <a href="../home" title="" id="buy-more">Mua tiếp</a><br />
                                <a href="delete" title="" id="delete-cart">Xóa giỏ hàng</a>
                            </div>
                        </div>
                    <?php
                    } else echo "<p>Không có sản phẩm nào trong giỏ hàng<a href='/VNPT/YiiDemo/home' style='color:blue;'>(Tiếp tục mua hàng)</a></p>"
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>