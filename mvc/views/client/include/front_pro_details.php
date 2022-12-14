<?php $row = mysqli_fetch_array($data["only1pro"]) ?>
<div id="content">
    <div class="watch_container">
            <div class="gallery_list">
                <img class="gallery_thumbnail_img addborder" src="<?=base?>public/client/assets/img/<?php echo $row["gioitinh"]?>/<?php echo $row["img"]?>" number="0" alt="">
                <img class="gallery_thumbnail_img" src="<?=base?>public/client/assets/img/<?php echo $row["gioitinh"]?>/<?php echo $row["img1"]?>" number="1" alt="">
                <img class="gallery_thumbnail_img" src="<?=base?>public/client/assets/img/<?php echo $row["gioitinh"]?>/<?php echo $row["img2"]?>" number="2" alt="">
            </div>
            <div class="gallery_main_img">
                <img class="ibra" src="<?=base?>public/client/assets/img/<?php echo $row["gioitinh"]?>/<?php echo $row["img"]?>" number="0" alt="">
                <div class="change_img_mobile">
                    <div class="arrow_left"><i class="ti-angle-left"></i></div>
                    <div class="arrow_right"><i class="ti-angle-right"></i></div>
                    <ul class="slick_dots">
                        <span class="slick_active bgcolor" number="0"></span>
                        <span class="slick_active" number="1"></span>
                        <span class="slick_active" number="2"></span>
                    </ul>
                </div>
            </div>
            <div class="product_full_detail">
                <p class="sub_name"><?php echo $row["tenbosuutap"]?></p>

                <h3 class="name_product"><?php echo $row["tensp"]?></h3>

                <div class="price_rating_product">
                    <p class="price_product"><?php echo $row["gia"]?>.000 ₫</p>
                    <div class="rating_product">
                        <span class="empty_icon"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i></span>
                        <span class="total_rating">(35)</span>
                    </div>
                </div>

                <!-- <p class="text_fundiin">
                    hoặc <span>800.000 ₫ x 3 kỳ</span> với
                    <span class="fundiin">Fundiin</span>
                </p> -->

                <div class="status_size_product">
                    <button class="status_product">
                        Tình trạng: <span style="color: rgb(59, 177,0)" class="status_now">Còn hàng</span>
                        <div id="tippy-1" class="hide">
                            <div class="stock_detail_box">
                                <ul>
                                    <li>Online</li>
                                    <li><a href="https://maps.google.com/?q=173C Kim Mã, Ba Đình, Hà Nội" target="_blank" rel="noreferrer">173C Kim Mã - Hà Nội <i class="ti-location-pin"></i></a></li>
                                    <li><a href="https://maps.google.com/?q=33 Hàm Long, Hoàn Kiếm, Hà Nội" target="_blank" rel="noreferrer">33 Hàm Long - Hà Nội <i class="ti-location-pin"></i></a></li>
                                    <li><a href="https://maps.google.com/?q=9 B7 Phạm Ngọc Thạch, Đống Đa, Hà Nội" target="_blank" rel="noreferrer">9 B7 Phạm Ngọc Thạch - Hà Nội <i class="ti-location-pin"></i></a></li>
                                    <li><a href="https://maps.google.com/?q=25 Nguyễn Trãi, P.Bến Thành, Quận 1, TPHCM" target="_blank" rel="noreferrer">25 Nguyễn Trãi, Q1 - TP.HCM <i class="ti-location-pin"></i></a></li>
                                    <li><a href="https://maps.google.com/?q=348 Lê Văn Sỹ, P.14, Quận 3, TPHCM" target="_blank" rel="noreferrer">348 Lê Văn Sỹ, P.14, Quận 3 - TPHCM <i class="ti-location-pin"></i></a></li>
                                </ul>
                                <div class="arrow_box"></div>
                            </div>
                        </div>
                    </button>
                    <button class="size_product">
                        <i class="ti-ruler"> <u><i>Cỡ cổ tay</i></u></i>
                    </button>
                </div>

                <!-- <p class="title_cross_sell_product">
                    <span>GIẢM 20%</span> CHO DÂY ĐEO MUA KÈM:
                </p> -->

                <!-- <div class="slide_cross_sell">
                    <button class="prev"><i class="ti-angle-left"></i></button>
                    <button class="next"><i class="ti-angle-right"></i></button>
                    <div class="csp" number="0">
                        <img src="./assets/img/details/kashmir-calm/2_1_2_.webp" alt="" class="csp_img">
                        <br>
                        <a href="" class="csp_name_cross">DÂY DA COFFEE</a>
                        <div class="csp_price_cross">
                            <del>449.000 ₫</del>
                            <br>
                            + 359.200 ₫
                        </div>
                        <button class="csp_btn_cross">+ THÊM</button>
                    </div>
                    <div class="csp hide" number="1">
                        <img src="./assets/img/details/kashmir-calm/calm.webp" alt="" class="csp_img">
                        <br>
                        <a href="" class="csp_name_cross">DÂY DA COFFEE</a>
                        <div class="csp_price_cross">
                            <del>449.000 ₫</del>
                            <br>
                            + 359.200 ₫
                        </div>
                        <button class="csp_btn_cross">+ THÊM</button>
                    </div>
                    <div class="csp hide" number="2">
                        <img src="./assets/img/details/kashmir-calm/br.webp" alt="" class="csp_img">
                        <br>
                        <a href="" class="csp_name_cross">DÂY DA COFFEE</a>
                        <div class="csp_price_cross">
                            <del>449.000 ₫</del>
                            <br>
                            + 359.200 ₫
                        </div>
                        <button class="csp_btn_cross">+ THÊM</button>
                    </div>
                    <div class="csp hide" number="3">
                        <img src="./assets/img/details/kashmir-calm/bt.webp" alt="" class="csp_img">
                        <br>
                        <a href="" class="csp_name_cross">DÂY DA COFFEE</a>
                        <div class="csp_price_cross">
                            <del>449.000 ₫</del>
                            <br>
                            + 359.200 ₫
                        </div>
                        <button class="csp_btn_cross">+ THÊM</button>
                    </div>
                </div> -->

                <button class="buy_now">THANH TOÁN NGAY</button>
                <button class="add_to_cart">THÊM VÀO GIỎ</button>
            </div>
    </div>
