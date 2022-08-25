<div id="head-body" class="">
    <div class="container d-flex">
        <a href="/VNPT/YiiDemo/home" title="" id="logo" class="fl-left"><img src="/VNPT/QuangVinhShop/uploads/logo.png" /></a>
        <div id="search-wp" class="fl-left">
            <form method="POST" action="">
                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                <button name="btn-search" type="submit" id="sm-s"><i class=" fa fa-search"></i></button>
            </form>
        </div>
        <div id="action-wp" class="d-flex">
            <div id="advisory-wp" class="fl-left">
                <span class="title">Tư vấn</span>
                <span class="phone">0987.654.321</span>
            </div>
            <!-- <div id="btn-respon" class="fl-right">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div> -->
            <div>
                <div id="cart-wp" class="fl-right">
                    <div id="btn-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span id="num"><?= $this->getNumberOfProductsInCart()?></span>
                    </div>

                    <div id="dropdown">
                        <p class="desc">Có <span><?= $this->getNumberOfProductsInCart()?></span> sản phẩm trong giỏ hàng</p>
                        <ul class="list-cart">
                            <?php
                            $cart = $this->getCart();
                            foreach ($cart as $itemCart) {
                                $item = $this-> getProductByid($itemCart['id_product']);
                            ?>
                            <li class="clearfix">
                                <a href="" title="" class="thumb fl-left">
                                    <img src="VNPT/YiiDemo/uploads/ <?= $item['image'] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="" title="" class="product-name"><?= $item['name'] ?></a>
                                    <p class="price"><?= $this->currency_format($this->getPrice($item)) ?></p>
                                    <p class="qty">Số lượng: <span><?= $itemCart['quantity'] ?></span></p>
                                </div>
                            </li>
                            <?php } 
                            ?>
                        </ul>
                        <div class="total-price clearfix">
                            <p class="title fl-left">Tổng:</p>
                            <p class="price fl-right"><?= $this->currency_format($this->getTotalCart()) ?></p>
                        </div>
                        <div class="action-cart clearfix">
                            <a href="/VNPT/YiiDemo/cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                            <a href="cart/checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                        </div>
                    </div>
                    <?php //} 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>