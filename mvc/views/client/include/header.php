
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
                                <a href="" class="watch-item">
                                    <img class="watch-img" src="<?=base?>public/client/assets/img/men/<?php echo $row["img"]?>" alt="">
                                    <p class="watch-name"><?php echo $row["tenbosuutap"]?></p>
                                </a>
                            <?php endwhile;?>
                                <a href="" class="watch-item watch-name all">Xem tất cả
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
                                <a href="" class="watch-item">
                                    <img class="watch-img" src="<?=base?>public/client/assets/img/women/<?php echo $row["img"]?>" alt="">
                                    <p class="watch-name"><?php echo $row["tenbosuutap"]?></p>
                                </a>
                            <?php endwhile;?>
                            <a href="" class="watch-item watch-name all">Xem tất cả
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
                            <a href="">Blog</a>
                            <a href="">Về chúng tôi</a>
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
                            <?php echo '<p style="text-transform:none;">'.'<i class="ti-user pr-8"></i>'.$_SESSION['info']["name"].' '.'<i style="font-size: 1.2rem;" class="ti-angle-down"></i></p>'?>
                            <div class="nav-item dropup-content">
                                <a href="<?=base?>inforuser/inforuser" style="display: flex; align-items: center;">Thông tin cá nhân</a>
                                <a href="" style="display: flex; align-items: center;">Lịch sử mua hàng</a>
                                <a href="<?=base?>logout/logout" style="display: flex; align-items: center;"><i class="ti-shift-right pr-8"></i>Đăng xuất</a>
                            </div>
                        <?php }?>
                    </div>
                    <div for="search-modal__check" class="nav-item pr-8" id="search">
                        <i class="nav-item__link ti-search "></i>
                    </div>
                    <div for="cart-modal__check" class="nav-item pr-8" id="cart">
                        <i class="nav-item__link ti-bag"></i>
                    </div>
                </ul>
                
            </div>
    
        </div>
        <!-- modal cart -->
        <div for="" class="overlay__cart"></div>
        <div class="cart-modal">
            <div class="cart-modal-container">
                <header class="cart-modal-header">
                    Giỏ hàng của bạn
                    <label for="cart-modal__check"><i class="cart-modal-close-icon ti-close"></i></label>
                </header>
                <div class="cart_tagLine policy">
                    <div class="policy_text "><span><i class="icon_banner ti-truck"></i>
                        </span>FREESHIP ĐƠN HÀNG >700K
                    </div>
                </div>
                <!-- <div class="cart-modal-body">
                    <p class="cart-info">Hiện đang chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
                    <button class="cart-buy-btn">Mua hàng ngay <i class="cart-buy-icon ti-arrow-right"></i></button>
                </div> -->
                <div class="cart-body">
                    <div class="cart-product">
                        <div class="cart-item--imgBox">
                            <div class="cart-item--iconclose">
                                <a href=""><i class="ti-close"></i></a>
                            </div>
                            <div class="cart-item--img">
                                <img src="public/client/assets/img/men/COLOSSEM/CANNON/CANNON.png" alt="">
                            </div>
                        </div>
                        <div class="cart-item--contentBox">
                            <div class="cart-item-boxinfor">
                                <div class="cart-item--itemName">
                                    <div class="cart-item--itemName__text">HERBERT</div>
                                    <div class="cart-item--itemName__price"><strong>1.799.000 ₫</strong></div>
                                </div>
                                <div class="cart-item--itemOption">
                                    <div class="cart-item--itemOption__option">40MM</div>
                                    <div class="cart-item--itemOption__quanlity-btn">
                                        <button class="cart-item--itemOption__quanlity-btn-sub quanlity-btn">-</button>
                                        <input type="text" value="1" class="input-quanlity-btn"></input>
                                        <button class="cart-item--itemOption__quanlity-btn-add quanlity-btn">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <div class="cart-total">
                            <div class="cart-total--title">Thành tiền:</div>
                            <div class="cart-total--value"><strong>1.799.000 ₫</strong></div>
                        </div>
                        <a class="cart-btn cart-buy-btn mg-10">
                            XEM CHI TIẾT
                        </a>
                        <a class="cart-btn cart-buy-btn color-cart-checkout-btn mg-10">
                            THANH TOÁN NGAY
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal Search  -->
        <div for="" class="overlay__search"></div>
        <div class="search-modal">
            <div class="search-container">
                <label href="">
                    <i class="search-icon__close ti-close"></i>
                </label>
                <header class="search-header">
                    <input type="search" name="search" id="" class="search-input" placeholder="Nhập từ khóa...">
                    <!-- <label for="search-modal__check" class="search-icon__close">Đóng</label> -->
                </header>
                
                <div class="search-body">
                    <p class="search-body__title">Các từ khóa nổi bật:</p>
                    <p class="search-body__item">Kashmir</p>
                    <p class="search-body__item">Colosseum</p>
                    <p class="search-body__item">Florenge</p>
                    <p class="search-body__item">Jackie Cuff</p>
                    <p class="search-body__item">Mykonos</p>
                </div>
            </div>
        </div>
    
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
            if ($(event.target).closest('#cart').length > 0){
                $('.cart-modal').css('display', 'block');
                $('.overlay__cart').show();
            }
            else {
                $('.cart-modal').css('display', 'none');
                $('.overlay__cart').hide();
            }
        })
        $('.cart-modal-close-icon').click(function(){
            $('.cart-modal').css('display', 'none');
            $('.overlay__cart').hide();
        })
        $('.overlay__cart').click(function(){
            $('.cart-modal').css('display', 'none');
            $('.overlay__cart').hide();
        })
        $('.cart-modal').click(function(event){
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