<div id="content" >
        <div class="content_section">
            <div class="category_cards_root">
                <div class="category_cards">
                    <a href="http://localhost/curnon/callMCpromenwo/show/women" class="category_card">
                        <img src="<?=base?>public/client/assets/img/main_page/Dong_ho_nu_80c6668c12.jpg" alt="">
                        <div class="category_card_content">
                            <p>ĐỒNG HỒ NỮ</p>
                            <div class="category_card_link"><i class="ti-arrow-right"></i></div>
                        </div>
                    </a>
                    <a href="http://localhost/curnon/callMCpromenwo/show/men" class="category_card">
                        <img src="<?=base?>public/client/assets/img/main_page/Dong_ho_nam_03c94ab72d.jpg" alt="">
                        <div class="category_card_content">
                            <p>ĐỒNG HỒ NAM</p>
                            <div class="category_card_link"><i class="ti-arrow-right"></i></div>
                        </div>
                    </a>
                    <a href="http://localhost/curnon/callMCpromenwo/show/alldh/2" class="category_card">
                        <img src="<?=base?>public/client/assets/img/main_page/Phu_kien_thoi_trang_a94ba78315.jpg" alt="">
                        <div class="category_card_content">
                            <p>DÂY ĐỒNG HỒ</p>
                            <div class="category_card_link"><i class="ti-arrow-right"></i></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ^ Đồng hồ nam, đồng hồ nữ, phụ kiện -->
            <div class="outstanding_products">
                <h3 class="outstanding_title">MEN'S OUTSTANDING PRODUCTS</h3>
                <a class="look_all" rel="stylesheet" href="http://localhost/curnon/callMCpromenwo/show/men">XEM TẤT CẢ <i class="ti-arrow-right"></i></a>
                <div class="watch_container" >
                <?php while($row = mysqli_fetch_assoc($data["best_men"])):?>
                    <div class="watch_mid_con">
                        <a href="http://localhost/curnon/callMCprodetails/show/<?php echo $row["masp"]?>" class="watch_item" >

                            <img class="img_watch_item" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" alt="">
                            <p class="p_watch_item"><?php echo $row["tenbosuutap"]?></p>
                            <h4 class="h4_watch_item"><?php echo $row["tensp"]?></h4>
                            <div class="div_watch_item"><?php echo number_format($row["gia"], 0,",",".")?> ₫</div>
                            <button class="button_watch_item" id="addtocart" idproduct="<?=$row["masp"]?>">XEM CHI TIẾT</button>
                        </a>

                    </div>

                    <?php endwhile;?>
                </div>
            </div>
            <!-- ^ Đồng hồ nam -->
            <div class="outstanding_products">
                <h3 class="outstanding_title">WOMEN'S OUTSTANDING PRODUCTS</h3>
                <a class="look_all" rel="stylesheet" href="http://localhost/curnon/callMCpromenwo/show/women">XEM TẤT CẢ <i class="ti-arrow-right"></i></a>
                <div class="watch_container" >
                <?php while($row = mysqli_fetch_assoc($data["best_women"])):?>
                    <div class="watch_mid_con">
                        <a href="http://localhost/curnon/callMCprodetails/show/<?php echo $row["masp"]?>" class="watch_item" >

                            <img class="img_watch_item" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" alt="">
                            <p class="p_watch_item"><?php echo $row["tenbosuutap"]?></p>
                            <h4 class="h4_watch_item"><?php echo $row["tensp"]?></h4>
                            <div class="div_watch_item"><?php echo number_format($row["gia"], 0,",",".")?> ₫</div>
                            <!-- <button class="button_watch_item" id="addtocard" idproduct="">XEM CHI TIẾT</button> -->
                            <button class="button_watch_item" id="addtocart" idproduct="<?=$row["masp"]?>">XEM CHI TIẾT</button>
                        </a>
                    </div>
                    <div class="" id="notification"></div>

                    <?php endwhile;?>
                </div>
            </div>
            <!-- ^ Đồng hồ nữ -->
        </div>
        <!-- <div class="" id="notification"></div> -->
</div>
