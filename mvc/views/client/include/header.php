
    <div id="header">
            <div id="navbar">
                <ul class="nav-list nav-list__left">
                    <li class="nav-item nav-item__left " >Nam giới
                            <div class="nav-item__product--tab">
                                <button name="watch-list-men" class="nav-item__product--tab-link">Đồng hồ
                                    <!-- <i class="nav-item__product--tab-icon ti-arrow-circle-right"></i> -->
                                </button>
                                <button name="watch-chain-men"class="nav-item__product--tab-link">Dây đồng hồ
                                    <!-- <i class="nav-item__product--tab-icon ti-arrow-circle-right"></i> -->
                                </button>
                            </div>
    
                            <div class="subnav-product__tabcontent watch-list-men" id="watch-list-men">
                            <?php while($row = mysqli_fetch_assoc($data["avatar_men"])):?>
                                <a href="http://localhost/curnon/callMCproOPT/show/<?php echo $row["tenbosuutap"]?>" class="watch-item">
                                    <img class="watch-img" src="<?=base?>public/client/assets/img/men/<?php echo $row["img"]?>" alt="">
                                    <p class="watch-name"><?php echo $row["tenbosuutap"]?></p>
                                </a>
                            <?php endwhile;?>
                                <a href="http://localhost/curnon/callMCpromenwo/show/men" class="watch-item watch-name all">Xem tất cả
                                    <br>
                                    <i class="all-icon ti-arrow-right"></i>
                                </a>
                            </div>
                            
                            <div class="subnav-product__tabcontent watch-chain-men" id="watch-chain-men">
                                <img src="<?=base?>public/client/assets/img/men/watch-chain-men.jpg" alt="Dây đồng hồ" class="watch-chain--img">
                                <div class="watch-chain--container">
                                    <p class="watch-chain--text">
                                        Từ nay bạn đã có thể biến một thành nhiều chiếc đồng hồ để thay đổi phong cách thời trang của bản thân với dây đồng hồ Curnon.
                                    </p>
                                    
                                    <button class="watch-chain--purchase-btn">MUA NGAY</button>
                                </div>
                            </div>
                            
                    </li>
                    
                    <li class="nav-item nav-item__left">Nữ giới
                        <div class="nav-item__product--tab">
                            <button name="watch-list-women" index='0' class="nav-item__product--tab-link">Đồng hồ
                                <!-- <i class="nav-item__product--tab-icon ti-right"></i> -->
                            </button>
                            <button name="watch-chain-women"index='1' class="nav-item__product--tab-link">Dây đồng hồ
                                <!-- <i class="nav-item__product--tab-icon ti-arrow-circle-right"></i> -->
                            </button>
                        </div>
    
                        <div class="subnav-product__tabcontent watch-list-women" >
                        <?php while($row = mysqli_fetch_assoc($data["avatar_women"])):?>
                                <a href="http://localhost/curnon/callMCproOPT/show/<?php echo $row["tenbosuutap"]?>" class="watch-item">
                                    <img class="watch-img" src="<?=base?>public/client/assets/img/women/<?php echo $row["img"]?>" alt="">
                                    <p class="watch-name"><?php echo $row["tenbosuutap"]?></p>
                                </a>
                            <?php endwhile;?>
                            <a href="http://localhost/curnon/callMCpromenwo/show/women" class="watch-item watch-name all">Xem tất cả
                                <br>
                                <i class="all-icon ti-arrow-right"></i>
                            </a>
                        </div>
    
                        <div class="subnav-product__tabcontent watch-chain-women" id="watch-chain-men">
                            <img src="<?=base?>public/client/assets/img/women/watch-chain-women.jpg" alt="Dây đồng hồ" class="watch-chain--img">
                            <div class="watch-chain--container">
                                <p class="watch-chain--text">
                                    Biến một thành nhiều chiếc đồng hồ để thay đổi phong cách thời trang của bản thân với dây đồng hồ Curnon.
                                </p>
                                <button class="watch-chain--purchase-btn">MUA NGAY</button>
                            </div>
                        </div>
                    </li>
    
                    <li class="dropup nav-item nav-item__left">About
                        <div class="nav-item dropup-content">
                            <a href="#">Blog</a>
                            <a href="<?=base?>contact">Liên hệ</a>
                            <a href="<?=base?>aboutus">Về chúng tôi</a>
                        </div>
                    </li>
                </ul>
    
                <ul class="nav-list logo">
                    <li class="nav-item">
                        <a href="<?=base?>">
                            <img src="https://curnonwatch.com/_next/static/media/logo.cc5d661a.svg" alt="logo">
                        </a>
                    </li>
                </ul>
    
                <ul class="nav-list nav-list__right">
                    <div for="account-modal__check" class="nav-item dropup pr-8" id="account">
                        <?php if(!isset($_SESSION["info"]["name"])) {?>
                                <a class="nav-item__link " href="<?=base?>login">
                                        <i class="ti-user"></i>
                                    </a>
                        <?php }?>
                        <?php if(isset($_SESSION["info"]["name"])){?>
                            <?php echo '<p style="text-transform:none;">'.'<i class="ti-user pr-8"></i>'.$_SESSION["info"]["name"].'<i style="font-size: 1.2rem;" class="ti-angle-down"> </i></p>'?>
                            <div class="nav-item dropup-content">
                                <a href="<?=base?>inforuser/inforuser" style="display: flex; align-items: center;">Thông tin cá nhân</a>
                                <a href="<?=base?>inforuser/history" style="display: flex; align-items: center;">Lịch sử mua hàng</a>
                                <a href="<?=base?>logout/logout" style="display: flex; align-items: center;"><i class="ti-shift-right pr-8"></i>Đăng xuất</a>
                            </div>
                        <?php }?>
                    </div>
                    <div for="search-modal__check" class="nav-item pr-8" id="search">
                        <i class="nav-item__link ti-search "></i>
                    </div>
                    <div class="nav-item pr-8" id="cart-mini">
                        <i class="nav-item__link ti-bag"></i>
                        <?php if(isset($_SESSION["cart"])){?>
                        <p class="quantity-cart-mini"><?=count($_SESSION['cart'])?></p>
                        <?php }?>
                    </div>
                </ul>
                
            </div>
    
        </div>
        <!-- modal cart-mini -->
        <div for="" class="overlay__cart-mini"></div>
        <div class="cart-mini-modal">
            <div class="cart-mini-modal-container">
                <header class="cart-mini-modal-header">
                    Giỏ hàng của bạn
                    <label for="cart-mini-modal__check"><i class="cart-mini-modal-close-icon ti-close"></i></label>
                </header>
                <div class="cart-mini_tagLine policy">
                    <div class="policy_text "><span><i class="icon_banner ti-truck"></i>
                        </span>FREESHIP ĐƠN HÀNG >700K
                    </div>
                </div>
                <?php if(!isset($_SESSION["cart"])){?>
                    <div class="cart-mini-modal-body padding-center">
                        <p class="cart-mini-info">Hiện đang chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
                        <button class="cart-mini-buy-btn">Mua hàng ngay <i class="cart-mini-buy-icon ti-arrow-right"></i></button>
                    </div>
                <?php }?>
                <div class="cart-mini-body">
                    <?php if(isset($_SESSION["cart"])){?>
                    <?php foreach($_SESSION["cart"] as $values):?>
                        <form method="post">
                            <div class="cart-mini-product">
                                <div class="cart-mini-item--imgBox">
                                    <div class="cart-mini-item--iconclose">
                                        <!-- <a href="" id="deleteproductcart" idproduct=""><i class="ti-close"></i></a> -->
                                        <!-- <a href="<?=base?>ajax/deleteproductcart&id=<?=$values["id"]?>" id="deleteproductcart" idproduct="<?=$values["id"]?>"><i class="ti-close"></i></a> -->
                                    </div>
                                    <div class="cart-mini-item--img">
                                        <img src="<?=base?>public/client/assets/img/<?php echo $values["img"]?>" alt="">
                                    </div>
                                </div>
                                <div class="cart-mini-item--contentBox">
                                    <div class="cart-mini-item-boxinfor">
                                        <div class="cart-mini-item--itemName">
                                            <div class="cart-mini-item--itemName__text"><?=$values["name"]?></div>
                                            <div class="cart-mini-item--itemName__price">
                                            
                                                <strong><?=number_format($values["price_old"], 0,",",".")?> ₫</strong>
                                            </div>
                                        </div>
                                        <div class="cart-mini-item--itemOption">
                                            <div class="cart-mini-item--itemOption__option"><?= $values['size']?>MM</div>
                                            <div class="cart-mini-item--itemOption__quanlity-btn">
                                                <!-- <a href="<?=base?>ajax/upquantity&id=<?=$values["id"]?>" class="cart-mini-item--itemOption__quantity-btn-sub quantity-btn" id="downquantity" idproduct="<?=$values["id"]?>">-</a> -->
                                                Số lượng: <input type="text" value="<?=$values["quantity"]?>" class="input-quantity-btn"></input>
                                                <!-- <a href="<?=base?>ajax/upquantity&id=<?=$values["id"]?>" class="cart-mini-item--itemOption__quantity-btn-add quantity-btn" id="upquantity" idproduct="<?=$values["id"]?>">+</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endforeach;?>
				<?php }?>
                </div>
                
                <?php if(isset($_SESSION['cart'])){?>
                <div class="cart-mini-footer">
                    <div class="cart-mini-total">
                        <div class="cart-mini-total--title">Thành tiền:</div>
                        
                        <div class="cart-mini-total--value"><strong><?=number_format($data['total'], 0,",",".")?> ₫</strong></div>
                    </div>
                    <a href="<?=base?>cart/showcart" class="cart-mini-btn cart-mini-buy-btn mg-10">
                        XEM CHI TIẾT
                    </a>
                    <a href="<?=base?>checkout"class="cart-mini-btn cart-mini-buy-btn color-cart-mini-checkout-btn mg-10">
                        THANH TOÁN NGAY
                    </a>
                    <a href="<?=base?>logout/resetcart" class="reset-cart-btn" style="font-size: 14px;">
                        <!-- <i class="fa-solid fa-arrow-rotate-left cart-checkout-buy-icon"></i> -->
                        <i class="ti-trash cart-checkout-buy-icon "></i>
                        Làm mới giỏ hàng
                    </a>
                </div>
                <?php }?>
                
            </div>
        </div>
        <div for="" class="temp"></div>
        
        <!-- Modal Search  -->
        <div for="" class="overlay__search"></div>
        <div class="search-modal">
            <div class="search-container">
                <label href="">
                    <i class="search-icon__close ti-close"></i>
                </label>
                <header class="search-header">
                <form action="<?=base?>callMCdisplaysp/show" method="post">
                    <input type="search" name="kyw" class="search-input" placeholder="Nhập từ khóa...">
                    <!-- <label for="search-modal__check" class="search-icon__close">Đóng</label> -->
                    <input type="submit" name="timkiem" class="nuttimkiem" value="Go">
                </form>
                </header>
                
                <!-- <div class="search-body">
                    <p class="search-body__title">Các từ khóa nổi bật:</p>
                    <p class="search-body__item">Kashmir</p>
                    <p class="search-body__item">Colosseum</p>
                    <p class="search-body__item">Florenge</p>
                    <p class="search-body__item">Jackie Cuff</p>
                    <p class="search-body__item">Mykonos</p>
                </div> -->
            </div>
        </div>
    
