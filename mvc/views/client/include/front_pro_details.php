<?php 
    require_once "./mvc/views/client/include/head.php";
?>
    <!--/head-->
<style>
    #content{
        margin-top: 98px;
    }
    body {
    background: linear-gradient(rgba(110, 127, 145, 0.15) 0%, rgba(22, 26, 33, 0) 100%);
    /* background: linear-gradient(rgba(117, 60, 36, 0.15) 0%, rgba(22, 26, 33, 0) 100%); */
    }
    .error {color: #FF0000;}
    .policy_banner1{
    background: #ecebea;
    padding: 20px 0;
    display:flex;
    justify-content: space-around;
    align-items: center;
    height: 61.6px;
    width: 100%;
    }
    .policy_banner1 .policy_text{
    display: flex;
    align-items: center;
    font-weight: 510;
    font-size: 12px;
    line-height: 12px;
    letter-spacing: .02em;
    color: #161a21;
    }
    .policy_banner1 .icon_banner{
        font-size: 20px;
        color:black;
        margin-right: 10px;
    }
</style>

<body>
	<!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
<?php $row = mysqli_fetch_array($data["only1pro"]);
    $soluong = (int)($row["soluong"]);
    if($soluong > 0) {
        $tinhtrang = "Còn hàng";
    }else{
        $tinhtrang = "Hết hàng";
    }
?>
<div id="content">
    <div class="watch_container">
            <div class="gallery_list">
                <img class="gallery_thumbnail_img addborder" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" number="0" alt="">
                <img class="gallery_thumbnail_img" src="<?=base?>public/client/assets/img/<?php echo $row["img1"]?>" number="1" alt="">
                <img class="gallery_thumbnail_img" src="<?=base?>public/client/assets/img/<?php echo $row["img2"]?>" number="2" alt="">
            </div>
            <div class="gallery_main_img">
                <img class="ibra" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" number="0" alt="">
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
                    <p class="price_product"><?php echo number_format($row["gia"], 0,",",".")?> ₫</p>
                    <div class="rating_product">
                        <span class="empty_icon"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i></span>
                        <!-- <span class="total_rating">(35)</span> -->
                    </div>
                </div>

                <!-- <p class="text_fundiin">
                    hoặc <span>800.000 ₫ x 3 kỳ</span> với
                    <span class="fundiin">Fundiin</span>
                </p> -->

                <div class="status_size_product">
                    <button class="status_product">
                        Tình trạng: <span style="color: rgb(59, 177,0)" class="status_now"><?php echo $tinhtrang;?></span>
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
                <button class="add_to_cart" id="addtocart" idproduct="<?=$row["masp"]?>">THÊM VÀO GIỎ</button>
            </div>
    </div>
</div>
<div class="policy_banner1">
    <div class="policy_text"><span><i class="icon_banner ti-truck"></i></span>FREESHIP ĐƠN HÀNG >700K</div>
    <div class="policy_text"><span><i class="icon_banner ti-shield"></i></span>BẢO HÀNH 10 NĂM</div>
    <div class="policy_text"><span><i class="icon_banner ti-package"></i></span>ĐỔI TRẢ MIỄN PHÍ TRONG VÒNG 3 NGÀY</div>                   
</div>
<div id="khung_mota">
    <div class="box_mota"><?php echo $row["mota"]?></div>
    <div class="box_thongso">
        <div class="flex0">
            <div class="flex1">
                <div class="flex2">Kích thước</div>
                <div class="flex3"><?php echo $row["kichthuoc"]?>MM</div>
            </div>
            <hr/>
            <div class="flex1">
                <div class="flex2">Màu sắc</div>
                <div class="flex3" style="text-transform: uppercase;"><?php echo $row["mausac"]?></div>
            </div>
            <hr/>
            <div class="flex1">
                <div class="flex2">Chống nước</div>
                <div class="flex3">3ATM</div>
            </div>
            <hr/>
            <div class="flex1">
                <div class="flex2">Chất liệu dây</div>
                <div class="flex3" style="text-transform: uppercase;"></div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "./mvc/core/DB1.php";
    $dt = new DB1();
    $id_sp = $row["masp"]; 
    if(isset($_SESSION["info"])){
        $id_user = $_SESSION["info"]["id"];
?>
<div>
    <?php
    $comment = $commentErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["comment"])) {
        $commentErr = "Không được bỏ trống phần này";
    } else {
        $tieude = $_POST["tieude"];
        $comment = $_POST["comment"];
        // $id_sp = $_POST["masp"];
        $sql = "INSERT INTO binhluan (masp, makh, tieude, content, tt_xoa) VALUES ('$id_sp', '$id_user', '$tieude','$comment', '0')";
        mysqli_query($dt->conn, $sql);
    }
    }
    ?>
    <div style="margin: 50px; font-size: 30px">Hãy để lại ý kiến của bạn</div>
    <form id="formprodetails" method="post" action="">  
    Tiêu đề: <br>
    <input type="text" name="tieude">
    <br><br>
    <textarea style="display: none" type="hidden" name="masp"><?php echo $row["masp"]?></textarea>
    Comment: <br>
    <textarea name="comment" rows="5" cols="40"></textarea><span class="error"> *<?php echo $commentErr;?></span>
    <br><br>
    <input class ="submit" type="submit" name="submit" value="ĐĂNG">  
    </form>

    <?php
    ?>
</div>
<?php }else{echo "<div style='text-align: center;'><h1>Bạn vui lòng đăng nhập để bình luận</h1></div>";}?>
<div style="margin: 50px; font-size: 32px">REVIEWS CỦA KHÁCH HÀNG</div>

<div class="cmt">
    <?php
        $sql = "SELECT binhluan.tieude AS tieude, binhluan.content AS content, khachhang.tenkh AS tenkh 
        FROM binhluan 
        INNER JOIN khachhang ON binhluan.makh = khachhang.makh 
        WHERE binhluan.masp = '$id_sp'
        ORDER BY mabl DESC";
        $bl = mysqli_query($dt->conn, $sql);
    ?>
    <?php 
    if (mysqli_num_rows($bl)>0) {
    while($row = mysqli_fetch_array($bl)):?>
        <div class="cmt_root">
            <h1 class="cmt_tenkh"><?php echo $row["tenkh"]?></h1>
            <hr>
            <h2 class="cmt_tieude"><?php echo $row["tieude"]?></h2>
            <div class="cmt_content"><?php echo $row["content"]?></div>
        </div>
    <?php 
    endwhile;
  }else{
    echo "<div style='text-align: center;'><h2>Hiện chưa có bình luận nào</h2></div>";
  }
    ?>
</div>
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
</body>
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
<script>
    $(document).ready(function(){
        $("#addtocart").click(function(){
            var id_product = $(this).attr("idproduct");
            $.post("<?=base?>ajax/addcart", {id: id_product}, function(data){
                $("#notification").html(data);
                
            })
        })
    })
    // $(document).on('click','#addtocart',function(){
    //     idproduct =  $(this).attr('idproduct')
    //     $.post("ajax/addcart",{id:idproduct},function(data){
    //         $("#notification").html(data);
    //     });
    // });
</script>
