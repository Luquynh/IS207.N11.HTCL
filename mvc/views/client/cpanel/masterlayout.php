  <!-- head-->
  <?php 
        require_once "./mvc/views/client/include/head.php";
    ?>
    
    <?php $row = mysqli_fetch_array($data["banner"]) ?>

    <!--/head-->
    <style>
    
    .big_banner .banner{
        background: top center / cover no-repeat url('<?=imgclient?><?php echo $row["banner_img"];
        $pretitle=$row["pretitle"];
        $title=$row["title"];
        $subtitle=$row["subtitle"];
        ?>');
    }
    </style>
<body>

	<!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->

    <!-- Banner -->
    <div class="big_banner">
                <div class="banner">
                    <div class="banner_content">
                        <div class="banner_pretitle"><?php echo $pretitle?></div>
                        <div class="banner_title"><?php echo $title?></div>
                        <div class="banner_subtitle"><?php echo $subtitle?></div>                      
                        <a href="http://localhost/curnon/callMCpromenwo/show/alldh/1" class="btn_banner">SHOP NOW</a>
                    </div>
                </div> 
                <div class="policy_banner">
                        <div class="policy_text"><span><i class="icon_banner ti-truck"></i></span>FREESHIP ĐƠN HÀNG >700K</div>
                        <div class="policy_text"><span><i class="icon_banner ti-shield"></i></span>BẢO HÀNH 10 NĂM</div>
                        <div class="policy_text"><span><i class="icon_banner ti-package"></i></span>ĐỔI TRẢ MIỄN PHÍ TRONG VÒNG 3 NGÀY</div>                   
                </div>
    </div>
    <!-- Banner -->
    
	<!-- gọi danh muc sp -->
    <?php 
        require_once "./mvc/views/client/include/content.php";
    ?>
    <!--/gọi danh muc sp -->

    <!--Story of curnon  -->
    <?php
    require_once "./mvc/views/client/include/introduction.php";
    ?>
    <!--Story of curnon  -->
	
	<!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>