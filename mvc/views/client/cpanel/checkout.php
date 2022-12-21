<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
    <!--/head-->
<script>
    $(document).ready(function(){
        $("#email").keyup(function(){
            var email = $(this).val();
            $.post("ajax/checkuser",{email:email},function(data){
                $("#mess").html(data);
            });
        });

        $("#pass_confirm").keyup(function(){
            var pass_confirm = $(this).val();
            var pass  = $("#pass").val();
            $.post("ajax/checkpass",{pass:pass,pass_confirm:pass_confirm},function(data){
                $("#mess").html(data);
            });
        });

		$(".infororder__input").blur(function(){
            $("#mess").html("");
        });
    });
</script>
<body>

	<!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->
    <div class="checkout">
        <!-- Thông tin giao hàng -->
        <div class="infororder">
                <div class="infororder__container">
                    <header class="infororder__header">
                        <h1 class="infororder__header--title">Thông tin giao hàng</h1>
                    </header>
                    <div class="infororder__form">
                        <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->
    
                        <form action = "checkout" method="post">
                            <div class="infororder__form-group">
                                <input type="text"  name = "data[name]"class="infororder__input" value="<?=$data['info'][0]['tenkh']?>" required>
                                <label for="" class="infororder__label">Họ tên</label>
                            </div>
                
                            <div class="infororder__form-group">
                                <input type="text" name="data[phonenumber]" class="infororder__input" value="<?=$data['info'][0]['sodt']?>"required>
                                <label for="" class="infororder__label">Số điện thoại</label>
                            </div>
                
                            <div class="infororder__form-group">
                                <input type="text" name="data[email]" id="email" class="infororder__input" value="<?=$data['info'][0]['email']?>"required>
                                <label for="" class="infororder__label">Email</label>
                            </div>
                            <!--  -->
                
                            <div class="infororder__input--address">
                                <div class="select-address">
                                    <select class="infororder__input--address-combobox" id="city_infororder" name="data[city]">
                                        <option value="<?=$data['info'][0]['matp']?>" selected><?= $data['city'][0]['name']?></option>
                                        <?php 
                                        $listcity = $this->full_address->city_all();
                                        // $listcity = $data['list_city'];
                                        foreach($listcity as $row):?>
                                            <option value="<?php echo $row['matp']; ?>"><?php echo $row['name']; ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </div>
                                
                                <div class="select-address">
                                    <select class="infororder__input--address-combobox" id="district_infororder" name="data[district]" >
                                        <option value="<?=$data['info'][0]['maqh']?>"><?=$data['district'][0]['name']?></option>
                                        
                                    </select>
                                </div>
                
                                <div class="select-address">
                                    <select class="infororder__input--address-combobox" id="ward_infororder" name="data[ward]">
                                        <option value="<?=$data['info'][0]['xaid']?>" selected><?=$data['ward'][0]['name']?></option>
                                    </select>
                                </div>
                            </div>
                
                            <div class="infororder__form-group">
                                <input type="text" class="infororder__input" name = "data[address]" value="<?=$data['info'][0]['diachi']?>" required>
                                <label for="" class="infororder__label">Địa chỉ <label style="font-size: 1.2rem;">(Ví dụ: 79 đường số 12...)</label></label>
                            </div>
                            
                            <div class="infororder__form-group">
                                <label for="" class="" style="padding-left: 10px;margin-bottom: 10px;font-size: 1.3rem; font-weight: 600; color: var(--text-color);">Ghi chú đơn hàng </label>
                                <textarea type="text" class="infororder__input" name = "data[note]" value="" style="height: 100px;"></textarea>
                            </div>
                            
                            <div style="height: auto;font-size: 14px; padding: 16px;">
                                <div class=""style="height: 50px; padding-bottom: 16px;">
                                    <p style="margin:0; font-weight: 700;">Phương thức vận chuyển</p><br>
                                    <div class="" style="padding-left: 10px;">
                                        <input type="radio" name="data[ship]" id="" class="gender__input--radio" value="0" checked>
                                        <label class="gender__input--label" style="margin-bottom: 16px;padding-top: 16px;padding-bottom: 16px;">Giao hàng tận nơi</label>
                                    </div>
                                </div>
                                <div class=""style="height: 50px; padding-bottom: 16px;">
                                    <p style="margin-top: 16px; font-weight: 700;">Phương thức thanh toán</p><br>
                                    <div class="" style="padding-left: 10px;">
                                        <input type="radio" name="data[pay]" id="" class="gender__input--radio" value="0" checked>
                                        <label class="gender__input--label" style="padding-bottom: 16px;">Thanh toán khi giao hàng (COD)</label>
                                    </div>
                                </div>
                                <!-- <div class="gender__input">
                                    <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="1">
                                    <label class="gender__input--label">Nữ</label>
                                </div> -->
                            </div>

                            <div class="infororder__form-group center-colum">
                                <p class="infororder__footer--text">This site is protected by reCAPTCHA and the Google 
                                    <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and 
                                    <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
                                </p>
                            </div>
                            <input type="text" name="data['total']" value="<?=$data['total']?>" hidden>
                            <div class="infororder-btn">

                                <a href="<?=base?>cart/showcart" class="infororder__footer--item">
                                    <i class="infororder__footer-icon fa-solid fa-arrow-left-long"></i>
                                    Giỏ Hàng 
                                </a>
                                <input type = "submit" class="infororder__footer--btn" name="submit" value="Đặt hàng">
                            </div>
                        </form>
                    </div>
                    <div class="infororder__footer">
    
                        <!-- <a href="<?=base?>login" class="infororder__footer--item">
                            Đăng nhập
                            <i class="infororder__footer-icon fa-solid fa-arrow-right-long"></i>
                        </a> -->
                    </div>
                </div>
            </div>
        <!--/ Register -->
        
        <!-- Cart -->
        <div class="order-infor-container">
            <div class="cart-checkout-title" style="padding: 16px;">
                <?php if(isset($_SESSION["cart"])){?>
                <?php echo count($_SESSION['cart']); ?> sản phẩm
                <?php } ?>
                0 sản phẩm
            </div>
            <div class="order-infor--content-container">
                <?php if(isset($_SESSION["cart"])){?>
                <?php foreach($_SESSION["cart"] as $values):?>
                <div class="order-infor--product">
                    <div class="order-infor-left">
                        <img class="order-infor--content__img" src="<?=base?>public/client/assets/img/<?=$values['gioitinh']?>/<?php echo $values["img"]?>"></img>
                        <div class="order-infor--content__nameBox">
                            <strong class="order-infor--content__title mg-bt-8px" style="font-size: 16px;"><?=$values["name"]?></strong>
                            <div class="order-infor--content__option mg-bt-8px">
                                <?php 
                                if($values['gioitinh'] == 'men'){
                                    echo 'Đồng hồ Nam';
                                } else echo 'Đồng hồ Nữ';
                                ?>
                            </div>
                            <div class="order-infor--content__option mg-bt-8px">
                                <?= $values['color']?> / <?= $values['size']?>MM
                                <!-- <p class="order-infor--content__option-color">Silver</p>
                                <p class="order-infor--content__option-size">40MM</p> -->
                            </div>
                            <div class="order-infor--content__price mg-bt-8px">
                                <span class="order-infor--content__price-new"><?= $values['price_new']?> ₫</span>
                                <span class="order-infor--content__price-old"><?= $values['price_old']?> ₫</span>
                            </div>
                        </div>
                    </div>
                    <div class="order-infor--content__btn" style="font-size: 12px;">
                        <!-- <span style="padding: 8px; font-size: 12px;">Số lượng: </span> -->
                        <!-- <div class="order-quanlity-btn"> -->
                            <!-- <a href="<?=base?>ajax/downquantity&id=<?=$values["id"]?>" class="order-infor--content__btn-sub" value="">-</a> -->
                            Số lượng:<span type="text" value="<?= $values['quantity']?>" class="order-infor--quanlity-input"><?= $values['quantity']?></span>
                            <!-- <a href="<?=base?>ajax/upquantity&id=<?=$values["id"]?>" class="order-infor--content__btn-add" value="">+</a> -->
                        <!-- </div> -->
                        <!-- <a href="<?=base?>ajax/deleteproductcart&id=<?=$values["id"]?>" class="order-remove-product">Xóa</a> -->
                    </div>
                    <!-- Số lượng: <input type="text" value="<?= $values['quantity']?>" class="order-infor--quanlity-input"> -->
    
                    <p class="order-infor--content__total" style="font-size: 16px;"><strong><?= $values['total']?> ₫</strong></p>
                </div>
                <?php endforeach;?>
                <?php }?>
            </div>
            <table style="padding: 0 60px 16px;">
                <tr class="order-checkout--total" style="padding-bottom: 16px;">
                    <td><span class="order-checkout--total__text font-size-14">Tạm tính:</span></td>
                    <?php if(isset($_SESSION["cart"])){?>
                        <td><span class="order-checkout--total__price font-size-16 color-black"><strong><?= $data['total']?> ₫</strong></span></td>
                        <!-- <td><span class="order-checkout--total__price" name='data["total"]' value='<?= $data['total']?>'><strong><?= $data['total']?> ₫</strong></span></td> -->
                    <?php }
                    else { ?>
                        <!-- <td><span class="order-checkout--total__price" name='data["total"]' value='<?= $data['total']?>'><strong>0 ₫</strong></span></td> -->
                        <td><span class="order-checkout--total__price font-size-16 color-black"><strong>0 ₫</strong></span></td>
                        
                    <?php }?>
                    <!-- <td><span class="order-checkout--total__price font-size-16 color-black"><strong><?= $data['total']?> ₫</strong></span></td> -->
                </tr>
                <tr class="order-checkout--total border-bottom" style="padding-bottom: 24px; border-bottom: 1px #eee solid;">
                    <td><span class="order-checkout--total__text font-size-14">Phí ship:</span></td>
                    <td><span class="order-checkout--total__price font-size-16 color-black"><strong>35000 ₫</strong></span></td>
                </tr>
                <tr class="order-checkout--total" style="padding-bottom: 16px;">
                    <td><span class="order-checkout--total__text font-size-16">Tổng tiền:</span></td>
                    <?php if(isset($_SESSION["cart"])){?>
                        <td><span class="order-checkout--total__price" name='data["total"]' value='<?= $data['total']?>'><strong><?= $data['total']?> ₫</strong></span></td>
                    <?php }
                    else { ?>
                        <td><span class="order-checkout--total__price" name='data["total"]' value='<?= $data['total']?>'><strong>0 ₫</strong></span></td>
        
                    <?php }?>
                    
                </tr>
            </table>
        </div>
    </div>
	<!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>


<script>
    $(document).ready(function(){
        $("#city_infororder").change(function(){
            var id_city = $("#city_infororder").val();
            // alert(id_city);
            $.post("<?=base?>ajax/district", {id_city: id_city}, function(data2){
                    $("#district_infororder").html(data2);
                }
                )
        })

        $("#district_infororder").change(function(){
            var id_district = $("#district_infororder").val();
            $.post("<?=base?>ajax/ward", {id_district: id_district}, function(data2){
                $("#ward_infororder").html(data2);
            })
        })
    })
</script>
