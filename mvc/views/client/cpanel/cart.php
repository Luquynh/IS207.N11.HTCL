<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
    ?>
    <!--/head-->

<body>

	<!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->

    <!-- Cart -->
    <div class="cart">
        <div class="cart-container">
            <div class="cart-infor--title">
                <span class="cart-infor--title__left">Giỏ hàng:</span>
                <?php if(isset($_SESSION["cart"])){?>
                <span class="cart-infor--title__right"><?php echo count($_SESSION['cart']); ?> sản phẩm</span>
                <?php }?>
            </div>
            <div class="cart-flexbox" style="display: flex; margin-top: 24px;">
                <!-- <form action="" method="POST"> -->
                    <div class="cart-infor-container">
                        <div class="cart-infor--content-container">
                            <?php if(isset($_SESSION["cart"])){?>
                            <?php foreach($_SESSION["cart"] as $values):?>
                            <div class="cart-infor--product">
                                <div class="cart-infor-left">
                                    <img class="cart-infor--content__img" src="<?=base?>public/client/assets/img/<?=$values['gioitinh']?>/<?php echo $values["img"]?>"></img>
                                    <div class="cart-infor--content__nameBox">
                                        <strong class="cart-infor--content__title mg-bt-8px" style="font-size: 16px;"><?=$values["name"]?></strong>
                                        <div class="cart-infor--content__option mg-bt-8px">
                                            <?php 
                                            if($values['gioitinh'] == 'men'){
                                                echo 'Đồng hồ Nam';
                                            } else echo 'Đồng hồ Nữ';
                                            ?>
                                        </div>
                                        <div class="cart-infor--content__option mg-bt-8px">
                                            <?= $values['color']?> / <?= $values['size']?>MM
                                            <!-- <p class="cart-infor--content__option-color">Silver</p>
                                            <p class="cart-infor--content__option-size">40MM</p> -->
                                        </div>
                                        <div class="cart-infor--content__price mg-bt-8px">
                                            <span class="cart-infor--content__price-new"><?= $values['price_new']?> ₫</span>
                                            <span class="cart-infor--content__price-old"><?= $values['price_old']?> ₫</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-infor--content__btn">
                                    <!-- <span style="padding: 8px; font-size: 12px;">Số lượng: </span> -->
                                    <div class="cart-quanlity-btn">
                                        <a href="<?=base?>ajax/downquantity&id=<?=$values["id"]?>" class="cart-infor--content__btn-sub" value="">-</a>
                                        <input type="text" value="<?= $values['quantity']?>" class="cart-infor--quanlity-input">
                                        <a href="<?=base?>ajax/upquantity&id=<?=$values["id"]?>" class="cart-infor--content__btn-add" value="">+</a>
                                    </div>
                                    <a href="<?=base?>ajax/deleteproductcart&id=<?=$values["id"]?>" class="cart-remove-product">Xóa</a>
                                </div>
                                <p class="cart-infor--content__total" style="font-size: 16px;"><strong><?= $values['total']?> ₫</strong></p>
                            </div>
                            <?php endforeach;?>
				            <?php }?>
                        </div>
                        <?php if(!isset($_SESSION["cart"])){?>
                            <p style="font-size: 16px;  position:absolute;padding: 16px 0;">Giỏ hàng của bạn đang trống. Mời bạn mua thêm sản phẩm <a class="buyhere" style="cursor: pointer;"><strong>tại đây.</strong></a></p>
                        <?php }?>
                    </div>
            
                    
                    <div class="cart-checkout-container">
                        <div class="cart-checkout-title">Thông tin đơn hàng</div>
                        <div class="cart-checkout--total" style="padding: 16px 0;">
                            <span class="cart-checkout--total__text">Tổng tiền:</span>
                            <span class="cart-checkout--total__price"><strong><?= $data['total']?> ₫</strong></span>
                        </div>
                        <div class="cart-checkout--label" style="font-size: 14px; padding: 16px 0;"> 
                            <p style="padding-bottom: 8px;">Freeship đơn hàng trên 700k </p>
                            <p>Phí vận chuyển sẽ được tính ở trang thanh toán. </p>
                        </div>
                        <!-- <div class="cart-checkout--note">
                            <div class="cart-checkout--note__title"style="font-size: 16px;">Ghi chú đơn hàng</div>
                            <textarea name="" id="" cols="20" rows="8" class="cart-checkout--note__text"></textarea>
                        </div> -->
                        <div class="cart-checkout--footer">
                            <a href="<?=base?>checkout" class="cart-checkout-buy-btn mg-b-10">THANH TOÁN NGAY</a>
                            <a href="" class="cart-checkout-buy-back mg-b-10" style="font-size: 14px;">
                                <!-- <i class="fa-solid fa-arrow-rotate-left cart-checkout-buy-icon"></i> -->
                                <!-- <i class="ti-arrow-left cart-checkout-buy-icon"></i> -->
                                TIẾP TỤC MUA SẮM
                            </a>
                            <a href="<?=base?>cart/resetcart" class="reset-cart-btn" style="font-size: 14px;">
                                <!-- <i class="fa-solid fa-arrow-rotate-left cart-checkout-buy-icon"></i> -->
                                <i class="ti-trash cart-checkout-buy-icon "></i>
                                Làm mới giỏ hàng
                            </a>
                        </div>
                    </div>                   
                <!-- </form> -->
                
            </div>
        </div>
    </div>
    <!-- /Cart -->

	<!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>

