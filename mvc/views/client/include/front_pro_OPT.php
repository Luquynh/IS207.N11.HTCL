<?php 
    $gt = mysqli_fetch_array($data["gioitinh"]);
?>

    <div id="category_root">
        <?php $bien = mysqli_fetch_array($data["anhmota"]);?>
        <div class="category_banner_desktop">
            <img class="ibra" src="<?=base?>public/client/assets/img/<?php echo $gt["gioitinh"]?>/<?php echo $data["tenbst"]?>/<?php echo $bien["imgmain"]?>" alt="">
        </div>
        <div class="category_category">
            <h1 style="text-transform: uppercase;">ĐỒNG HỒ <?php echo $data["tenbst"]?></h1>
            <div class="category_boxSub">
                <p class="description"><?php echo $bien["mota"]?></p>
            </div>
            <div class="collection_desktop">
                <div class="cd_box_left">
                    <button class="button_menu">MÀU SẮC <i class="ti-angle-down"></i></button>
                    <button class="button_menu">CHẤT LIỆU DÂY <i class="ti-angle-down"></i></button>
                </div>
                <div class="cd_box_right">
                    <button class="sort_by">SẮP XẾP THEO <i class="ti-angle-down"></i></button>
                    <ul id="sortby_modal_root">
                        <li class="sortby_attr" number="0"><span class="cd_text">Mặc định <i class="ti-check" style="display: inline-block;"></i></span></li>
                        <li class="sortby_attr" number="1"><span class="cd_text">Giá tăng dần <i class="ti-check"></i></span></li>
                        <li class="sortby_attr" number="2"><span class="cd_text">Giá giảm dần <i class="ti-check"></i></span></li>
                    </ul>
                </div>
                <div class="filter_modal_root">
                    <!-- Bộ sưu tập -->
                    <div></div>
                    <!-- Size -->
                    <div></div>
                    <!-- color -->
                    <div class="filter_color_root">
                        <div class="filter_color_contentColor">
                            <?php while($row = mysqli_fetch_array($data["mausac"])):?>
                            <button class="filter_color_btn">
                                <div class="filter_color_boxImg">
                                    <img class="filter_color_thumbnail" src="<?=base?>public/client/assets/img/color/<?php echo $row["mausac"]?>.png">
                                </div>
                                <p class="filter_color_name"><?php echo $row["mausac"]?></p>
                            </button>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <!-- chất liệu -->
                    <div class="filter_straps_root">
                        <div class="filter_straps_contentStraps">
                            <button class="filter_straps_btn">
                                <div class="filter_straps_boxImg">
                                    <img class="filter_straps_thumbnail" src="./assets/img/big_img_men/black.webp">
                                </div>
                                <p class="filter_straps_name">Dây da Genuine</p>
                            </button>
                        </div>
                    </div>

                    <div class="filter_desktop_boxtext">
                        <p class="filter_desktop_stock"><input type="checkbox"> Ẩn sản phẩm hết hàng</p>
                        <p class="filter_desktop_text01"><span></span> sản phẩm phù hợp</p>
                        <button class="filter_desktop_reset">Reset</button>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <div style="background-color: #f8f7f4;" class="outstanding_products">
        <div class="watch_container" >
            <?php while($row = mysqli_fetch_array($data["get_all_spOPT"])):?>
            <div class="watch_mid_con">
            <a style="margin-top: 70px;" href="http://localhost/curnon/callMCprodetails/show/<?php echo $row["masp"]?>" class="watch_item" >
                <img class="img_watch_item" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" alt="">
                <p class="p_watch_item"><?php echo $row["tenbosuutap"]?></p>
                <h4 class="h4_watch_item"><?php echo $row["tensp"]?></h4>
                <div class="div_watch_item"><?php echo number_format($row["gia"], 0,",",".")?> ₫</div>
                <div style="display: none;" class="tieuxao2"><?php echo $row["mausac"]?></div>
            </a>
            <button class="button_watch_item">THÊM VÀO GIỎ</button>
            </div>
            <?php endwhile;?>
        </div>
    </div>

    <script>
        var sf = '.filter_modal_root';
        {$('.cd_box_left .button_menu').click(function(){
                $(sf).hide();
                $(sf + ' > div:nth-child(-n+4)').hide();
                a = $(this).text();
                switch (a) {
                    case 'BỘ SƯU TẬP ':
                        $(sf + ' > div:nth-child(1)').show();
                        break;
                    case 'SIZE ':
                        $(sf + ' > div:nth-child(2)').show();
                        break;
                    case 'MÀU SẮC ':
                        $(sf + ' > div:nth-child(3)').show();
                        break;
                    case 'CHẤT LIỆU DÂY ':
                        $(sf + ' > div:nth-child(4)').show();
                }
                $(sf).slideToggle("1000");
            });
            $('html').click(function(event){
                if ($(event.target).closest('.button_menu').length <= 0) {
                    $(sf).slideUp("1000");
                }
            });
            $(sf).click(function(event){
                event.stopPropagation();
            });
        }
        {$('html').click(function(event){
            if ($(event.target).closest('.sort_by').length > 0) {
                $('#sortby_modal_root').show();
            } else {
                $('#sortby_modal_root').hide();
            }
        })
        $('#sortby_modal_root').click(function(event){
            if(event.target.nodeName==='LI') {
                $('.cd_text .ti-check').hide();
                $(event.target).find('.ti-check').show();
            } 
            else {
                event.stopPropagation();
            }
            // $(event.target).css('background-color','red');
        })}
        {function addborder(b1,b2) {
            $(b1 + ' ' + b2).click(function(){
                // if ($(this).hasClass('addborder')) {
                //     $(this).removeClass('addborder')
                // } else {
                //     $(this).addClass('addborder');
                // }
                $(b1 + ' ' + b2).removeClass('addborder');
                $(this).addClass('addborder');
            })
        }
        addborder('.filter_model_btn', '.filter_model_thumbnail');
        addborder('.filter_size_btn','.filter_number_size1');
        addborder('.filter_color_btn','.filter_color_boxImg');
        addborder('.filter_straps_btn','.filter_straps_boxImg');}
        $('button.filter_desktop_reset').click(function(){
            $('.filter_model_btn .filter_model_thumbnail').removeClass('addborder');
            $('.filter_size_btn .filter_number_size1').removeClass('addborder');
            $('.filter_color_btn .filter_color_boxImg').removeClass('addborder');
            $('.filter_straps_btn .filter_straps_boxImg').removeClass('addborder');
            $('.cd_text .ti-check').hide();
            $('.cd_text').eq(0).find('.ti-check').show();
        })
        $('.filter_color_btn').click(function(){
            var mausac = $(this).find('.filter_color_name').text();
            $('.watch_mid_con').hide();
            $sl = $('.watch_mid_con').length;
            for (var i = 0; i < $sl; i++ ){
                if ($('.watch_mid_con').eq(i).find('.tieuxao2').text() == mausac) {
                    $('.watch_mid_con').eq(i).show();
                }
            }
        })
        $('.filter_desktop_reset').click(function(){
            $('.watch_mid_con').show();
        }) 
    </script>