<!--Navbar -->
<script>
        $('html').mouseover(function(event){
        var arr = ["watch-list-men", 'watch-chain-men', 'watch-list-women', 'watch-chain-women'];
        var i;
        $('.nav-item__product--tab-link').mouseover(function(event){
            for(i = 0; i< arr.length; i++) {
                if (arr[i] == $(event.target).attr('name')) {
                    $('.' + arr[i]).css('display', 'flex');
                    $('.overlay').show();
                } else {
                    $('.' + arr[i]).hide();
                    $('.overlay').hide();
                }
            }
        })

        if (jQuery.inArray($(event.target).attr('name'), arr) == -1){
            $('.watch-list-men').hide();
            $('.watch-chain-men').hide();

            $('.watch-list-women').hide();
            $('.watch-chain-women').hide();

            $('.overlay').hide();

        }
    })
    $('.subnav-product__tabcontent').mouseover(function(event){
        event.stopPropagation();
    })

    //Modal
    $(document).ready(function(){
        // Cart modal
        $('html').click(function(event){
            if ($(event.target).closest('#cart-mini').length > 0){
                $('.cart-mini-modal').css('display', 'block');
                $('.overlay__cart-mini').show();
            }
            else {
                $('.cart-mini-modal').css('display', 'none');
                $('.overlay__cart-mini').hide();
            }
        })
        $('.cart-mini-modal-close-icon').click(function(){
            $('.cart-mini-modal').css('display', 'none');
            $('.overlay__cart-mini').hide();
        })
        $('.overlay__cart-mini').click(function(){
            $('.cart-mini-modal').css('display', 'none');
            $('.overlay__cart-mini').hide();
        })
        $('.cart-mini-modal').click(function(event){
            event.stopPropagation();
        })
        //Search modal 
        $('html').click(function(event){
            if ($(event.target).closest('#search').length > 0){
                $('.search-modal').css('display', 'block');
                $('.overlay__search').show();
            }
            else {
                $('.search-modal').css('display', 'none');
                $('.overlay__search').hide();
            }
        })
        $('.search-icon__close').click(function(){
            $('.search-modal').css('display', 'none');
            $('.overlay__search').hide();
        })
        $('.overlay__search').click(function(){
            $('.search-modal').css('display', 'none');
            $('.overlay__search').hide();
        })
        $('.search-modal').click(function(event){
            event.stopPropagation();
        })
    })

</script>
<!-- Cart mini -->
<script>
    $(document).ready(function(){
        // $("#deleteproductcart").click(function(){
        //     var idproduct = $(this).attr('idproduct');
        //     $.post("<?=base?>ajax/deleteproductcart", {id: idproduct}, function(data){
        //         $(".temp").html(data);
        //     })
        // })
        $("#upquantity").click(function(){
            var idproduct = $(this).attr('idproduct');
            $.post({id: idproduct}, function(data){
                $(".temp").html(data);
            })
        })
    })
</script>