</div>
    <div id="fundiin_model_root" class="hide">
        <div class="fundiin_model_box">
            <i class="ti-close"></i>
            <div class="fundiin_model_item"><img src="./assets/img/details/kashmir-calm/2_1_2_.webp" alt=""><p>Chọn giỏ sản phẩm yêu thích</p></div>
            <u></u>
            <div class="fundiin_model_item"><img src="./assets/img/details/kashmir-calm/2_1_2_.webp" alt=""><p>Chọn Fundiin ở bước thanh toán</p></div>
            <u></u>
            <div class="fundiin_model_item"><img src="./assets/img/details/kashmir-calm/2_1_2_.webp" alt=""><p>Nhận SMS đăng ký tài khoản mới và thanh toán Kỳ 1</p></div>
            <u></u>
            <div class="fundiin_model_item"><img src="./assets/img/details/kashmir-calm/2_1_2_.webp" alt=""><p>Nhận hàng và thanh toán 2 Kỳ sau mỗi 30 ngày</p></div>
            <p class="fundiin_model_text">Bạn cần phải trên 18 tuổi, là công dân Việt Nam, sở hữu số điện thoại chính chủ từ các nhà mạng Viettel, Mobifone, Vinaphone, và một số tiêu chí khác để được duyệt.</p>
        </div>
    </div>
    <div id="mask_root_actice" class="hide">
        <div class="size_watch_box">
            <div class="size_watch_left">
                <div class="size_watch_header">
                    <p class="size_watch_Title">MẶT ĐỒNG HỒ</p>
                    <p class="size_watch_subTitle">ĐỐI CHIỀU VỚI CHU VI CỔ TAY</p>
                </div>
                <table class="size_watch_boxTable">
                    <tr>
                        <th>Đồng hồ</th>
                        <th>Cổ tay</th>
                    </tr>
                    <tr>
                        <td>Kashmir 40mm</td>
                        <td>15,5-17,5cm</td>
                    </tr>
                    <tr>
                        <td>Weimar 40mm</td>
                        <td>16-17,5cm</td>
                    </tr>
                    <tr>
                        <td>Jackson 40mm</td>
                        <td>16-17,5cm</td>
                    </tr>
                    <tr>
                        <td>Detroit 40mm</td>
                        <td>16-18cm</td>
                    </tr>
                    <tr>
                        <td>Colosseum 42mm</td>
                        <td>16-18cm</td>
                    </tr>
                    <tr>
                        <td>Whitesands 38mm</td>
                        <td>14,5-17cm</td>
                    </tr>
                    <tr>
                        <td>Futura 40mm</td>
                        <td>16-18cm</td>
                    </tr>
                </table>
            </div>
            <div class="size_watch_right">
                <img src="<?=base?>public/client/assets/img/pic-02.e2d7363f.jpg" alt="">
                <i class="ti-close"></i>
            </div>
        </div>
    </div>

    <script>
        //FUNCTION xoá nút cũ tô nút mới
        {function node(num){
            n = $('.slick_dots .slick_active').length;
            for (var i = 0; i < n; i++) {
                a = $('.slick_dots').find('span').eq(i);
                if (a.hasClass('bgcolor')) {
                    a.removeClass('bgcolor');
                    break;
                }
            }
            $('.slick_dots .slick_active').eq(parseInt(num)).addClass('bgcolor');
        }}
        //FUNCTION đổi ảnh main, đổi number của ảnh main
        {function mainNum(imgPath, num){
            $('.gallery_main_img .ibra').attr('number', num);
            $('.gallery_main_img .ibra').fadeOut(function() {
                $(this).attr("src",imgPath).fadeIn();
            })
        }}
        //FUNCTION thêm border
        {function addBorder(num){
            $('.gallery_list .gallery_thumbnail_img').removeClass('addborder');
            $('.gallery_list .gallery_thumbnail_img').eq(parseInt(num)).addClass('addborder');
        }}

        //đổi ảnh main ĐỒNG THỜI tạo border
        {$('.gallery_list .gallery_thumbnail_img').click(function(){
            let imgPath = $(this).attr('src');
            num = $(this).attr('number');
            mainNum(imgPath, num);
            node(num);
            addBorder(num);
        })}
        
        //slide csp
        {$('.next').click(function(){
            changeProduct('next');
        })
        $('.prev').click(function(){
            changeProduct('prev');
        })
        function changeProduct(a){
            imgSelectVisible = $('.csp:visible');
            imgVisible = parseInt(imgSelectVisible.attr('number'));
            eqNumber = (a === 'next' ? imgVisible + 1: imgVisible - 1);
            if (imgVisible < 0) {
                eqNumber = $('.csp').length - 1;
            }
            if (eqNumber >= $('.csp').length) {
                eqNumber = 0;
            }
            imgSelectVisible.hide();
            $('.csp').eq(eqNumber).fadeIn();
        }}
        //đổi màu nút thêm cong
        {$('.csp_btn_cross').click(function(){
            a = $(this).css("background-color");
            if (a === "rgb(236, 235, 234)") {
                $(this).css({
                    "background-color":"#53c66e",
                    "color":"#fff"
                })
                $(this).parent('.csp').css("border-color","#53c66e");
            } else {
                $(this).css({
                    "background-color":"#ecebea",
                    "color":"#161a21"
                })
                $(this).parent('.csp').css("border-color","#ecebea")
            }
        })}
        //layout Fundiin
        {$('.fundiin').click(function(){
            $('#fundiin_model_root').show();
        })
        $('.fundiin_model_box .ti-close').click(function(){
            $('#fundiin_model_root').hide();
        })
        $('#fundiin_model_root').click(function(){
            $(this).hide();
        })
        $('.fundiin_model_box').click(function(event){
            event.stopPropagation();
        })}
        //layout bảng size đồng hồ
        {$('button.size_product').click(function(){
            $('#mask_root_actice').show();
        })
        $('.size_watch_box .ti-close').click(function(){
            $('#mask_root_actice').hide();
        })
        $('#mask_root_actice').click(function(){
            $(this).hide();
        })
        $('.size_watch_box').click(function(event){
            event.stopPropagation();
        })}
        //layout địa chỉ
        {$('html').click(function(event){
            if ($(event.target).closest('.status_now').length > 0) {
                $('#tippy-1').show();
            } else {
                $('#tippy-1').hide();
            }
        })
        $('#tippy-1').click(function(event){
            event.stopPropagation();
        })}
        
        //Chuyển ảnh trên mobile
        {$(".change_img_mobile .arrow_left").click(function(){
            changeImgmain('prev');
        })
        $(".change_img_mobile .arrow_right").click(function(){
            changeImgmain('next');
        })
        function changeImgmain(prev_next) {
            a = $('.gallery_main_img .ibra').attr('number');
            numMain = parseInt(a);
            numWant = (prev_next === 'prev' ? numMain - 1: numMain + 1);
            if (numWant < 0) {
                numWant = $('.gallery_list .gallery_thumbnail_img').length - 1;
            } 
            if (numWant >= $('.gallery_list .gallery_thumbnail_img').length) {
                numWant = 0;
            }
            imgPath = $('.gallery_list .gallery_thumbnail_img').eq(numWant).attr('src');
            mainNum(imgPath, numWant.toString());
            node(numWant.toString());
            addBorder(numWant.toString());
        }}
        //bấm nút đen đổi ảnh
        {$('.slick_dots .slick_active').click(function(){
            NumnodeClick = $(this).attr('number');
            imgPath = $('.gallery_list .gallery_thumbnail_img').eq(parseInt(NumnodeClick)).attr('src');
            mainNum(imgPath, NumnodeClick);
            node(NumnodeClick);
            addBorder(NumnodeClick);
        })}
    </script>
